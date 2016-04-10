<?php 
	
	include "mysql.php";

	if(isset($_POST['user']) && isset($_POST['clave'])){

		json(login($_POST['user'],md5($_POST['clave'])));
		
	}

 ?>