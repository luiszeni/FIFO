
<?php
	
	require_once("Fila.class.php");
	require_once("AlunoDAO.class.php");
	class FilaDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'FIFO';
		private $tabela = 'Fila';

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		public function inserir($aluno){

			$query = 'INSERT INTO '.$this->tabela.'(data, id_aluno, processado) values (';



			$query .= '"2016-01-01 12:12", ';
			$query .= '"'.$aluno->getId().'", ';
			$query .= '"false"';
			$query .= ')';
		

			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			return mysql_insert_id();
		}

		public function buscarFila(){
			$query = "SELECT * FROM ".$this->tabela."";
			//echo $query;
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$alunos = [];

			$alunoDAO = new AlunoDAO();
			while($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$idAluno = $linha["id_aluno"];

				$aluno = $alunoDAO->buscarPorId($idAluno);
				array_push($alunos, $aluno);
			
			}

			return $alunos;

		}



	}

  ?>