<?php
    final class Conexion {
        public function conectar() {
            echo "Conectado a la base de datos.";
        }
    }

    // ❌ Esto daría error:
    // class MiConexion extends Conexion {} 
    // Fatal error: Class MiConexion may not inherit from final class (Conexion)

    $conexion = new Conexion();
    $conexion->conectar();
?>