<?php
//Recebendo os dados via POST
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];

//Variáveis de acesso ao banco de dados
$hostname="localhost";
$username="root";
$password="";
$dbname="agenda";

	
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Checando conexão com o banco
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//Query de inserção de pessoa no banco de dados
$sql = "INSERT INTO `pessoa`(`nome`, `sobrenome`) VALUES ('$nome','$sobrenome')";

//checagem de erro
if (mysqli_query($conn, $sql)) {
  echo "Pessoa Adicionada com sucesso!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//Fechamento da conexão com o banco de dados
mysqli_close($conn);

header("Location: index.php");
?>