<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion {


    	public function registroUsuarioModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario,contrasena,email) VALUES (:usuario,:contrasena,:email)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR); 
            $stmt->bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR); 
            $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR); 
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();
    	}
	


	//Método ingreso usuario
        public function ingresoUsuarioModel($datosModel, $tabla){
            //Preparar el PDO
            $stmt=Conexion::conectar()->prepare("SELECT usuario, contrasena FROM $tabla WHERE usuario = :usuario");
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            //Ejecutamos la consulta en PDO
            $stmt->execute();
            //Retornamos el fetch que es el que obtiene una fila o posicion de un array
            return $stmt->fetch();
            //Cerramos el PDO
            $stmt->close();
        }

        public function registroLibroModel($datosModel, $tabla){
			//Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(isbn,nombre,autor,editorial,edicion,year) VALUES (:isbn, :nombre, :autor, :editorial, :edicion, :year)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":isbn", $datosModel["isbn"], PDO::PARAM_STR); 
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR); 
            $stmt->bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR); 
            $stmt->bindParam(":editorial", $datosModel["editorial"], PDO::PARAM_STR); 
            $stmt->bindParam(":edicion", $datosModel["edicion"], PDO::PARAM_STR); 
            $stmt->bindParam(":year", $datosModel["year"], PDO::PARAM_STR); 
            
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();
        }

		public function vistaLibrosModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id, isbn, nombre, autor, editorial, edicion, year FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
		}


        public function editarLibroModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, isbn, nombre, autor, editorial, edicion, year FROM $tabla
            where id  = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        public function actualizarLibrosModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  isbn = :isbn, nombre = :nombre, autor = :autor, editorial = :editorial, edicion = :edicion, year = :year WHERE id  = :id");
            //Ejecutar el QUERY
             $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
 			$stmt->bindParam(":isbn", $datosModel["isbn"], PDO::PARAM_STR); 
            $stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR); 
            $stmt->bindParam(":autor", $datosModel["autor"], PDO::PARAM_STR); 
            $stmt->bindParam(":editorial", $datosModel["editorial"], PDO::PARAM_STR); 
            $stmt->bindParam(":edicion", $datosModel["edicion"], PDO::PARAM_STR); 
            $stmt->bindParam(":year", $datosModel["year"], PDO::PARAM_STR); 
            
            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();
        }
        
        public function borrarLibrosModel($datosModel, $tabla){
            //Preparar el QUERY para eliminar
            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);
        
            //EJECUTAR
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }

            $stmt->close();
        }




	}
?>