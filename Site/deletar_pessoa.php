<?php
//Variavel que contem o id do registro a ser deletado
$id = $_POST['id'];
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
// Query para apagar o registro do id da pessoa recebido.
$sql = "DELETE FROM `pessoa` WHERE `pessoa`.`id` = '$id'";
	if (mysqli_query($conn, $sql)) {
  		echo "Pessoa Deletado com sucesso!";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


mysqli_close($conn);
header("Location: index.php");

?>