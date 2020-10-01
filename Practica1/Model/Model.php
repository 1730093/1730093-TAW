<?php
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class EnlacesPaginas{
        public function enlacesPaginasModel($enlacesModel){
            //Retorno de los valores de la variable a través del GET
            if($enlacesModel == "nosotros" || $enlacesModel == "servicios" || $enlacesModel=="contactenos"){
                //Mostrar la vista correspondiente segun la opcion seleccionada, y se manda la respuesta al controlador
                $module ="View/" . $enlacesModel . ".php";
            }else if($enlacesModel == "index"){
                $module = "View/inicio.php";       
            }else{//Validar que si escriben basura en la URL en el parámetro de la variable action, redireccionar a inicio.php
                $module = "View/inicio.php";
            }
            return $module;
        }
    }
?>