<?php 
	session_start();
	require 'conexion.php';
	/**
	 * 
	 */
	class Funciones extends Conexion
	{
		function Login($u,$p){
			$sql = "SELECT * FROM usuarios WHERE usuario = '".$u."' and clave = '".$p."'; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
			    $_SESSION['id_usuario'] = $key['id_usuario'];
			    $_SESSION['usuario'] = $key['usuario'];
			    $_SESSION['rol'] = $key['rol'];
			    $_SESSION['nombre'] = $key['nombre'];
			    $_SESSION['telefono'] = $key['telefono'];
			    $_SESSION['email'] = $key['email'];
			    $_SESSION['pass'] = $key['clave'];
			    $_SESSION['imagen_profile'] = $key['imagen_profile'];
			    $_SESSION['privilegio'] = $key['privilegio'];
			}
			if ($consulta and $_SESSION['rol']=='admin') {
				$fecha = date('Y-m-d H:i:s');
				$sql = "INSERT INTO logs(accion,estado,fecha,id_usuario)VALUES('inicio session','activo','".$fecha."',".$_SESSION['id_usuario'].")";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				echo "<script>
						location.href = 'admin';
					  </script>";
			}
			if ($consulta and $_SESSION['rol']=='user') {
				$fecha = date('Y-m-d H:i:s');
				$sql = "INSERT INTO logs(accion,estado,fecha,id_usuario)VALUES('inicio session','activo','".$fecha."',".$_SESSION['id_usuario'].")";
				@$statement = Conexion::Conectar();
				$consulta = $statement->query($sql);
				echo "<script>
						location.href = 'user';
					  </script>";
			}
			else 
			{
				echo "<script>
						alert('Datos de ingreso no validos, volver a ingresar');
						location.href = 'login';
					  </script>";
			}
		}

		


		function editarUsuarioId($id){
			$sql = "SELECT * FROM usuarios WHERE id_usuario = ". $id;
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $value) {
			    echo 
			    '
					<form method="post" id="datos">
                    <table>
                      <tr>
                        <th>Usuario: </th>
                      
                      
                      <td><input type="text" name="usuario" class="form-control" placeholder="Usuario" id="usuario" value="'.$value['usuario'].'"> </td>
                      
                      <tr>
                        <th>
                          <label for="Clave">Clave: 
                        </label>
                        </th>
                        <td><input type="password" class="form-control" name="clave" id="clave" placeholder="Clave" value="'.$value['clave'].'"></td>
                      </tr>
                      <tr>
                        <th>
                          <label for="rol">Rol: 
                        </label>
                        </th>
                        <td>
                            <select type="text" class="form-control" name="rol" id="rol">
                              <option value="'.$value['rol'].'">'.$value['rol'].'</option>
                              <option value="admin">Admin</option>
                              <option value="no admin">No admin</option>
                            </select>
                        </td>
                      </tr>
            
                      <tr>
                        
                       <input type="hidden" name="accion" id="accion" value="edit_user">
                       <input type="hidden" name="id" id="id" value="'.$value['id_usuario'].'">
                       <td><input type="submit" class="btn btn-success" value="Guardar" id="editar_user"></td>
                      </tr>

                    </table> 
                    <br>
                    </form> 	
			    ';
			}
		}

		#finalizar la seccion, guardando un registro en la base de datos, en la tabla logs

		function closeLogs(){
			$fecha = date('Y-m-d H:i:s');
			
		}

		

	}



?>


