<?php
class Conexion{
    public function conectar(){
       $link = new PDO("mysql:host=localhost;dbname=bd_practica2", 'root', '');
       return $link;
    }
}

?>