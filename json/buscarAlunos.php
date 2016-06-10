<?php 

	require("../model/AlunoDAO.class.php");

	$status = Array();

	



$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

if(isset($_POST['data'])){
		$date = $_POST['data'];

		$dao = new AlunoDAO();


		$alunos = $dao->buscarFila($date);
		



		echo json_encode($alunos);

	}

 ?>