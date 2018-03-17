<?php

	define('DB_NAME','root');
	define('DB_BASE','web');
	define('DB_HOST','localhost');
	define('DB_PASS','');
	


class ConnectionMySQL
		{
			
			private $BASE;
			private $NAME;
			private $HOST;
			private $PASS;
			private $conn;

			public function __construct(){
				global $DB_NAME;
				global $DB_BASE;
				global $DB_HOST;
				global $DB_PASS;

				$this->BASE=DB_BASE;
				$this->NAME=DB_NAME;
				$this->HOST=DB_HOST;
				$this->PASS=DB_PASS;
			}
	

	public function CreaConexion()
	{
		// Metodo que crea y retorna la conexion a la BD.
	$this->conn = new mysqli($this->HOST, $this->NAME, $this->PASS, $this->BASE);
 	if($this->conn->connect_errno):
 	 die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
 	endif;
 	
	}

	public function CerrarConexion()
	{
	//Metodo que cierra la conexion a la BD
 	$this->conn->close();
	}
	public function ExecuteQuery($sql)
	{
	/* Metodo que ejecuta un query sql
 	Retorna un resultado si es un SELECT*/
 	$result = $this->conn->query($sql);
 	return $result;
	}
	public function GetCountAffectedRows()
	{
	/* Metodo que retorna la cantidad de filas
 	afectadas con el ultimo query realizado.*/
 	return $this->conn->affected_rows;
	}
	public function GetRows($result)
	{
	/*Metodo que retorna la ultima fila
	 de un resultado en forma de arreglo.*/
 	return $result->fetch_array();
	}
  
	public function SetFreeResult($result)
	{
	//Metodo que libera el resultado del query.
 	$result->free_result();
	}
		}

		
		
?>
