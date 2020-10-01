<?php
    class MvcController {
        //Método para llamar a la plantilla template
        public function plantilla(){
            include "View/template.php";
        }
        //Método para mostrar el contenido de las páginas
        public function enlacesPaginasController(){
            //Verificar la variable 'action' que viene desde los URL's de navegacion
            if(isset($_GET["action"])){
                $enlacesController = $_GET["action"];
            }else{
                $enlacesController = "index";
            }
            //Mandar el parámetro de "enlacesController" al modelo "EnlacesPaginas" en su propiedad "enlacesPaginasModel"
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
            include $respuesta;

        }

    }

?>