<?php 
class Paginas{
	//Agregar enlaces para materias
	public function enlacesPaginasModel($enlaces){
		if($enlaces == "ingresar" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "libros" || $enlaces == "editarlibro"){
			$module =  "view/".$enlaces.".php";
		} else if($enlaces == "index"){
			$module ="view/registrar.php";
		}else if($enlaces == "ok"){
			$module = "view/registrar.php";
		}else if($enlaces == "fallo"){
			$module = "view/ingresar.php";
		}else if($enlaces == "cambio"){
			$module = "view/ingresar.php";
		}else{
			$module = "view/ingresar.php";
		}
		return $module;
	}
}

?>