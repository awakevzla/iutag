<?php 
	
	$con = mysql_connect('localhost', 'root', '20296572');

	mysql_select_db("carga",$con);

	$tables = array();

	if($con){

		$res = mysql_query("SHOW TABLES");

		while($row = mysql_fetch_assoc($res)) {
			
			foreach ($row as $table => $value) {
				
				$tables[$value] = array("req" => array(),"opt" => array(),"foreign" => array());

				$info = mysql_query("DESC $value");

				while ($col = mysql_fetch_assoc($info)) {

					if($col["Key"] === "PRI")
						$tables[$value]["Primary"]=$col["Field"];

					$tables[$value][$col["Null"] === "NO"?"req":"opt"][$col["Field"]] = array(
						"type" => $col["Type"]
					);
					
					if($col["Key"] == "MUL")
						$tables[$value]["foreign"][] = $col["Field"];

				}


			}

		}

		$fileName="tables.json";
		if(file_exists($fileName)&&is_file($fileName))
			unlink($fileName);
		$handle=fopen($fileName, "w+");
		chmod($fileName, 0777);

		fwrite($handle,json_encode($tables));

	}

 ?>