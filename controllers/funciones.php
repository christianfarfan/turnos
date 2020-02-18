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

		#ver pacientes
		function verPacientes(){
			$sql = "SELECT * FROM pacientes order by id_paciente desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			echo "
			<table width='100%' id='table'>
               <thead>
               <tr>
				<th>CEDULA</th>
				<th>NOMBRE</th>
				<th>APELLIDO</th>
				<th>CORREO</th>
				<th>CELULAR</th>
				<th>FECHA NACIMIENTO</th>
				<th></th>
               </tr>
               </thead>
               <tbody>
			";
			foreach ($consulta as $value) {
			    echo 
			    '
					<tr>
                    	<td>'.$value['cedula_paciente'].'</td>
						<td>'.$value['nombre_paciente'].'</td>
						<td>'.$value['apellido_paciente'].'</td>
						<td>'.$value['correo_paciente'].'</td>
						<td>'.$value['celular_paciente'].'</td>
						<td>'.$value['fecha_nacimiento'].'</td>
						<td>
							<a href="edit-patient?id='.$value['id_paciente'].'"><img src="assets/img/iconos/pencil.png" /></a> 
							<a href="models/delete?model=patient&id='.$value['id_paciente'].'"><img src="assets/img/iconos/delete.png" /></a>
						</td>
					</tr>

                    
                   
                     	
			    ';
			}
			echo "</tbody></table> ";
		}

		#ver pacientes
		function editarPacientes($id){
			$sql = "SELECT * FROM pacientes WHERE id_paciente=".$id." order by id_paciente desc";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			
			foreach ($consulta as $value) {
			    echo 
			    '
					<form method="post" id="datos-edit-patient">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Cedula</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="cedula" placeholder="Cedula" value="'.$value['cedula_paciente'].'" required id="cedula">
                      
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre" value="'.$value['nombre_paciente'].'" name="nombre" required id="nombre">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Apellido</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Apellido" value="'.$value['apellido_paciente'].'" name="apellido" required id="apellido">
                      
                    </div>
                    
                    
            
                  
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12 mb-16">
              <div class="card shadow h-100 py-2">
                <div class="card-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" placeholder="Correo" value="'.$value['correo_paciente'].'" required id="correo">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Celular</label>
                      <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Celular" value="'.$value['celular_paciente'].'" name="celular" required id="celular">
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Fecha De Nacimiento</label>
                      <input type="date" class="form-control" id="exampleInputPassword1" placeholder="" value="'.$value['fecha_nacimiento'].'" name="fecha_nacimiento" required id="fecha_nacimiento">
                      <input type="hidden" name="accion" value="update-patient" id="accion">
                      <input type="hidden" name="id" value="'.$value['id_paciente'].'" id="id">
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="update-patient">Guardar</button>
                  </form>

                    

                     	
			    ';
			}
			
		}

		

	}



?>


