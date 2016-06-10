
<?php
	
	require_once("Fila.class.php");

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

		public function login($admin){
			
			$query = "SELECT * FROM ".$this->tabela." WHERE login = '".$admin->getLogin()."' and senha = '".$admin->getSenha()."'";
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());
			$linha = mysql_fetch_array($resultado, MYSQL_ASSOC);
			if(is_array($linha)){

							
				return true;
			}
			return false;

		}

		public function atualizar($admin){

			$query = "UPDATE ".$this->tabela." ";
			$query .= "SET  login='".$admin->getLogin();
			$query .= "', senha='".$admin->getSenha();
			$query .= "' WHERE id=".$admin->getId();
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function excluir($admin){


			$query = "DELETE FROM ".$this->tabela;
			$query .= " WHERE id=".$admin->getId();
			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}

		public function buscarPorId($id){
			$query = "SELECT * FROM ".$this->tabela. " WHERE id='".$id."'";
			$resultado = mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());


			

			if($linha = mysql_fetch_array($resultado, MYSQL_ASSOC)){

				$admin = new Admin( $linha["login"],$linha["senha"]);

				$admin->setId($linha["id"]);
				
				return $admin;
			
			}

			return null;
		}

	}


  ?>