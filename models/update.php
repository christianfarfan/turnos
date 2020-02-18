<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_POST['accion']) {
		case 'update_profile':
			$sql = "UPDATE usuarios SET usuario = '".$_POST['usuario']."', nombre = '".$_POST['nombre']."', clave = '".$_POST['clave']."', telefono='".$_POST['telefono']."', email='".$_POST['email']."'  WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
			    $_SESSION['id_usuario'] = $key['id_usuario'];
			    $_SESSION['usuario'] = $key['usuario'];
			    // $_SESSION['email'] = $key['email'];
			    $_SESSION['nombre'] = $key['nombre'];
			    $_SESSION['telefono'] = $key['telefono'];
			    $_SESSION['email'] = $key['email'];
			    $_SESSION['pass'] = $key['clave'];
			    $_SESSION['imagen_profile'] = $key['imagen_profile'];
			}
		
				echo "<script>
						alert('Se ha actualizado Correctamente. Se Cerrara la sesion, porfavor vuelve a entrar');
						location.href = '../inc/close';
					  </script>";
			
			break;

			case 'update_photo_profile':
			$imagen = $_FILES['foto']['tmp_name'];
			$imagen_name = $_FILES['foto']['name'];
			$destino = "../assets/img/profile/".$imagen_name;

			$sql = "UPDATE usuarios SET imagen_profile = '".$imagen_name."' WHERE id_usuario = ".$_SESSION['id_usuario']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql)->fetchAll();
			foreach ($consulta as $key) {
			    $_SESSION['id_usuario'] = $key['id_usuario'];
			    $_SESSION['usuario'] = $key['usuario'];
			    $_SESSION['email'] = $key['email'];
			    $_SESSION['nombre'] = $key['nombre'];
			    $_SESSION['pass'] = $key['clave'];
			    $_SESSION['imagen_profile'] = $key['imagen_profile'];
			}
			move_uploaded_file($imagen, $destino);
				echo "<script>
						alert('Se Actualizo Correctamente, la sesion se Cerrara, porfavor vuelve a entrar');
						location.href = '../inc/close';
					  </script>";
			
			break;

			#actualizar datos de pacientes 
			case 'update-patient':
			$sql = "UPDATE pacientes SET cedula_paciente = '".$_POST['cedula']."', nombre_paciente = '".$_POST['nombre']."', apellido_paciente = '".$_POST['apellido']."', correo_paciente='".$_POST['correo']."', celular_paciente='".$_POST['celular']."', fecha_nacimiento='".$_POST['fecha_nacimiento']."'  WHERE id_paciente = ".$_POST['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
		
				echo "<script>
						alert('Se ha actualizado Correctamente.');
						location.href = ('patients');
					  </script>";
			
			break;
		
	}

?>