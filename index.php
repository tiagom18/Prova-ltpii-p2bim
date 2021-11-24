<!DOCTYPE html>
<!-- index.php 
     menu principal -->
<html lang="pt-br">
	<head>
	  
	  <meta charset="UTF-8">

	  <title>Programa de nota</title>
	  
	</head>
	<body>
	
  
      <ul>
        <h1>Sistemas de Cadastro de Alunos</h1>
          <ul>
            <li><a href="./aluno/form_insercao.html">Cadastrar Novos Alunos</a></li>
          </ul>
        </li>                 
   
    <h3>ALUNOS CADASTRADAS</h3>
  <?php //cadastro.php
// lista Alunos cadastrados  

  include("./model/conexao.php");

  
  try {  
  // lista Alunos já cadastrados
  	$query = "SELECT id_aluno_notas, nm_aluno, vl_nota1,vl_nota2, vl_media, cd_situacao FROM tb_aluno_notas order by nm_aluno";

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
  <div id="teste">
  </div>
  <img src="graficos/pizza.php">
	</body>
	
</html>
