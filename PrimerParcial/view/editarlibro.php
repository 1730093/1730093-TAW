<?php
//Validar si se tiene una sesion activa
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }

?>
<h1>EDITAR LIBRO</h1>
<form method="POST">
    <?php
        $editarlibro = new MvcController();
        $editarlibro -> editarLibroController();
        $editarlibro -> actualizarLibroController();
    ?>
</form>