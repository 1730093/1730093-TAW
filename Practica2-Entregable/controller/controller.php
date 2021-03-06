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
                    header("location:index.php?action=usuarios");
                }else{
                    header("location:index.php?action=fallo");
                }
            }
        }


        //Método VISTA USUARIOS
        public function vistaUsuariosController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistaUsuariosModel("usuarios");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["usuario"].'</td>
                    <td>'.$item["contrasena"].'</td>
                    <td>'.$item["email"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editar&id='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>ELIMINAR</button></a></td>
                    
                </tr>';

            }
        }

        //MÉTODO LISTAR USUARIOS PARA EDITAR
        public function editarUsuarioController(){
            //Solicitar el id del usuarios a editar
            $datosController = $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarUsuarioModel($datosController, "usuarios");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'<input type="hidden" value="'.$respuesta["id"].'"
                name="idEditar">
                <input type="text" value ="'.$respuesta["usuario"].'"
                name="usuarioEditar" required>
                <input type="text" value="'.$respuesta["contrasena"].'"
                name="passwordEditar" required>
                <input type="text" value="'.$respuesta["email"].'"
                name="emailEditar" required>
                <input type="submit" value= "Actualizar">';
        }
        //MÉTODO PARA ACTUALIZAR USUARIOS
        public function actualizarUsuariosController(){
            if(isset($_POST["usuarioEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "usuario"=>$_POST["usuarioEditar"],
                                        "contrasena"=>$_POST["passwordEditar"],
                                        "email"=>$_POST["emailEditar"]);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta == "success"){
                    header("location:index.php?action=cambio");
                }else{
                    echo "error";
                }                                    
            }
        }

        //Borrado de usuarios
        public function borrarUsuarioController(){
            if(isset($_GET["idBorrar"])){
                $datosController = $_GET["idBorrar"];
                //Mandar ID  al controlador para que ejecute el DELETE.
                $respuesta = Datos::borrarUsuariosModel($datosController, "usuarios");
                //Recibimos la respuesta del modelo de eliminación 
                if($respuesta == "success"){
                    header("location:index.php?action=usuarios");
                }
            }
        }

    //-------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------    
    // AQUI COMIENZAN METODOS PARA CARRERA


    public function registroCarreraController(){
        //Almaceno en un array los valores de la vista de registro
        if(isset($_POST["carreraRegistro"])){       
            $datosController = array("nombre"=>$_POST["carreraRegistro"]);
            //Enviamos los parámetros al Modelo para que procese el registro
            $respuesta = Datos::registroCarreraModel($datosController, "carreras");

            //Recibir la repuesta del modelo para saber que sucedió (success o error) 
            if($respuesta == "success"){
                header("location:index.php?action=carreras");
            }else{
                //header("location:index.php");    
            }
        }
    }
     public function vistaCarreraController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistaCarreraModel("carreras");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["nombre"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editarCarrera&id='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=carreras&idBorrarC='.$item["id"].'"><button>ELIMINAR</button></a></td>   
                </tr>';

            }
        }

         public function editarCarreraController(){
            //Solicitar el id de la carrera a editar
            $datosController = $_GET["id"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarCarreraModel($datosController, "carreras");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'<input type="hidden" value="'.$respuesta["id"].'"
                name="idEditar">
                <input type="text" value ="'.$respuesta["nombre"].'"
                name="carreraEditar" required>
                <input type="submit" value= "Actualizar">';
        }

        public function actualizarCarreraController(){
            if(isset($_POST["carreraEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "carrera"=>$_POST["carreraEditar"]);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarCarreraModel($datosController,"carreras");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=carreras");
                }else{
                    echo "error";
                }                                    
            }
        }

        public function borrarCarreraController(){
            if(isset($_GET["idBorrarC"])){
                $datosController = $_GET["idBorrarC"];
                    //Mandar ID  al controlador para que ejecute el DELETE.
                $respuesta = Datos::borrarCarreraModel($datosController, "carreras");

                //Recibimos la respuesta del modelo de eliminación 
                if($respuesta == "success"){
                    header("location:index.php?action=carreras");
                }
            }
        }



    //-------------------------------------------------------------------------------
    //-------------------------------------------------------------------------------    
    // AQUI COMIENZAN METODOS PARA MATERIA

    public function registroMateriaController(){
        //Almaceno en un array los valores de la vista de registro
        if(isset($_POST["materiaRegistro"])){       
            //$id_carrera=$_REQUEST['idCarreraa'];
            $datosController = array("nombre"=>$_POST["materiaRegistro"],
                                    "clave"=>$_POST["claveRegistro"],
                                    "idcarrera"=>$_POST["mi_select"]);

            //Enviamos los parámetros al Modelo para que procese el registro
            $respuesta = Datos::registroMateriaModel($datosController, "materias");

            //Recibir la repuesta del modelo para saber que sucedió (success o error) 
            if($respuesta == "success"){
                header("location:index.php?action=materias");
            }else{
                //header("location:index.php");    
            }
        }
    }

 

     public function vistaMateriaController(){
            //Envio al Modelo la variable de control y la tabla a donde se hará la consulta.
            $respuesta = Datos::vistaMateriaModel("vmateycarr");
            foreach ($respuesta as $row => $item){
                echo '<tr>
                    <td>'.$item["nombre"].'</td>
                    <td>'.$item["clave"].'</td>
                    <td>'.$item["carrera"].'</td>
                    <!--COLUMNA PARA EDITAR -->
                    <td><a href="index.php?action=editarMateria&idM='.$item["id"].'"><button>EDITAR</button></a></td>
                    <!--COLUMNA PARA BORRAR -->
                    <td><a href="index.php?action=materias&idBorrarM='.$item["id"].'"><button>ELIMINAR</button></a></td>   
                </tr>';

            }
        }

         public function editarMateriaController(){
            //Solicitar el id de la carrera a editar
            $datosController = $_GET["idM"];
            //Enviamos al modelo el id para hacer la consulta y obtener sus datos
            $respuesta = Datos::editarMateriaModel($datosController, "materias");
            //Recibimos respuesta del modelo e IMPRIMIMOS UNA FORM PARA EDITAR
            echo'
                <input type="hidden" value="'.$respuesta["id"].'"
                name="idEditar">
                <input type="text" value ="'.$respuesta["nombre"].'"
                name="nombrecarreraEditar" required>
                <input type="text" value ="'.$respuesta["clave"].'"
                name="clavecarreraEditar" required>';
                $respuesta2 = Datos::vistaCarreraModel("carreras");
                echo '<select id="mi_select" name="mi_select">
                <option value="'.">Seleccionar carrera</option>";
                foreach($respuesta2 as $row => $item){
                    echo '<option value="'.$item["id"].'">'.$item["nombre"].'</option>';
                    }
                echo '</select>
                    <input type="submit" value= "Actualizar">';
        }

        public function actualizarMateriaController(){
            if(isset($_POST["nombrecarreraEditar"])){
                //Preparamos un array con los id de el form del controlador 
                //anterior para ejecutar la actualizacion en un modelo.
                $datosController=array("id"=>$_POST["idEditar"],
                                        "carrera"=>$_POST["nombrecarreraEditar"],
                                        "clave"=>$_POST["clavecarreraEditar"],
                                        "idcarrera"=>$_POST["mi_select"]);
                //Enviar el array a el modelo que generara el UPDATE
                $respuesta = Datos::actualizarMateriaModel($datosController,"materias");
                //Recibimos respuesta del modelo para determinar si se llevo a cabo el UPDATE de manera correcta
                if($respuesta=="success"){
                    header("location:index.php?action=materias");
                }else{
                    echo "error";
                }                                    
            }
        }

        public function borrarMateriaController(){
            if(isset($_GET["idBorrarM"])){
                $datosController = $_GET["idBorrarM"];
                    //Mandar ID  al controlador para que ejecute el DELETE.
                $respuesta = Datos::borrarMateriaModel($datosController, "materias");

                //Recibimos la respuesta del modelo de eliminación 
                if($respuesta == "success"){
                    header("location:index.php?action=materias");
                }
            }
        }

    }

?>