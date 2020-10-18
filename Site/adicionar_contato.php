<?php
//Variáveis do contato para ser adicionado no banco
$contato = $_POST['contato'];
$tipocontato = $_POST['tipocontato'];
$pessoaId = $_POST['pessoaId'];

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

//Query de busca para verificar se o contato já existe
$sql = "SELECT contato, pessoa_id, tipo_contato_id FROM contato_pessoa WHERE contato ='$contato' AND pessoa_id = '$pessoaId' AND tipo_contato_id = '$tipocontato'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	//Se o contato já existe a pagina é redirecionada para visualizar_contato.php enviando o ID da pessoa via GET
	header("Location: visualizar_contato.php?pessoaId=$pessoaId");
	
}else{
	//Query para inserir um novo contato no banco de dados
	$sql = "INSERT INTO `contato_pessoa`(`contato`, `pessoa_id`,`tipo_contato_id`) VALUES ('$contato','$pessoaId','$tipocontato')";
	$result = mysqli_query($conn, $sql);
	mysqli_close($conn);
	if ($result) {
		//Redirecionamento para a pagina inicial
		header("Location: index.php");
	} else {
		echo "<script>alert('Erro ao Adicionar Contato!);location.href=\"index.php\";</script>";
	}
}

?>