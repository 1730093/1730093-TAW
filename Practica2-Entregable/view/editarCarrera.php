<?php
//Validar si se tiene una sesion activa
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }

?>
<h1>EDITAR CARRERA</h1>
<form method="POST">
    <?php
        $editarCarrea = new MvcController();
        $editarCarrea -> editarCarreraController();
        $editarCarrea -> actualizarCarreraController();
    ?>

</form>