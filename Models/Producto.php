<?php
    include_once 'Conexion.php';

    class Producto{
        var $objetos;
        public $acceso;
        public function __construct(){
            $db = new Conexion();
            $this ->acceso = $db->pdo;
        }
        function obtener_productos(){
            $sql = "SELECT*FROM producto";
            $query = $this->acceso->prepare($sql);
            $query -> execute();
            $this->objetos =$query->fetchAll();
            return $this->objetos;
        }
        public function obtenerProductoPorId($id) {
            $sql = "SELECT * FROM producto WHERE idP=:id";
            $query = $this->acceso->prepare($sql);
            $query ->execute(array(':id'=>$id));
            $this->objetos =$query->fetchAll();
            return $this->objetos;
        }
    
    }