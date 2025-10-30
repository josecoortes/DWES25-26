// ==== App de Portafolio: búsqueda + filtro por unidad + visor con restauración de scroll ====
document.addEventListener('DOMContentLoaded', () => {
  // ---------- Helpers ----------
  const $  = (s) => document.querySelector(s);
  const $$ = (s) => Array.from(document.querySelectorAll(s));
  const collator = new Intl.Collator(undefined, { numeric: true, sensitivity: 'base' });
  const natcmp   = (a, b) => collator.compare(String(a), String(b));

  // ---------- Nodos base ----------
  let unitsEl = $('#units');
  if (!unitsEl) {
    unitsEl = document.createElement('div');
    unitsEl.id = 'units';
    (document.querySelector('main, .container, body') || document.body).appendChild(unitsEl);
  }
  const search = $('#search') || $('#q'); // admite #search o #q

  // ---------- Estado ----------
  let data = { alumno:'Alumno/a', asignatura:'Asignatura', curso:'2024/25', ejercicios:[] };
  let q = '';
  let selectedUnit = ''; // '' => Todas

  // ---------- Barra de filtros por UNIDAD (crear si no existe) ----------
  let unitFilterBar = document.querySelector('.unit-filter');
  if (!unitFilterBar) {
    unitFilterBar = document.createElement('nav');
    unitFilterBar.className = 'unit-filter';
    unitFilterBar.setAttribute('aria-label', 'Filtrar por unidad');
    unitFilterBar.innerHTML = `<div class="unit-filter-wrap"></div>`;
    unitsEl.parentNode.insertBefore(unitFilterBar, unitsEl);
  }
  const unitWrap = unitFilterBar.querySelector('.unit-filter-wrap');

  function buildUnitButtons(allUnits) {
    const units = [...allUnits].sort(natcmp);
    const isAll = selectedUnit === '';
    let html = `<button type="button" class="unit-btn ghost${isAll ? ' active' : ''}" data-unit="" aria-pressed="${isAll}">Todas</button>`;
    for (const u of units) {
      const on = selectedUnit === String(u);
      html += `<button type="button" class="unit-btn ghost${on ? ' active' : ''}" data-unit="${String(u)}" aria-pressed="${on}">Unidad ${u}</button>`;
    }
    unitWrap.innerHTML = html;
  }

  // Delegación de eventos para los botones (no se pierde al re-render)
  unitWrap.addEventListener('click', (e) => {
    const btn = e.target.closest('.unit-btn');
    if (!btn) return;
    e.preventDefault();
    selectedUnit = btn.dataset.unit || '';
    unitWrap.querySelectorAll('.unit-btn').forEach(b => {
      const on = b === btn;
      b.classList.toggle('active', on);
      b.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
    render();
  });

  // ---------- Render principal ----------
  function render() {
    // Cabecera (si existen esos nodos)
    const nameEl = $('#studentName');
    const metaEl = $('#metaLine');
    if (nameEl) nameEl.textContent = data.alumno;
    if (metaEl) metaEl.textContent = `${data.asignatura} · ${data.curso}`;

    // Todas las unidades para los botones (no dependen de la búsqueda)
    const allUnits = new Set(data.ejercicios.map(e => e.unidad));
    buildUnitButtons(allUnits);

    // Agrupar por unidad aplicando primero búsqueda
    const groups = {};
    for (const e of data.ejercicios) {
      const texto = (e.titulo || '') + (e.descripcion || '') + (Array.isArray(e.tags) ? e.tags.join(' ') : '');
      if (q && !texto.toLowerCase().includes(q)) continue;
      const u = String(e.unidad);
      (groups[u] ||= []).push(e);
    }

    // Unidades a pintar según filtro activo
    const unidades = selectedUnit ? [selectedUnit] : Object.keys(groups);
    unidades.sort(natcmp);

    // Pintado
    unitsEl.innerHTML = '';
    let pintadoAlgo = false;

    for (const u of unidades) {
      const lista = groups[u] || [];
      if (!lista.length) continue;
      pintadoAlgo = true;

      const wrap = document.createElement('section');
      wrap.className = 'unit';
      wrap.innerHTML = `
        <div class="unit-head">
          <div class="unit-title">
            <span class="pill">Unidad</span>
            <h2>${u}</h2>
          </div>
          <div class="pill count">${lista.length} ejercicio(s)</div>
        </div>
        <div class="unit-body"></div>
      `;
      const body = wrap.querySelector('.unit-body');

      for (const ej of lista) {
        const card = document.createElement('article');
        card.className = 'card';
        card.innerHTML = `
          <h3>${ej.titulo}</h3>
          <p>${ej.descripcion || ''}</p>
          <div class="tags">${(ej.tags || []).map(t => `<span class="tag">${t}</span>`).join('')}</div>
          <div class="actions">
            <!-- Importante: clase .open-ej para el visor -->
            <a class="btn open-ej" href="${ej.url}">Abrir</a>
            ${ej.codigo ? `<a class="ghost" target="_blank" rel="noopener" href="${ej.codigo}">Código</a>` : ''}
          </div>
        `;
        body.appendChild(card);
      }

      unitsEl.appendChild(wrap);
    }

    if (!pintadoAlgo) {
      unitsEl.innerHTML = '<p class="muted">No hay ejercicios que coincidan con la búsqueda.</p>';
    }

    // (Re)enganchar el visor a los botones "Abrir"
    setupViewerHandlers();
  }

  // ---------- Búsqueda en vivo ----------
  if (search) {
    search.addEventListener('input', (e) => {
      q = e.target.value.trim().toLowerCase();
      render();
    });
  }

  // ---------- Carga de datos ----------
  fetch('manifest.json')
    .then(r => r.json())
    .then(j => { data = j; render(); })
    .catch(() => { render(); });

  // ========================================================================
  // VISOR (overlay) con restauración exacta del punto donde pulsaste
  // ========================================================================
  function setupViewerHandlers() {
    const isEmbedded = (window.name === 'visor') || document.documentElement.getAttribute('data-embed') === '1';
    const links = $$('.actions .open-ej');
    if (!links.length) return;

    // Si está embebido, dejamos que abra en el iframe externo "visor"
    if (isEmbedded) {
      links.forEach(a => a.setAttribute('target', 'visor'));
      return;
    }

    const overlay       = $('#overlay');
    const overlayFrame  = $('#overlayFrame');
    const overlayUrl    = $('#overlayUrl');
    const overlayClose  = $('#overlayClose');
    const overlayReload = $('#overlayReload');

    // Si no hay overlay en DOM, no interceptamos: abrirá en la misma pestaña
    if (!overlay || !overlayFrame) {
      // Deja links normales
      return;
    }

    let __savedScrollY = 0;
    let __clickedEl = null;
    let __clickedAbsY = 0;

    function lockScroll() {
      __savedScrollY = window.pageYOffset || document.documentElement.scrollTop || 0;

      const sbw = window.innerWidth - document.documentElement.clientWidth;
      if (sbw > 0) document.body.style.paddingRight = sbw + 'px';

      document.body.style.position = 'fixed';
      document.body.style.top = `-${__savedScrollY}px`;
      document.body.style.left = '0';
      document.body.style.right = '0';
      document.body.style.width = '100%';
    }

    function unlockScroll({ restoreToClicked = false } = {}) {
      const yFromFixed = Math.abs(parseInt(document.body.style.top || '0', 10)) || __savedScrollY;

      // Limpia estilos
      document.body.style.position = '';
      document.body.style.top = '';
      document.body.style.left = '';
      document.body.style.right = '';
      document.body.style.width = '';
      document.body.style.paddingRight = '';

      // Restaura después del reflow
      requestAnimationFrame(() => {
        let targetY = yFromFixed;

        if (restoreToClicked && __clickedEl) {
          // Usamos la posición ABSOLUTA guardada del card en el momento del click
          const header = document.querySelector('.header, header');
          const headerH = header ? header.offsetHeight : 0;
          targetY = Math.max(0, Math.round(__clickedAbsY - headerH - 8));
        }

        window.scrollTo(0, targetY);
      });
    }

    function openModal(url, triggerEl) {
      // Guardamos el elemento origen y su Y absoluta para poder volver EXACTO
      __clickedEl = triggerEl?.closest('.card') || triggerEl || null;
      if (__clickedEl) {
        const rect = __clickedEl.getBoundingClientRect();
        __clickedAbsY = window.scrollY + rect.top;
      } else {
        __clickedAbsY = window.scrollY;
      }

      overlayFrame.src = url;
      if (overlayUrl) overlayUrl.textContent = url;
      overlay.classList.add('open');
      document.documentElement.classList.add('modal-open');
      document.body.classList.add('modal-open');
      lockScroll();
    }

    function closeModal() {
      overlay.classList.remove('open');
      document.documentElement.classList.remove('modal-open');
      document.body.classList.remove('modal-open');
      unlockScroll({ restoreToClicked: true });
      // overlayFrame.src = 'about:blank'; // si quieres limpiar
    }

    // Interceptamos "Abrir" para usar el visor
    links.forEach(a => {
      a.addEventListener('click', (e) => {
        e.preventDefault();
        openModal(a.href, a);
      });
    });

    // Controles del visor
    if (overlayReload) {
      overlayReload.addEventListener('click', () => {
        if (overlayFrame && overlayFrame.src) overlayFrame.src = overlayFrame.src;
      });
    }
    if (overlayClose) {
      overlayClose.addEventListener('click', closeModal);
    }
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) closeModal();
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && overlay.classList.contains('open')) closeModal();
    });

    overlayFrame.addEventListener('load', () => {
      try { if (overlayUrl) overlayUrl.textContent = overlayFrame.contentWindow.location.href; } catch {}
    });
  }
});
