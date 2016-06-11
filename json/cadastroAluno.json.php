<?php 

	require_once("../model/AlunoDAO.class.php");
	require_once("../model/FilaDAO.class.php");

	$status = Array();

	if(isset($_POST['matricula'])){

		$matricula = $_POST['matricula'];

		$dao = new AlunoDAO();


		$aluno = $dao->matriculaValida($matricula);

		if($aluno != null){
			$daoFila = new FilaDAO();
			$daoFila->inserir($aluno);
			echo "true";
		}else{
			echo "false";
		}
	}
 ?>