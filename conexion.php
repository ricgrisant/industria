<?php

	$conexion= 'mysql:host=localhost;dbname=3rc_db';
	$usuario='root';
	$pass='';

	try{

		$pdo=new PDO($conexion,$usuario,$pass);

		//echo "Conectado";

		
	} catch(PDOException $e){
		print "Error: " . $e->getMessage() . "<br/>";
		die();
	}

?>