<?php
class sql {
	//Variables publiques de classe
	public $query;				// query
	public $error;				// error flag
	//Variables privées de classe
	private $sql_link;			// sql link
	private $error_txt;			// error content

	//Fonction permettant de se connecter à une base de données en fonction du service placé en paramètre
	private function connect($server_arg,$user_arg,$pass_arg,$db_arg)
	{
		//Instanciation des variables
		$this->error=false;
		//Informations de connexion à la base
		if($server_arg!=null && $user_arg!=null && $pass_arg!=null && $db_arg!=null)
		{
			$server = "$server_arg";
			$user = "$user_arg";
			$passwd = "$pass_arg";
			$database = "$db_arg";
		}
		else
		{
			$server = "localhost";
			$user = "root";
			$passwd = "";
			$database = "fff";
		}
		//Connexion à la base
		$this->sql_link = mysqli_connect($server,$user,$passwd,$database);
		//Si une erreur survient
		if(!$this->sql_link){
			$this->error();
		}
	}


	//Fonction permettant d'executer la requête passée en paramètre
	public function query($q_sql,$label="")
	{
		if($this->error){return false;}

		// query
		mysqli_set_charset($this->sql_link, "utf8");
		$this->query = mysqli_query($this->sql_link,$q_sql);
		//On va log l'erreur si une erreur survient
		if(!$this->query)
		{
			//On va log la requête et son label si il existe
			if($label!="")
				$this->log($label);
			$this->log($q_sql);
			$this->error();
			$this->log("------------------------------------------------------------------------------");
		}
	}

	//Fonction permettant d'ajouter au dossier log les informations de la requête
	private function log($content)
	{
		//log
		file_put_contents(dirname(__FILE__)."/mysql.log", date("d-m-Y H:i:s")." ".str_replace(array("\n", "\t", "\r"), ' ', $content)."\r\n", FILE_APPEND);
	}

	//Fonction permettant de récupérer l'identifiant de la dernière ligne inserée
	public function query_id()
	{
		if($this->error){return false;}

		return mysqli_insert_id($this->sql_link);
	}

	public function escape($var)
	{
		if($this->error){return false;}

		return mysqli_real_escape_string($this->sql_link,$var);
	}

	public function fetch_object()
	{
		if($this->error){return false;}

		// return the query results in an object
		return mysqli_fetch_object($this->query);
	}

	public function fetch_array()
	{
		if($this->error){return false;}

		// return the query results in an array
		return mysqli_fetch_array($this->query, MYSQLI_BOTH);
	}
	public function fetch_assoc()
	{
		if($this->error){return false;}

		// return the query results in an associative array
		return mysqli_fetch_assoc($this->query);
	}

	public function fetch_row()
	{
		if($this->error){return false;}

		// return the query results in an array
		return mysqli_fetch_row($this->query);
	}

	//Fonction permettant de nombre de lignes résultant d'une requête
	public function nb_result()
	{
		if($this->error){return false;}

		// return the query number of results
		return mysqli_num_rows($this->query);
	}

	public function deco()
	{
		if($this->error){return false;}

		// disconnection
		if(!mysqli_close($this->sql_link))
		{
			$this->error();
		}
	}

	private function error(){
		$this->error=true;
		$this->error_txt=utf8_encode(mysqli_error($this->sql_link));
		$this->log($this->error_txt);
	}

	public function get_error(){
		return $this->error_txt;
	}

	function __construct($server_arg=null,$user_arg=null,$pass_arg=null,$db_arg=null){
		date_default_timezone_set('Europe/Paris');
		$this->connect($server_arg,$user_arg,$pass_arg,$db_arg);
	}

	function __destruct() {
		mysqli_close($this->sql_link);
	}
}
?>
