<?php 
	require '../controllers/funciones.php';
	$funciones = new Funciones();
	$funciones->closeLogs();
	session_destroy(); 
	header('location: ../index');
	

?>