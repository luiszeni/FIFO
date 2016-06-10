
<?php
	
	require_once("Admin.class.php");

	class AdminDAO{

		private $localBanco = 'localhost';
		private $usuarioBanco = 'root';
		private $senhaBanco = 'aluno';
		private $nomeBanco = 'FIFO';
		private $tabela = 'Admin';

		public function __construct(){
	
			$conexao = mysql_connect($this->localBanco, $this->usuarioBanco, $this->senhaBanco)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$nomebanco = mysql_select_db($this->nomeBanco, $conexao)
			or die('não deu para conectar'.mysql_errno().mysql_error());

		}



		public function inserir($admin){

			$query = 'INSERT INTO '.$this->tabela.'(login, senha) values ("'.$admin->getLogin(). '", "'.$admin->getSenha().'")';

			mysql_query($query)
			or die('não deu para conectar'.mysql_errno().mysql_error());

			$admin->setId(mysql_insert_id());
			return $admin;
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