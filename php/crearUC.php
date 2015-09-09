<?php 
	
	include "mysql.php";

	$db = new db("root","20296572");

	for ($i=0; $i < $_POST["cantidad"]; $i++) { 

		$uc;

		$db->add("uc")->insert($_POST)->exe(function($cod_uc){

			global $uc, $i;

			if($i == 0){

				$uc = $cod_uc;

			}

		});

		$_POST["cod_trimestre"]++;

	}

	$db->commit();

	json($uc);


 ?>