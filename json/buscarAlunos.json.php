<?php 

	require("../model/AlunoDAO.class.php");

	$status = Array();

	if(isset($_POST['date'])){

		$date = $_POST['date'];

		$dao = new AlunoDAO();


		$alunos = $dao->buscarFila($date);
		
		echo json_encode($alunos);

	}

 ?>