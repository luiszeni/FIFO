<html>
	<head>
		<title>
			First in first out
		</title>
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	</head>

	<body>
		<h1>URL: luiszeni.com.br/FIFO</h1>

		<form id="formEnvio">
			Matricula: <input id="txMatricula" name="matricula" type="text">
			<input id="btAdicionar" type="button" value="Adicionar">
		</form>

		<div id="statusEnvio"> Enviando... </div>


		<div id="alunosNaLista">
			<table id="tabelaFila">
				<tr>
					<th>
						Posicao
					</th>
					<th>
						Aluno
					</th>
				</tr>
				<tr>
					<td>
						1
					</td>  
					<td>
						Jucain
					</td>
				</tr>
			</table>

		</div>

		<script>
			//$("#statusEnvio").hide();
			$("#btAdicionar").click(function(){
				//$("#formEnvio").hide();
				//$("#statusEnvio").show();

				var resultDiv = $("#statusEnvio");

			    $.ajax({
			        url: "../json/cadastroAluno.json.php",
			        type: "POST",
			        data: { matricula: $("#txMatricula").val()},
			        dataType: "json",
			        success: function (result) {
			             resultDiv.html(result[0].status);
			        },
			        error: function (xhr, ajaxOptions, thrownError) {
			        alert(xhr.status);
			        alert(thrownError);
			        }
			    });
			});


		setInterval(function() {
			
			$.ajax({
			        url: "../json/buscarAlunos.json.php",
			        type: "POST",
			        data: { data: "11/11/11 00:00"},
			        dataType: "json",
			        success: function (result) {
			             console.log(result[0].nome);
			        },
			        error: function (xhr, ajaxOptions, thrownError) {
			        console.log(xhr.status);
			        console.log(thrownError);
			        }
			    });

		}, 1000);

		</script>


	</body>


</html>