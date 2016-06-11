
<?php
	echo "<div style='background-color:#CCCCCC;padding: 10px;padding-left: 30px'>";
	echo "<p> <b>Running test of: FilaDAO</b></p>";

	require_once("../model/AlunoDAO.class.php");
	require_once("../model/FilaDAO.class.php");

	$aluno = new Aluno("Luis", "040530201");
	$daoAluno = new AlunoDAO();
	$daoFila = new FilaDAO();
	
	$aluno = $daoAluno->inserir($aluno);

	if($aluno->getId() != null){
		echo "<p style='color:green'>Usuario de teste inserido: OK</p>";
	}else{
		echo "<p style='color:red'>Usuario de teste inserido: ERRO (sem id)</p>";
	}


	$id = $daoFila->inserir($aluno);

	if($id != null && $id > 0){
		echo "<p style='color:green'>Usuario inserido na Fila: OK</p>";
	}else{
		echo "<p style='color:red'>Usuario inserido na Fila: ERRO (sem id)</p>";
	}



	var_dump($daoFila->buscarFila());

	$daoAluno->excluir($aluno);
	$alunoBusca = $daoAluno->buscarPorId($aluno->getId());

	if($alunoBusca == null){
		echo "<p style='color:green'>Usuario de teste excluido: OK</p>";
	}else{
		echo "<p style='color:red'>Usuario de teste excluido: ERRO</p>";
	}


	echo "</div>";


?>