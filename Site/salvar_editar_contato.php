<?php
//Variáveis do contato que vai ser editado
$id = $_POST['id'];
$contato = $_POST['contato'];
$pessoaId = $_POST['pessoaId'];
$tipocontato = $_POST['tipocontato'];
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
//Query para atualizar o contato com o id especificado
$sql = "Update `contato_pessoa` SET `contato`= '$contato', `tipo_contato_id` = '$tipocontato' WHERE `contato_pessoa`.`id` = '$id'";
	if (mysqli_query($conn, $sql)) {
  		echo "Contato Alterado com sucesso!";
	} else {
  		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


mysqli_close($conn);
header("Location: index.php");

?>