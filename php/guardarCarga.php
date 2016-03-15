<?php 
	
	include "mysql.php";
	include "parametrosBD.php";
	$db = new db(usuario,clave);

	$carga = array("cod_carga"=>"1");

	if(isset($_POST["cod_docente"]) && $_POST["cod_docente"] != "")
		$db->add("carga")->update($_POST)->exe(function($cod_carga){

			global $carga;

			$carga = array("cod_carga"=>$cod_carga);

		});

	foreach ($_POST["aulas"] as $aula) {
		
		if(isset($aula["cod_asignacion"]))
			$db->add("asignacion")->update($aula)->exe(function($cod_asignacion){});
		else
			$db->add("asignacion")->insert($aula)->exe(function($cod_asignacion){});

	}

	$db->commit();

	json($carga);


 ?>