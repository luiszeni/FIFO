<?php
	class Aluno{

		private $id;
		private $matricula;
		private $nome;
	
		public function __construct($nome, $matricula){
			$this->matricula = $matricula;
			$this->nome = $nome;
		}


		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getMatricula(){
			return $this->matricula;
		}

		public function setMatricula($matricula){
			$this->matricula = $matricula;
		}	
	}
?>
