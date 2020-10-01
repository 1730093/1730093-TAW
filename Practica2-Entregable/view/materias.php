<?php
//Validar si se tiene una sesion activa
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }


?>

<h1>REGISTRAR MATERIA</h1>
<form method="POST">
    <input type="text" placeholder="Nombre de la materia" name="materiaRegistro" required>
    <input type="text" placeholder="Clave de la materia" name="claveRegistro" required>
    <input type="text" placeholder="Carrera" name="carRegistro" required>
    
    <input type="submit" value="Enviar">
</form>

<?php
    $registroCarrera = new MvcController();
    $registroCarrera -> registroCarreraController();

    //Verificar que la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }
    }
?>



<h1>CARRERAS</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Carrera</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistaCarrera = new MvcController();
                $vistaCarrera -> vistaCarreraController();
                $vistaCarrera -> borrarCarreraController();
            ?>
        </tbody>
    </table>
    <?php
        if(isset($_GET["action"])){
            if($_GET["action"] == "cambio"){
                echo "Cambio exitoso";
                
            }
        }
    ?>
