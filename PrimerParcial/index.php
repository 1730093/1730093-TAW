<?php
    //Invoca al controlador y modelo solicitado

    require_once "controller/controller.php";
    require_once "controller/controller.php";
    
    //Se crea un nuevo controlador llamando a la plantilla que mostrará al usuario
    $mvc = new MvcController();
    $mvc -> plantilla();
?>