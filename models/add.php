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

			case 'new-turn':
						
						$sql = "SELECT * FROM `pacientes` WHERE `id_paciente` = (SELECT `id_paciente` FROM pacientes WHERE cedula_paciente = '".$_POST['cedulaTurno']."');";
						
			            @$statement = Conexion::Conectar();
						$consulta = $statement->query($sql)->fetchAll();
						if($consulta){
							$fecha = date('Y-m-d');
							$sql2 = "SELECT COUNT(id_turno) AS turnosP FROM `turnos` WHERE `fecha` = '".$fecha."'";
							$consulta2 = $statement->query($sql2)->fetchAll();
							if($consulta2){
								foreach ($consulta2 as $key) {
									$turnoActual = $key['turnosP']+1;
									echo "<script>
									    $('#sacando-turno').prop('disabled', true);
										setTimeout(function(){ location.href='digitador'; }, 5000);
										</script>";
									echo "<p><a href='#ex1' rel='modal:open'>Su Turno es:  ".$turnoActual."</a></p>";
									$sql3= "INSERT INTO `turnos`(`cedula`, `fecha`, `hora_llamada`, `turno`, `hora_atendido`) VALUES (?,?,?,?,?)";
										$hora = date('H:i:s');
										$insertTurno = Conexion::Conectar();
										$nuevoTurno = $insertTurno->prepare($sql3);
										$nuevoTurno->execute(array($_POST['cedulaTurno'],$fecha,$hora,$turnoActual,"00:00:00"));
										echo "SU TURNO ES: ".$turnoActual;
								}
								
							}
							else{
								echo "No podemos darle turno";

							}
							
						}
						else{
							echo "Usted no está registrado";
						}
							
							
							break;

			
		
	}

?>

