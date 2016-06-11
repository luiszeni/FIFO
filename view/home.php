<html>
	<head>
		<title>
			First in first out
		</title>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="view/home.css">

	</head>

	<body>
		
			<p id = "titulo">luiszeni.com.br/FIFO</p>
		<div id="div_left">
			<p id="para_entrar"><b>Entrar na Fila</b></p>
			<form>
				<input id="matricula"type="text" placeholder="Matrícula (apenas números)">
				<br>
				<p>
				<input id="bt_entrar" type="button" value="Entrar" >
				<input id="bt_sair" type="button" value="Sair" >
				</p>
			</form>
		</div>

		<div id="div_right">
			<p id="alunos_fila"><b>Alunos na Fila</b></p>
			<table id= "tabelaAluno">
			</table>
		</div>


		<script type="text/javascript">
		

	var funcaoDoClicao = function (){
	

		$.ajax({ 
				url:"json/cadastroAluno.json.php",
				type:"POST",
				data: {matricula:$('#matricula').val()},
				datatype:"html",
				success: function(resultado){
					alert(resultado);
					//$("#tabelaAluno").html(resultado);
				},

				error: function(xhr,ajaxOptions, seila){
					alert(xhr.status);
				}
		});	
	}

	var funcaoAtualizaFila = function (){
	

		$.ajax({ 
				url:"json/buscarAlunos.json.php",
				type:"POST",
				data: {},
				datatype:"html",
				success: function(resultado){
					$("#tabelaAluno").html(resultado);
					//alert(resultado);
				},

				error: function(xhr,ajaxOptions, seila){
					alert(xhr.status);
				}
		});	
	}


	$("#bt_entrar").click(funcaoDoClicao);
	$("#bt_sair").click(funcaoAtualizaFila);

	</script>

	</body>


</html>