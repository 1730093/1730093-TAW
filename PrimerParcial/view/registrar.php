<h1>REGISTRAR USUARIO</h1>
<form method="POST">
    <label>Usuario</label>
    <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
    <p></p>
    <label>Contraseña</label>
    <input type="password" placeholder="Contraseña" name="passwordRegistro" required>
    <p></p>
    <label>Email</label>
    <input type="email" placeholder="Email" name="emailRegistro" required>
    <p></p>
    <input type="submit" value="Enviar">
</form>
<?php
    $registro = new MvcController();
    $registro->registroUsuarioController();
    //Verificar la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }else{
            echo "Fallo";
        }
    }
?>
