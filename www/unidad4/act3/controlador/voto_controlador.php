<?php

class VoteController
{
    private $model;

    public function __construct(optionModel $model)
    {
        $this->model = $model;
    }

    public function ejecutar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (isset($_POST['voto'])) {
                $this->model->votar($_POST['voto']);
            }

            if (isset($_POST['eliminar'])) {
                $this->model->eliminar($_POST['eliminar']);
            }

            if (isset($_POST['texto']) && !empty($_POST['texto'])) {
                $this->model->agregarOpcion($_POST['texto']);
            }
        }

        $listaOpciones = $this->model->obtenerOpciones();

        $totalVotos = 0;
        if ($listaOpciones) {
            foreach ($listaOpciones as $opcion) {
                $totalVotos += $opcion['votos'];
            }
        }

        return [
            'opciones' => $listaOpciones,
            'total'    => $totalVotos
        ];
    }
}
?>