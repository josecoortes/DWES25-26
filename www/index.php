<?php
// ======= CONFIG =======
$alumno     = "Jose Cortes Martin";
$asignatura = "Desarrollo Web en Entorno Servidor";
$curso      = "2025/26";
$github     = "https://github.com/josecoortes/DWES25-26"; 

// Patrones: carpetas unidadX / actY
$patronUnidad = '/^unidad(\d+)$/i';
$patronAct    = '/^act(\d+)$/i';

// Ignorar
$ignorarArchivos = ['index.php', '_helpers.php'];

// ======= HELPERS =======
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

function leerMeta($ruta){
  $meta = ['title'=>null,'desc'=>null,'tags'=>[],'code'=>null];
  $base = basename($ruta, '.php');
  if (strpos($base, '--') !== false){
    [, $titulo] = explode('--', $base, 2);
    $meta['title'] = trim(str_replace(['_','-'], [' ',' '], $titulo));
  }
  $fh = @fopen($ruta, 'r');
  if(!$fh) return $meta;
  $buf = '';
  for($i=0; $i<60 && !feof($fh); $i++){ $buf .= fgets($fh); }
  fclose($fh);

  if(preg_match('/\/\*\s*---(.*?)---\s*\*\//s', $buf, $m)){
    $yaml = trim($m[1]);
    foreach(preg_split('/\R+/', $yaml) as $line){
      if(!trim($line)) continue;
      if(preg_match('/^\s*([a-zA-Z]+)\s*:\s*(.+)\s*$/', $line, $mm)){
        $k = strtolower(trim($mm[1]));
        $v = trim($mm[2]);
        if($k === 'tags'){
          if(preg_match('/^\[(.*)\]$/', $v, $t)){ $v = $t[1]; }
          $meta['tags'] = array_values(array_filter(array_map('trim', preg_split('/[,;]+/', $v))));
        } elseif($k === 'title'){ $meta['title'] = $v; }
          elseif($k === 'desc'){ $meta['desc'] = $v; }
          elseif($k === 'code'){ $meta['code'] = $v; }
      }
    }
  }

  if(preg_match_all('/^\s*\/\/\s*([a-zA-Z]+)\s*:\s*(.+)\s*$/m', $buf, $mm, PREG_SET_ORDER)){
    foreach($mm as $m2){
      $k = strtolower(trim($m2[1]));
      $v = trim($m2[2]);
      if($k === 'tags'){
        $meta['tags'] = array_values(array_filter(array_map('trim', preg_split('/[,;]+/', $v))));
      } elseif($k === 'title'){ $meta['title'] = $v; }
        elseif($k === 'desc'){ $meta['desc'] = $v; }
        elseif($k === 'code'){ $meta['code'] = $v; }
    }
  }

  return $meta;
}

/**
 * Recolecta ejercicios:
 *  - PHP directamente en unidadX/actY/: actN_M.php o actN_M--*.php
 *  - Subcarpetas unidadX/actY/actN_M/ con actN_M.php o actN_M--*.php dentro
 */
function recogerMapa($patronUnidad, $patronAct, $ignorarArchivos){
  $mapa = [];
  $ignorarLC = array_map('strtolower', $ignorarArchivos);

  foreach (scandir('.') as $u) {
    if ($u[0]==='.' || !is_dir($u)) continue;
    if (!preg_match($patronUnidad, $u, $mu)) continue;
    $numU = (int)$mu[1];

    foreach (glob("$u/*", GLOB_ONLYDIR) ?: [] as $aDir) {
      $a = basename($aDir);
      if (!preg_match($patronAct, $a, $ma)) continue;
      $numA = (int)$ma[1];

      $files = [];

      // 1) Ficheros PHP directamente en unidadX/actY/
      foreach (glob("$aDir/*.php") ?: [] as $f) {
        $base = basename($f);
        if (in_array(strtolower($base), $ignorarLC, true)) continue;
        if (preg_match('/^act\d+_\d+(?:--.*)?\.php$/i', $base)) {
          $files[] = $f;
        }
      }

      // 2) Subcarpetas actN_M dentro de unidadX/actY/
      foreach (glob("$aDir/*", GLOB_ONLYDIR) ?: [] as $subDir) {
        $sub = basename($subDir);
        if (!preg_match('/^act\d+_\d+$/i', $sub)) continue;

        // a) actN_M/actN_M.php
        $cand = "$subDir/$sub.php";
        if (is_file($cand) && !in_array(strtolower(basename($cand)), $ignorarLC, true)) {
          $files[] = $cand;
          continue;
        }

        // b) actN_M/actN_M--*.php (tomamos el primero que encaje)
        foreach (glob("$subDir/*.php") ?: [] as $f2) {
          $base2 = basename($f2);
          if (in_array(strtolower($base2), $ignorarLC, true)) continue;
          if (preg_match('/^'.preg_quote($sub,'/').'(?:--.*)?\.php$/i', $base2)) {
            $files[] = $f2;
            break;
          }
        }
      }

      // Construir entradas
      foreach ($files as $f) {
        $base = basename($f);

        $m = leerMeta($f);
        $titulo = $m['title'] ?: preg_replace('/[_-]+/',' ', pathinfo($base, PATHINFO_FILENAME));
        $desc   = $m['desc']  ?: '';
        $tags   = $m['tags']  ?: [];
        $code   = $m['code']  ?: '';

        $mapa[$numU][$numA][] = [
          'file'   => $f,
          'titulo' => $titulo,
          'desc'   => $desc,
          'tags'   => $tags,
          'code'   => $code,
        ];
      }

      if (!empty($mapa[$numU][$numA])) {
        usort($mapa[$numU][$numA], fn($x,$y)=>strnatcasecmp($x['file'],$y['file']));
      }
    }
  }

  ksort($mapa, SORT_NUMERIC);
  foreach ($mapa as $uNum => $_acts) {
    ksort($mapa[$uNum], SORT_NUMERIC);
  }
  return $mapa;
}

