<?php
    //Validar si se tiene una sesion activa
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }


?>

<h1>REGISTRAR LIBRO</h1>
<form method="POST">

    <input type="text" placeholder="ISBN del libro" name="isbnRegistro" maxlength="13" required>
    <input type="text" placeholder="Nombre del libro" name="nombreRegistro" maxlength="50" required>
    <input type="text" placeholder="Autor del libro" name="autorRegistro" maxlength="50" required>
    <input type="text" placeholder="Editorial del libro" name="editorialRegistro" maxlength="50" required>
    <input type="text" placeholder="Edicion del libro" name="edicionRegistro" maxlength="50" required>
    <input type="text" placeholder="Año del libro" name="yearRegistro" maxlength="4" required>
    <input type="submit" value="Enviar">
</form>

<?php
    $registrolibro = new MvcController();
    $registrolibro -> registroLibroController();

    //Verificar que la URL correcta
    if(isset($_GET["action"])){
        if($_GET["action"] == "ok"){
            echo "Registro exitoso";
        }
    }
?>



<h1>LIBROS</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Edición</th>
                <th>Año</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistalibro = new MvcController();
                $vistalibro -> vistaLibrosController();
                $vistalibro -> borrarLibroController();
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
