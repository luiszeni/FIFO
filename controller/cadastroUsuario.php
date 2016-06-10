
<html>

	<body>
		
		<?php
			require("AlunoDAO.class.php");

			$dao = new AlunoDAO();


			$usuario = new Aluno("01010123","Juca bibolino", "MTi4040");
			

			$dao->inserirAluno($usuario);

		?>

	</body>

</html>