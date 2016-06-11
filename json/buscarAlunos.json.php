<?php 
	require_once("../model/AlunoDAO.class.php");
	require_once("../model/FilaDAO.class.php");

	$daoAluno = new AlunoDAO();
	$daoFila = new FilaDAO();
	
	$alunos = $daoFila->buscarFila();
	
	echo "<table>";
	foreach ($alunos as $aluno) {
		echo "<tr><td>";
		echo $aluno->getNome();
		echo "</td></tr>";
	}

	echo "</table>";

 ?>