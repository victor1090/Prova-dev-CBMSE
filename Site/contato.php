<?php
//Variável do id da Pessoa cujo contato esta sendo visualizado
$pessoaid = $_POST['id'];

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

//Query de busca para a pessoa cujo contato vai ser mostrado
$sql = "SELECT * FROM pessoa WHERE id ='$pessoaid'";
$result = mysqli_query($conn, $sql);
//row é a variavel que contem os dados da pessoa
$row = mysqli_fetch_assoc($result);
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
    <title>Prova de desenvolvedor Junior CBMSE</title>
     <style type="text/css">
        div{
            width: 90%;
            padding: 5%;
        }
    </style>
  </head>
 <body>
    <div>
 	<h2>Adicionar Contato </h2>
 	Nome<br><input type='text' name="nome" id="nome" value=" <?php echo $row['nome'] ?>" disabled="disabled"><br>
 	Sobrenome<br><input type='text' name="sobrenome" id="sobrenome" value="<?php echo $row['sobrenome']; ?>" disabled="disabled"><br><br>
 	<h2>Contatos</h2>
 	<form name="adicionar" action="adicionar_contato.php" method="post">
 		<table>
 			<tr>
 				<td>Tipo do Contato</td>
 				<td> Contato</td>
 			</tr>
 			<tr>
 				<td><select name="tipocontato" id="tipocontato" style="width:130px;">
                        <option value="1">Telefone</option>
                        <option value="2">Celular</option>
                        <option value="3">Email</option>
                        <option value="4">Outros</option>
                    </select>
                </td>
 				<td><input type='text' name="contato" id="contato" style="margin: 0 10px"></td>
 			</tr>
 		</table>
 		<input type='hidden' name="pessoaId" id="pessoaId" value="<?php echo $pessoaid; ?>"><br>
    <button type="submit" class="btn btn-outline-success btn-sm">Salvar</button>
    <button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location.href = 'index.php'">Cancelar</button>
 	</form>
 </div>
 </body>
</html>