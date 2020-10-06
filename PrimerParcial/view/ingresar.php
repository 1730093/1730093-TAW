<h1>INGRESAR</h1>
<form method="POST">
    <label>Nombre de usuario</label>
    <input type="text" placeholder="Usuario" name="usuarioIngreso" required>
     <p></p>
    <label>Contraseña</label>
    <input type="password" placeholder="Contraseña" name="passwordIngreso" required>
    <p></p>
    <input type="submit" value="Enviar">
</form>

<?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();

    //Verificar la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "fallo"){
            echo "Fallo al ingresar";
        }
    }
?>
