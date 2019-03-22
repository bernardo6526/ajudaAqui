<?php

class banco{

	public $conexaobd;
	private $host;
	private $user;
	private $password;
	public $database;
	public $status;
	
	public function __construct($database, $host="localhost", $user="root", $password=""){
		$this->host = "$host";
		$this->user = "$user";
		$this->password = "$password";
		$this->database = "$database";
		$this->conectar();
	}
	private function conectar(){
		$this->conexaobd = mysqli_connect($this->host, $this->user,
		                                  $this->password, $this->database);
		
		if($this->conexaobd){
			$this->status = true;
		}else{
			$this->status = false;
		}
	}
	public function statusConexao(){
		return $this->status;
	}
}