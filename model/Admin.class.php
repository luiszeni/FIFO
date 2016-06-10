<?php
	class Admin{

		private $id;
		private $login;

	
		public function __construct($login, $senha){
			$this->login = $login;
			$this->senha = $senha;
		}


		public function getLogin(){
			return $this->login;
		}

		public function setLogin($login){
			$this->login = $login;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}
	}
?>
