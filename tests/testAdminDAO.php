
<?php
	echo "<div style='background-color:#CCCCCC;padding: 10px;padding-left: 30px'>";
	echo "<p> <b>Running test of: AdminDAO</b></p>";

	require_once("../model/AdminDAO.class.php");

	$admin = new Admin("Highlander", "123");
	$daoAdmin = new AdminDAO();

	$admin = $daoAdmin->inserir($admin);

	if($admin->getId() != null){
		echo "<p style='color:green'>Teste de inserção OK</p>";
	}else{
		echo "<p style='color:red'>Teste de inserção ERRO (sem id)</p>";
	}

	$adminBusca = $daoAdmin->buscarPorId($admin->getId());

	if($adminBusca->getId() == $admin->getId() && 
	$adminBusca->getLogin() == $admin->getLogin() &&
	$adminBusca->getSenha() == $admin->getSenha()){
		echo "<p style='color:green'>Teste de busca OK</p>";
	}else{
		echo "<p style='color:red'>Teste de busca ERRO</p>";
	}

	$login = $daoAdmin->login($admin);

	if($login){
		echo "<p style='color:green'>Teste de login OK</p>";
	}else{
		echo "<p style='color:red'>Teste de login ERRO</p>";
	}

	$admin->setLogin("Huehue");
	$admin->setSenha("sdfasd");

	$daoAdmin->atualizar($admin);
	$adminBusca = $daoAdmin->buscarPorId($admin->getId());

	if($adminBusca->getId() == $admin->getId() && 
	$adminBusca->getLogin() == $admin->getLogin() &&
	$adminBusca->getSenha() == $admin->getSenha()){
		echo "<p style='color:green'>Teste de atualizar OK</p>";
	}else{
		echo "<p style='color:red'>Teste de atualizar ERRO</p>";
	}


	$daoAdmin->excluir($admin);
	$adminBusca = $daoAdmin->buscarPorId($admin->getId());

	if($adminBusca == null){
		echo "<p style='color:green'>Teste de exclusão OK</p>";
	}else{
		echo "<p style='color:red'>Teste de exclusão ERRO</p>";
	}
	echo "</div>";
?>