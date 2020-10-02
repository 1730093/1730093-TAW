<?php
    require_once "conexion.php";
    //Modelo que permite mostrar el enlace de las paginas con las vistas
    class Datos extends Conexion {
        //Método del modelo de registro de usuarios (Recibe datos del controlador)
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

        //MÉTODO PARA VISTA USUARIOS (TABLA)
        public function vistaUsuariosModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, contrasena, email FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }

        //Método para SELECCIONAR usuarios
        public function editarUsuarioModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, contrasena, email FROM $tabla
            where id = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }
        //Método para ACTUALIZAR usuarios (UPDATE)
        public function actualizarUsuarioModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario= :usuario, contrasena= :contrasena, email = :email WHERE id = :id");
            //Ejecutar el QUERY
            $stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datosModel["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();


        }
        //Borrar USUARIOS
        public function borrarUsuariosModel($datosModel, $tabla){
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

        //-------------------------------------------------------------------------------
        //-------------------------------------------------------------------------------    
        // AQUI COMIENZAN METODOS PARA CARRERA

        public function registroCarreraModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:carrera)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":carrera", $datosModel["nombre"], PDO::PARAM_STR); 
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();
        }

        public function vistaCarreraModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id , nombre FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }
        
        public function editarCarreraModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id , nombre FROM $tabla
            where id  = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        public function actualizarCarreraModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre= :carrera WHERE id  = :id");
            //Ejecutar el QUERY
            $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();
        }
        
        public function borrarCarreraModel($datosModel, $tabla){
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


        //-------------------------------------------------------------------------------
        //-------------------------------------------------------------------------------    
        // AQUI COMIENZAN METODOS PARA MATERIA

        public function registroMateriaModel($datosModel, $tabla){
            //Prepara el modelo para hacer los inserts a la BD
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,clave, idcarrera) VALUES (:carrera,:clave,:idcarrera)");
            //Prepare() prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute.
            
            //bindParam() Vincula el valor de una variable de PHP a un parámetro de sustitución con nombre o signo de interrogacion correspondiente. Es la sentencia usada para preparar un query de SQL.
            $stmt->bindParam(":carrera", $datosModel["nombre"], PDO::PARAM_STR); 
            $stmt->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR); 
            $stmt->bindParam(":idcarrera", $datosModel["idcarrera"], PDO::PARAM_STR); 
            
            //Verificar ejecución del Query
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar las funciones de la sentencia de PDO
            $stmt->close();
        }

        public function vistaMateriaModel($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, nombre, clave, carrera FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->close();
        }
        
        public function editarMateriaModel($datosModel, $tabla){
            $stmt = Conexion::conectar()->prepare("SELECT id, nombre, clave, idcarrera FROM $tabla
            where id  = :id");
            $stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->close();
        }

        public function actualizarMateriaModel($datosModel, $tabla){
            //Preparar el Query
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre= :carrera, clave = :clave, idcarrera = :idcarrera  WHERE id  = :id");
            //Ejecutar el QUERY
            $stmt->bindParam(":carrera", $datosModel["carrera"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_STR);
            $stmt->bindParam(":clave", $datosModel["clave"], PDO::PARAM_STR);
            $stmt->bindParam(":idcarrera", $datosModel["idcarrera"], PDO::PARAM_STR);
            
            //Preparar respuesta
            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            //Cerrar la conexión por PDO
            $stmt->close();
        }
        
        public function borrarMateriaModel($datosModel, $tabla){
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