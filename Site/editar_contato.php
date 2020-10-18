<?php
//Variáveis do id da Pessoa cujo contato esta sendo visualizado
$pessoaId = $_POST['pessoaId'];
//Variável do id do contato que vai ser editado
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
//Query de busca para a pessoa cujo contato vai ser editado
$sql = "SELECT nome,sobrenome FROM pessoa WHERE id ='$pessoaId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//Variaveis contendo os dados da pessoa
$nome = $row['nome'];
$sobrenome = $row['sobrenome'];

//Query de busca para o contato que vai ser editado
$sql = "SELECT id, contato, pessoa_id, tipo_contato_id FROM contato_pessoa WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//row é a variavel que contem os dados do contato

mysqli_close($conn);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style type="text/css">
        div{
            width: 90%;
            padding: 5%;
        }
    </style>
    <title>Prova de desenvolvedor Junior CBMSE</title>
  </head>
 <body>
    <div>
 	<h2>Editar Contato </h2>
 	Nome<br><input type='text' name="nome" id="nome" value=" <?php echo $nome ?>" disabled='disabled'><br>
 	Sobrenome<br><input type='text' name="sobrenome" id="sobrenome" value=" <?php echo $sobrenome ?>" disabled='disabled'><br><br>
 	<h2>Contato</h2>
 	<form name="adicionar" action="salvar_editar_contato.php" method="post">
 		<table>
 			<tr>
 				<td>Tipo do Contato</td>
 				<td> Contato</td>
 			</tr>
 			<tr>
 				<td><select name="tipocontato" id="tipocontato" style="width:130px;">
                        <option value="1" <?php echo $row['tipo_contato_id']==1?'selected':'';?>>Telefone</option>
                        <option value="2"<?php echo $row['tipo_contato_id']==2?'selected':'';?>>Celular</option>
                        <option value="3"<?php echo $row['tipo_contato_id']==3?'selected':'';?>>Email</option>
                        <option value="4"<?php echo $row['tipo_contato_id']==4?'selected':'';?>>Outros</option>
                    </select>
                </td>
 				<td><input type='text' name="contato" id="contato" value=" <?php echo $row['contato'] ?>" style="margin: 0 10px"></td>
 			</tr>
 		</table>
 		<input type='hidden' name="pessoaId" id="pessoaId" value=" <?php echo $pessoaId ?>"><br>
 		<input type='hidden' name="id" id="id" value=" <?php echo $row['id'] ?>"><br>
    <button type="submit" class="btn btn-outline-success btn-sm">Salvar</button>
    <button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location.href = 'index.php'">Voltar</button>
 	</form>
 </div>
 </body>
</html>
