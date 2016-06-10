
<?php
	echo "<div style='background-color:#CCCCCC;padding: 10px;padding-left: 30px'>";
	echo "<p> <b>Running test of: AlunoDAO</b></p>";

	require_once("../model/AlunoDAO.class.php");

	$aluno = new Aluno("Luis", "040530201");
	$daoAluno = new AlunoDAO();

	$aluno = $daoAluno->inserir($aluno);

	if($aluno->getId() != null){
		echo "<p style='color:green'>Teste de inserção OK</p>";
	}else{
		echo "<p style='color:red'>Teste de inserção ERRO (sem id)</p>";
	}

	$alunoBusca = $daoAluno->buscarPorId($aluno->getId());

	if($alunoBusca->getId() == $aluno->getId() && 
	$alunoBusca->getNome() == $aluno->getNome() &&
	$alunoBusca->getMatricula() == $aluno->getMatricula()){
		echo "<p style='color:green'>Teste de busca OK</p>";
	}else{
		echo "<p style='color:red'>Teste de busca ERRO</p>";
	}

	$matricula = $daoAluno->matriculaValida($aluno->getMatricula());

	if($matricula != null){
		echo "<p style='color:green'>Teste de busca matricula OK</p>";
	}else{
		echo "<p style='color:red'>Teste de busca matricula ERRO</p>";
	}

	$aluno->setNome("Juca");
	$aluno->setMatricula("9384383");

	$daoAluno->atualizar($aluno);
	$alunoBusca = $daoAluno->buscarPorId($aluno->getId());

	if($alunoBusca->getId() == $aluno->getId() && 
	$alunoBusca->getNome() == $aluno->getNome() &&
	$alunoBusca->getMatricula() == $aluno->getMatricula()){
		echo "<p style='color:green'>Teste de atualizar OK</p>";
	}else{
		echo "<p style='color:red'>Teste de atualizar ERRO</p>";
	}


	$daoAluno->excluir($aluno);
	$alunoBusca = $daoAluno->buscarPorId($aluno->getId());

	if($alunoBusca == null){
		echo "<p style='color:green'>Teste de exclusão OK</p>";
	}else{
		echo "<p style='color:red'>Teste de exclusão ERRO</p>";
	}
	echo "</div>";
?>