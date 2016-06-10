<?php 

	require("../model/AlunoDAO.class.php");

	$status = Array();

	if(isset($_POST['matricula'])){

		$matricula = $_POST['matricula'];

		$dao = new AlunoDAO();


		$aluno = $dao->matriculaValida($matricula);
		//matricula válida

		//já não ta na lista de hoje?

		//adicionar
		if($aluno == null){
			array_push($status,   array("status"=>"Aluno ".$_POST['matricula']." não encontrado :("));
		}else{
			array_push($status,   array("status"=>"Auno ".$_POST['matricula']." adicionado a fila :)"));

		}
	}else{
			array_push($status,   array("status"=>"Aluno não encontrado :("));
	}

	echo json_encode($status);

 ?>