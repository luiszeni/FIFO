<?php 

	require("../model/AlunoDAO.class.php");

	$status = Array();

	if(isset($_POST['matricula'])){

		$matricula = $_POST['matricula'];

		$dao = new AlunoDAO();


		$aluno = $dao->matriculaValida($matricula);

		if($aluno != null){
			echo "true";
		}else{
			echo "false";
		}
	}
 ?>