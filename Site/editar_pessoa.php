<?php

$id = $_POST['id'];
$hostname="localhost";
$username="root";
$password="";
$dbname="agenda";

	
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Checando conexão
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT nome, sobrenome FROM pessoa WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
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
 	<h2>Editar Pessoa </h2>
 	<form name="adicionar" action="salvar_editar_pessoa.php" method="post">
 		Nome<br><input type='text' name="nome" id="nome" value=" <?php echo $row['nome'] ?>"><br><br>
 		Sobrenome<br><input type='text' name="sobrenome" id="sobrenome" value="<?php echo $row['sobrenome'] ?>"><br><br>
        <input type='hidden' name="id" id="id" value="<?php echo $id; ?>">
    <button type="submit" class="btn btn btn-outline-success btn-sm">Salvar</button>
    <button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location.href = 'index.php'" style="margin: 0 30px">Cancelar</button>
 	</form>
 
 </div>
</body>
</html>