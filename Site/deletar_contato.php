<?php
//Variável do id do contato que vai ser apagado
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
//Query para deletar o contato com o id especificado
$sql = "DELETE FROM `contato_pessoa` WHERE `contato_pessoa`.`id` = '$id'";
	if (mysqli_query($conn, $sql)) {
  		echo "Contato Deletado com sucesso!";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


mysqli_close($conn);
header("Location: index.php");

?>