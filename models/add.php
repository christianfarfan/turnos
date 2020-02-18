<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_POST['accion']) {


			case 'new-patient':
			
			$sql = "INSERT INTO pacientes(cedula_paciente,nombre_paciente,apellido_paciente,correo_paciente,celular_paciente,fecha_nacimiento,id_usuario)VALUES('".$_POST['cedula']."','".$_POST['nombre']."','".$_POST['apellido']."','".$_POST['correo']."','".$_POST['celular']."','".$_POST['fecha_nacimiento']."',".$_SESSION['id_usuario']."); ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Creo el nuevo paciente Correctamente');
						location.href = 'patients';
					  </script>";
			
			break;

			
		
	}

?>

