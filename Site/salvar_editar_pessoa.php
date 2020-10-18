<?php
// Variaveis com os dados da pessoa que será editada
$id = $_POST['id'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];

//Variáveis de acesso ao banco de dados
$hostname="localhost";
$username="root";
$password="";
$dbname="agenda";

	
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Checando conexão
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Query de atualização de dados
$sql = "Update `pessoa` SET `nome`= '$nome', `sobrenome` = '$sobrenome' WHERE `pessoa`.`id` = '$id'";
	if (mysqli_query($conn, $sql)) {
  		echo "Alterado com sucesso!";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


mysqli_close($conn);
header("Location: index.php");
?>