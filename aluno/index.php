<!DOCTYPE html>
<!-- cadastro.php 
     lista os Alunos cadastrados -->
<html>
	<head>
	  <title>Alunos Cadastrados</title>
	  <meta charset="utf-8">
	 
	</head>

	<body>
	

	<h1>NOTAS CADASTRADAS</h1>

	<?php //cadastro.php
// lista Alunos cadastrados  

  include("../model/conexao.php");

  
  try {  
  // lista Alunos já cadastrados
  	$query = "SELECT id_aluno_notas, nm_aluno, vl_nota1,vl_nota2, vl_media, cd_situacao FROM tb_aluno_notas ";

  	$stmt = $conn->prepare($query);
 
	  $stmt->execute();

	  echo "<table border='1'>";
	  echo "<tr>
	          <th>id</th>
			  <th>Nome</th>
			  <th>Nota 1</th>
              <th>Nota 2</th>
              <th>Média</th>
              <th>Situação</th>
			</tr>";

	  // busca os dados lidos do banco de dados
	  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  $id_aluno_notas = $row["id_aluno_notas"];
		  $nome = $row["nm_aluno"];
          $nota1 =$row["vl_nota1"]; 
		  $nota2 =$row["vl_nota2"]; 
          $media =$row["vl_media"];
          $situacao =$row["cd_situacao"]; 
		  
		  echo "<tr>";
		  echo "<td> $id_aluno_notas </td>";
		  echo "<td> $nome </td>";
		  echo "<td> $nota1 </td>";
          echo "<td> $nota2 </td>";
          echo "<td> $media </td>";
          echo "<td> $situacao </td>";		  
		  echo "</tr>";
	  }
	  echo "</table>";
} catch (PDOException $e){
	echo 'Error: '.$e->getMessage();
}

?>  
	<br>
	<p><a href="form_insercao.html">Cadastrar novo aluno</a></p>
	<p><a href="../index.php">Retornar para Menu Principal</a></p>


	</body>
</html>

