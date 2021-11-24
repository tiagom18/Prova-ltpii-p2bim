<!DOCTYPE html>

<html>
	<head>
	  <title>Cadastro de aluno</title>
	  <meta charset="utf-8">
	</head>
	<body> 

<?php 
  $Nome = $_POST["Nome"];
  $Nota1 = $_POST["nota1"];
  $Nota2 = $_POST["nota2"];
  $Media = ($Nota1 + $Nota2)/2;
  $Situacao ="";

  if ($Media>=6)
    $Situacao ="A";
    else 
    $Situacao = "R";

    
	include("../model/conexao.php");

  try {
	$query = "INSERT INTO tb_aluno_notas
	(nm_aluno, vl_nota1, vl_nota2, vl_media, cd_situacao) 
	values (?,?,?,?,?)";

	$stmt=$conn->prepare($query);

	$stmt->bindParam(1, $Nome, PDO::PARAM_STR);
	$stmt->bindParam(2, $Nota1, PDO::PARAM_INT );
	$stmt->bindParam(3, $Nota2, PDO::PARAM_INT );
	$stmt->bindParam(4, $Media, PDO::PARAM_INT );
	$stmt->bindParam(5, $Situacao, PDO::PARAM_STR);
	$stmt->execute();
	echo "Cadastrado com sucesso";


  } catch (PDOException $e) {
	echo "ERRO:". $e->getMessage();
  }

?>  
 <br>
 <p><a href="../index.php">Retornar para Menu Principal</a></p>
 
 </body>
</html>

