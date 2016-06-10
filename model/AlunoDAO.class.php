
<?php
	
	require_once("Aluno.class.php");

	class AlunoDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'FIFO';
		private $tabela = 'Aluno';

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		public function inserir($aluno){

			$query = 'INSERT INTO '.$this->tabela.'(matricula, nome) values ("'.$aluno->getMatricula(). '", "'.$aluno->getNome().'")';

			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$aluno->setId(mysql_insert_id());
			return $aluno;
		}

		public function matriculaValida($matricula){
			
			$query = "SELECT * FROM ".$this->tabela." WHERE matricula = '".$matricula."'";
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());
			$linha = mysql_fetch_array($resultado, MYSQL_ASSOC);
			if(is_array($linha)){

				$aluno = new Aluno($linha["matricula"], $linha["nome"]);

				$aluno->setId($linha["id"]);
			
				return $aluno;
			}
			return null;

		}

		public function atualizar($aluno){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  nome='".$aluno->getNome();
			$query .= "', matricula='".$aluno->getMatricula();
			$query .= "' WHERE id=".$aluno->getId();
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluir($aluno){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$aluno->getId();
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarPorId($id){
			$query = "SELECT * FROM ".$this->tabela. " WHERE id='".$id."'";
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			

			if($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$aluno = new Aluno( $linha["nome"],$linha["matricula"]);

				$aluno->setId($linha["id"]);
				
				return $aluno;
			
			}

			return null;
		}

	}


  ?>