<?php
    class Conexion{
        public $con;

        public function __construct(){

            try{
                $this->con = new mysqli('localhost', 'root', '', 'registro_usuarios');
            }catch(Exception $pe){
                echo "Error en la Conexion" . $pe->getMessage();
            }
        }

        public function getConn(){
            return $this->con;
        }
    }
?>