$mapa = recogerMapa($patronUnidad, $patronAct, $ignorarArchivos);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portafolio · <?=h($alumno)?></title>
  <link rel="stylesheet" href="assets/style.css?v=7">
  <style>
    /* ===== Modal overlay (visor) — SIN CAMBIOS ===== */
    .overlay{position:fixed;inset:0;background:rgba(0,0,0,.55);display:none;z-index:9999;backdrop-filter:blur(2px)}
    .overlay.open{display:block}
    .overlay .sheet{position:absolute;inset:5vh 5vw auto 5vw;height:90vh;background:#0f1218;border:1px solid #222;border-radius:14px;box-shadow:0 12px 30px rgba(0,0,0,.5);display:flex;flex-direction:column;overflow:hidden;animation:pop .18s ease}
    .overlay .bar{display:flex;align-items:center;gap:10px;padding:10px 14px;background:#111;border-bottom:1px solid #222;color:#ddd;font:14px system-ui}
    .overlay .url{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;flex:1;color:#aaa}
    .overlay .btn{border:1px solid #333;background:#1a1f2e;color:#ddd;border-radius:8px;padding:6px 10px;cursor:pointer}
    .overlay iframe{width:100%;height:100%;border:0;background:#fff;flex:1}
    @keyframes pop{from{transform:scale(.985);opacity:0}to{transform:scale(1);opacity:1}}
    html.modal-open,body.modal-open{overflow:hidden}
  </style>
  <script>
  // Detecta si este documento está dentro de un iframe llamado "visor"
  (function(){
    const isEmbedded = (window.name === 'visor');
    document.documentElement.setAttribute('data-embed', isEmbedded ? '1' : '0');
  })();
  </script>
</head>
<body>
<header class="header">
  <div class="brand">
    <img src="assets/banner.png" alt="Banner" class="banner">
    <div class="title">
      <h1 id="studentName"><?=h($alumno)?></h1>
      <p id="metaLine" class="muted">
        <?=h($asignatura)?> · <?=h($curso)?>
      </p>
      <p>
        <a class="btn" href="<?=h($github)?>" target="_blank" rel="noopener" onclick="event.stopPropagation(); window.open(this.href,'_blank','noopener'); return false;">Ver código en GitHub</a>
      </p>
    </div>
  </div>
  <input id="q" type="search" placeholder="Buscar ejercicio…">
</header>

<?php if($mapa): ?>
  <!-- ===== Filtros de UNIDADES (solo botones, filtran sin abrir visor) ===== -->
  <nav class="unit-filter" aria-label="Filtrar por unidad">
    <div class="unit-filter-wrap">
      <button type="button" class="ghost unit-btn active" data-unit="">Todas</button>
      <?php foreach(array_keys($mapa) as $uNum): ?>
        <button type="button" class="ghost unit-btn" data-unit="<?=h($uNum)?>">Unidad <?=h($uNum)?></button>
      <?php endforeach; ?>
    </div>
  </nav>
<?php endif; ?>

<!-- ===== Visor modal overlay (solo al abrir ejercicio) ===== -->
<div id="overlay" class="overlay" aria-hidden="true">
  <div class="sheet" role="dialog" aria-modal="true" aria-label="Visor de ejercicio">
    <div class="bar">
      <strong>Visor</strong>
      <span id="overlayUrl" class="url"></span>
      <button id="overlayReload" class="btn" title="Recargar">Recargar</button>
      <button id="overlayClose" class="btn" title="Cerrar">Cerrar</button>
    </div>
    <iframe id="overlayFrame" name="overlayFrame"></iframe>
  </div>
</div>

<main class="container" id="root">
  <?php if(!$mapa): ?>
    <p class="empty">No se han encontrado ejercicios.
      Crea carpetas <code>unidad1/act1/</code> y sube tus <code>actN_N.php</code>.
    </p>
  <?php else: ?>
    <?php foreach($mapa as $uNum => $acts): ?>
      <section class="unit" data-unit="<?=h($uNum)?>">
        <h1>&nbsp;📚 Unidad <?=h($uNum)?></h1>
        <?php foreach($acts as $aNum => $ejercicios): ?>
          <div class="unit-head">
            <div class="unit-title">
              <span class="pill">💡 Actividad</span>
              <h3 style="margin:0">Act <?=h($aNum)?></h3>
            </div>
            <div class="pill count"><?=count($ejercicios)?> ejercicio(s)</div>
          </div>
          <div class="grid">
            <?php foreach($ejercicios as $ej): ?>
              <article class="card" data-tags="<?=h(implode(' ', $ej['tags']))?>">
                <h3>📝 <?=h($ej['titulo'])?></h3>
                <p><?=h($ej['desc'])?></p>
                <?php if($ej['tags']): ?>
                  <div class="tags">
                    🏷️<?php foreach($ej['tags'] as $t): ?><span class="tag"><?=h($t)?></span><?php endforeach; ?>
                  </div>
                <?php endif; ?>
                <div class="actions">
                  <a class="btn open-ej" href="<?=h($ej['file'])?>">Abrir</a>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </section>
    <?php endforeach; ?>
  <?php endif; ?>
</main>

<script>
// ===== Buscador
const q = document.getElementById('q');
q.addEventListener('input', () => {
  const term = q.value.trim().toLowerCase();
  document.querySelectorAll('.card').forEach(card => {
    const text = card.innerText.toLowerCase();
    card.style.display = text.includes(term) ? '' : 'none';
  });
});

// ===== Filtro por UNIDAD (no visor, no anclas)
(function(){
  const wrap = document.querySelector('.unit-filter');
  if(!wrap) return;
  const buttons = Array.from(wrap.querySelectorAll('.unit-btn'));
  const sections = Array.from(document.querySelectorAll('section.unit'));

  function applyFilter(unit){
    sections.forEach(sec => {
      sec.style.display = (!unit || sec.dataset.unit === unit) ? '' : 'none';
    });
  }
  function setActive(btn){
    buttons.forEach(b => {
      const on = (b === btn);
      b.classList.toggle('active', on);
      b.setAttribute('aria-pressed', on ? 'true' : 'false');
    });
  }
  buttons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const unit = btn.dataset.unit || '';
      applyFilter(unit);
      setActive(btn);
      // document.getElementById('root').scrollIntoView({behavior:'smooth',block:'start'});
    });
  });
})();

// ===== Visor (igual que antes)
(function(){
  const isEmbedded = document.documentElement.getAttribute('data-embed') === '1';
  const links = document.querySelectorAll('.actions .open-ej');
  if (isEmbedded) { links.forEach(a => a.setAttribute('target', 'visor')); return; }

  const overlay = document.getElementById('overlay');
  const overlayFrame = document.getElementById('overlayFrame');
  const overlayUrl = document.getElementById('overlayUrl');
  const overlayClose = document.getElementById('overlayClose');
  const overlayReload = document.getElementById('overlayReload');
  let __lockScrollY = 0;

  function lockScroll(){ __lockScrollY = window.scrollY||window.pageYOffset;
    const sbw = window.innerWidth - document.documentElement.clientWidth;
    if (sbw>0) document.body.style.paddingRight = sbw+'px';
    document.body.style.position='fixed'; document.body.style.top=`-${__lockScrollY}px`;
    document.body.style.left='0'; document.body.style.right='0'; document.body.style.width='100%';
  }
  function unlockScroll(){ const y = __lockScrollY;
    document.body.style.position=''; document.body.style.top=''; document.body.style.left='';
    document.body.style.right=''; document.body.style.width=''; document.body.style.paddingRight='';
    window.scrollTo(0,y);
  }
  function openModal(url){
    overlayFrame.src = url; overlayUrl.textContent = url;
    overlay.classList.add('open'); document.documentElement.classList.add('modal-open'); document.body.classList.add('modal-open');
    lockScroll();
  }
  function closeModal(){ overlay.classList.remove('open');
    document.documentElement.classList.remove('modal-open'); document.body.classList.remove('modal-open'); unlockScroll();
  }

  links.forEach(a => { a.addEventListener('click', (e)=>{ e.preventDefault(); openModal(a.href); }); });
  overlayReload.addEventListener('click', ()=>{ if(overlayFrame && overlayFrame.src) overlayFrame.src = overlayFrame.src; });
  overlayClose.addEventListener('click', closeModal);
  overlay.addEventListener('click', (e)=>{ if(e.target===overlay) closeModal(); });
  document.addEventListener('keydown', (e)=>{ if(e.key==='Escape' && overlay.classList.contains('open')) closeModal(); });
  overlayFrame.addEventListener('load', ()=>{ try{ overlayUrl.textContent = overlayFrame.contentWindow.location.href; }catch{} });
})();
</script>
</body>
</html>