<?php

// Importamos las clases de los modelos que este controlador necesita.
require_once __DIR__ . '/../modelo/curso_modelo.php';
require_once __DIR__ . '/../modelo/estudiante_modelo.php';

class InstitutoControlador {

    private $curso;
    private $estudiante;

    public function __construct(CursoModelo $curso, EstudianteModelo $estudiante) {
        $this->curso = $curso;
        $this->estudiante = $estudiante;
    }

    public function ejecutar(): array {
        
        // --- 1. LIMPIEZA INICIAL ---
        $this->estudiante->vaciarTodo();
        $this->curso->vaciarTodo();

        // --- 2. INSERTAR CURSOS ---
        $this->curso->agregar("Desarrollo Web Full Stack");
        $this->curso->agregar("Ciencia de Datos e IA");
        $this->curso->agregar("Diseño UX/UI");

        // Obtenemos los IDs de los cursos
        $idCursoWeb = $this->curso->idPorNombre("Desarrollo Web Full Stack");
        $idCursoDatos = $this->curso->idPorNombre("Ciencia de Datos e IA");
        
        // Capturamos la lista de cursos para la vista
        $cursos = $this->curso->todos();

        // --- 3. INSERTAR ESTUDIANTES ---
        $this->estudiante->agregar("Ana Gómez", 22, $idCursoWeb);
        $this->estudiante->agregar("Luis Fernández", 25, $idCursoDatos);
        $this->estudiante->agregar("Carla Sanz", 21, $idCursoWeb);
        $this->estudiante->agregar("Marcos Rey", 23, null); // Estudiante sin curso

        // Capturamos el estado inicial de estudiantes
        $listaInicial = $this->estudiante->conCurso();

        // --- 4. MODIFICAR UN ESTUDIANTE ---
        $this->estudiante->actualizarPorNombre(
            "Carla Sanz",       // nombreActual
            "Carla Sanz Pérez", // nuevoNombre
            22,                 // nuevaEdad
            $idCursoDatos       // nuevoCursoId
        );
        
        // Capturamos el estado tras la modificación
        $listaModificada = $this->estudiante->conCurso();

        // --- 5. ELIMINAR UN ESTUDIANTE ---
        $this->estudiante->eliminarPorNombre("Luis Fernández");

        // --- 6. OBTENER DATOS FINALES ---
        $listaFinal = $this->estudiante->conCurso();

        // --- 7. DEVOLVER EL ARRAY ESTRUCTURADO ---
        return [
            'cursos' => $cursos,
            'listaInicial' => $listaInicial,
            'listaModificada' => $listaModificada,
            'listaFinal' => $listaFinal
        ];
    }
}