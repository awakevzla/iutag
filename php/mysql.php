<?php 

	header('Content-Type: application/json');

	function jsonError($number,$message,$die = false){
		echo json_encode(array("error" => array($number,$message)));
		if($die)
			die;
	}

	function json($data){
		echo json_encode($data);
	}

	function isEmpty($array){

		if(count($array)===0){

			jsonError(0,"No se encontró la información requerida.");

			die;

		}

	}

	class db{
		
		function __construct($usuario,$clave){

			$this->database = "iutag";

			$this->action = "";

			$this->queue = array();

			$this->error = array();

			$this->response = array(
				"create" => array(),
				"update" => array(),
				"delete" => array()
			);

			$this->tables = json_decode(file_get_contents("tables.json"),true);

			try {
			
				$this->db = new PDO("mysql:host=localhost;dbname=$this->database;charset=utf8", $usuario,$clave);

				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    		$this->db->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
	   			// $this->db->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
				// $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	    		$this->db->beginTransaction();

	    	}catch(PDOException $ex){

	    		$this->error[]=array(CE1,"No se pudo acceder a la base de datos");

	    		$this->rollback();

	    	}

		}

		function rollback($ex){

			$this->db->rollBack();

			jsonError($ex->errorInfo[0],isset($ex->errorInfo[2])?$ex->errorInfo[2]:"");

			die;

		}

		function add($tabla){

			$this->table = $tabla;

			$this->str = "";

			$this->data = array();

			$this->tableDef = $this->tables[$this->table];

			return $this;

		}

		function exe($done,$queue=false){

			if($queue){

				$this->queue[]=array(
					$this->str,
					$this->data,
					$done,
					$this->table
				);

			}else{

				$this->execute($this->str,$this->data,$done,$this->table);

			}

			return $this;

		}

		function execute($str,$data,$done,$table){

			$stmt=$this->db->prepare($str);

			try{

				$response = $stmt->execute($data);

				if($this->action == "select"){

					$done($stmt->fetchAll(PDO::FETCH_ASSOC));

				}else{

					if($this->action == "update" || $this->action == "delete"){

						$done($stmt->rowCount());

						return $this;

					}

					$done(array($this->tableDef["Primary"] => $this->db->lastInsertId()),$this->db->lastInsertId());

				}

			}catch(PDOException $ex){

    			$this->rollback($ex);

			}

		}

		function commit(){
			
			$this->db->commit();

		}

		function flush(){

			if(count($this->data)===0)
				throw new Exception(1, "Empty Queue");

			foreach ($this->queue as $query) {
				
				$this->execute($query[0],$query[1],$query[2],$query[3]);

			}

			return $this;

		}

		function select($cols="*",$tables=false){

			$this->action = "select";

			$this->str.="SELECT $cols FROM ".($tables==false? $this->table : $tables);

			return $this;

		}

		function limit($limit){

			$this->str.=" LIMIT ".$limit;

			return $this;

		}

		function orderBy($campo,$orientacion=1){

			$this->str.=" ORDER BY $campo ".($orientacion > 0?"ASC":"DESC");

			return $this;

		}

		function groupBy($campo){

			$this->str.=" GROUP BY $campo ";

			return $this;

		}

		function where($where,$simple=false,$data=false){

			$join="WHERE";

			if($simple){

				$this->str.=" $join $where";

				if($data != false)
					$this->data = $data;

			}else{

				$this->data = array_merge($this->data,$where);

				foreach ($where as $key => $value) {

					$this->str.=" $join $key=:$key";

					$join="AND";
					
				}

			}

			return $this;
			
		}

		function delete($data){

			$table = $this->tableDef;

			$this->action = "delete";

			$this->str.="DELETE FROM $this->table";

			$this->where(array($table["Primary"] => $data[$table["Primary"]]));

			return $this;

		}

		function update($data,$add=array()){

			$table = $this->tableDef;

			$this->action = "update";

			if(is_array($data) && !isset($data[0]))
				$data=array($data);

			foreach ($data as $i => $field) {

				$this->str.="UPDATE $this->table SET ";

				$fields = array();

				foreach ($field as $key => $value) {

					if($table["Primary"] != $key && (isset($table["req"][$key]) || isset($table["opt"][$key]))){

						$fields[]= " $key = :".$key."_".$i;

						$this->data[$key."_".$i]=$value;

					}

				}

				$this->str.=join(",",$fields);

				if(isset($field[$table["Primary"]])){
					$this->where($table["Primary"]." = ".$field[$table["Primary"]],true);
				}

			}

			return $this;

		}

		function insert($data,$add=array()){

			$fields = array();
			$table = $this->tableDef;

			$this->action = "insert";

			if(is_array($data) && !isset($data[0]))
				$data=array($data);

			foreach ($data as $i => $field) {

				$insertData=array();

				foreach ($field as $key => $value) {

					if(isset($table["req"][$key]) || isset($table["opt"][$key])){

						if($i == 0)
							$fields[] = $key;

						$this->data[$key."_".$i]=$value;

						$insertData[]=":".$key."_".$i;

					}

				}

				if($i==0)
					$this->str.="INSERT INTO $this->table (".join($fields,",").") VALUES";

				 $this->str.=($i==0?"":",")."(".join($insertData,",").")";

			}

			return $this;
			
		}

	}

	function checkSession(){

		$response =  false;

		session_start();

		if(isset($_SESSION["user_info"]))
			$response = $_SESSION["user_info"];

    	session_write_close(); 

    	return $response;

	}

	function logout(){

		session_start();

		unset($_SESSION["user_info"]);

		session_unset();

		session_destroy();

	}

	function login($user,$pass){

		$db = new db("root","20296572");

		global $response;

		$response = false;

		$db->add("usuario")->select("*","usuario")->where(
			"clave = :clave AND usuario = :usuario",true,array("clave" => $pass,"usuario" => $user))->exe(function($data){

			global $response;

			if(count($data) == 1){

				$response = $data[0];

			}else
				jsonError("S1","Nombre de usuario o clave incorrecto.",true);

		});
		$auditoria["id_usuario"]=$response["cod_usuario"];
		$auditoria["evento"]="entrada";
		$auditoria["ip"]=1;
		$db->add("auditoria_sesion")->insert($auditoria)->exe(function($cod_aula){})->commit();

		session_start();

		$_SESSION["usuario"]=$response;

    	session_write_close(); 

		return $response;
	}

 ?>