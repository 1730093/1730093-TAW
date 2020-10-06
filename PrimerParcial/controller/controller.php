<?php
    class MvcController {
        //Método para llamar a la plantilla template
        public function plantilla(){
            include "view/template.php";
        }
        //Método para mostrar los enlaces de la página
        public function enlacesPaginasController(){
           if(isset($_GET['action'])){
                $enlaces = $_GET['action'];
           }else{
                $enlaces = "index";
           }
           $respuesta=Paginas::enlacesPaginasModel($enlaces);
           include $respuesta;
        }

        //Método para registro de usuarios
        public function registroUsuarioController(){
            //Almaceno en un array los valores de la vista de registro
            if(isset($_POST["usuarioRegistro"])){       
                $datosController = array("usuario"=>$_POST["usuarioRegistro"],
                                        "contrasena"=>$_POST["passwordRegistro"], 
                                        "email"=>$_POST["emailRegistro"]);
                //Enviamos los parámetros al Modelo para que procese el registro
                $respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

                    //Recibir la repuesta del modelo para saber que sucedió (success o error) 
                if($respuesta == "success"){
                    header("location:index.php?action=ok");
                }else{
                    header("location:index.php");    
                }
            }
        }

        //Método para INGRESO DE USUARIOS
        public function ingresoUsuarioController(){
            if(isset($_POST["usuarioIngreso"])){
                $datosController = array("usuario"=>$_POST["usuarioIngreso"],
                                         "password"=>$_POST["passwordIngreso"]);
                //Mandar valores del array al modelo
                $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");
                
                //Recibe respuesta del modelo 
                if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["contrasena"] == $_POST["passwordIngreso"]){
                    session_start();
                    $_SESSION["validar"] = true;
                    header("location:index.php?action=libros");
                }else{
                    header("location:index.php?action=fallo");
                }
            }
        }


        
    //-------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------    
    // AQUI COMIENZAN METODOS PARA LIBROS


    public function registroLibroController(){
        //Almaceno en un array los valores de la vista de registro
        if(isset($_POST["nombreRegistro"])){       
            $datosController = array("isbn"=>$_POST["isbnRegistro"],
                                    "nombre"=>$_POST["nombreRegistro"],
                                    "autor"=>$_POST["autorRegistro"],
                                    "editorial"=>$_POST["editorialRegistro"],
                                    "edicion"=>$_POST["edicionRegistro"],
                                    "year"=>$_POST["yearRegistro"]
                                    );
            //Enviamos los parámetros al Modelo para que procese el registro
            $respuesta = Datos::registroLibroModel($datosController, "libros");

            //Recibir la repuesta del modelo para saber que sucedió (success o error) 
            if($respuesta == "success"){
                header("location:index.php?action=libros");
            }else{
                //header("location:index.php");    
            }
        }
    }
     public function vistaLibrosController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistaLibrosModel("libros");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["isbn"].'</td>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["autor"].'</td>
                    <td>'.$item["editorial"].'</td>
                    <td>'.$item["edicion"].'</td>
                    <td>'.$item["year"].'</td>
                    
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editarlibro&idEditarL='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=libros&idBorrarL='.$item["id"].'"><button>ELIMINAR</button></a></td>   
                </tr>';

            }
        }

         public function editarLibroController(){
            //Solicitar el id del libro a editar
            $datosController = $_GET["idEditarL"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarLibroModel($datosController, "libros");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'<input type="hidden" value="'.$respuesta["id"].'"
                name="idEditar">
                <input type="text" value ="'.$respuesta["isbn"].'"
                name="isbnEditar" required>
                <input type="text" value ="'.$respuesta["nombre"].'"
                name="nombreEditar" required>
                <input type="text" value ="'.$respuesta["autor"].'"
                name="autorEditar" required>
                <input type="text" value ="'.$respuesta["editorial"].'"
                name="editorialEditar" required>
                <input type="text" value ="'.$respuesta["edicion"].'"
                name="edicionEditar" required>
                <input type="number" value ="'.$respuesta["year"].'"
                name="yearEditar" required>
                <input type="submit" value= "Actualizar">';
        }

        public function actualizarLibroController(){
            if(isset($_POST["idEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                    "isbn"=>$_POST["isbnEditar"],
                                    "nombre"=>$_POST["nombreEditar"],
                                    "autor"=>$_POST["autorEditar"],
                                    "editorial"=>$_POST["editorialEditar"],
                                    "edicion"=>$_POST["edicionEditar"],
                                    "year"=>$_POST["yearEditar"]
                                        );
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarLibrosModel($datosController,"libros");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=libros");
                }else{
                    echo "error";
                }                                    
            }
        }

        public function borrarLibroController(){
            if(isset($_GET["idBorrarL"])){
                $datosController = $_GET["idBorrarL"];
                    //Mandar ID  al controlador para que ejecute el DELETE.
                $respuesta = Datos::borrarLibrosModel($datosController, "libros");

                //Recibimos la respuesta del modelo de eliminación 
                if($respuesta == "success"){
                    header("location:index.php?action=libros");
                }
            }
        }






    }

?>