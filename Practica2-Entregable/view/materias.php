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
    <?php
    $respuesta = Datos::vistaCarreraModel("carreras");
        echo ' <select id="mi_select" name="mi_select">
                <option value="">Seleccionar carrera</option>';
                    foreach($respuesta as $row => $item){
                    echo '<option value="'.$item["id"].'">'.$item["nombre"].'</option>';
                }
        echo    '</select>';
    ?>
    <input type="submit" value="Enviar">
</form>

<?php
    $registroMateria = new MvcController();
    $registroMateria -> registroMateriaController();
    //$registroMateria -> listarCarreraController();
    //Verificar que la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }
    }
?>



<h1>MATERIAS</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Clave</th>
                <th>Carrera</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistaMateria = new MvcController();
                $vistaMateria -> vistaMateriaController();
                $vistaMateria -> borrarMateriaController();
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
