<?php 
	session_start();
	require '../controllers/conexion.php';
	/**
	 * 
	 */
	
	switch ($_GET['model']) {
		
			case 'business':
			
			$sql = "DELETE FROM empresas WHERE id_empresa=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../business';
					  </script>";
			
			break;

			#eliminar Paciente
			case 'patient':
			
			$sql = "DELETE FROM pacientes WHERE id_paciente=".$_GET['id']."; ";
			@$statement = Conexion::Conectar();
			$consulta = $statement->query($sql);
			
				echo "<script>
						alert('Se Elimino Correctamente');
						location.href = '../patients';
					  </script>";
			
			break;

			
	}

?>