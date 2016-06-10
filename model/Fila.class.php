<?php
	class Fila{

		private $alunos;
	
		public function __construct($alunos){
			$this->alunos = $alunos;
		}


		public function getAlunos(){
			return $this->alunos;
		}

		public function setAlunos($alunos){
			$this->alunos = $alunos;
		}
	}
?>
