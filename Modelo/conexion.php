<?php
class Conexion
{
    public $con;

    public function __construct()
    {
        try {
            $this->con= new PDO('mysql:dbname=sistemaarchivos;host=localhost','root','');
        } catch (PDOException $e) {
            print_r($e);
        }
    }
}
// $conexion = new \Conexion();
?>