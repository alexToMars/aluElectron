<?php
    class Conexion{
        private $servidor = 'localhost';
        //private $db = 'estelectron2';
        private $db = 'id22282349_estelectron';
        private $puerto = 3306;
        //private $puerto=4000;
        private $charset = "utf8";
        //private $usuario = 'root';
        private $usuario="id22282349_estelectron";
        //private $password = '';
        private $password = 'uKJHaY+sk.4CU3$';
        public $pdo = null;
        private $atributos = [PDO::ATTR_CASE=>PDO::CASE_LOWER,PDO::CASE_LOWER,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_ORACLE_NULLS=>PDO::NULL_EMPTY_STRING
            ,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ];

        function __construct(){
            $this -> pdo = new PDO ("mysql:dbname={$this->db};host={$this->servidor};port={$this->puerto};charset={$this->charset}",
                $this->usuario, $this->password,$this->atributos);
        }
    }
?>