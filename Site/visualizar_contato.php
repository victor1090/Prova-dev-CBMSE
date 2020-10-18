<?php
//Variáveis do id da Pessoa cujo contato esta sendo visualizado
if (!empty($_POST)){
  $pessoaId = $_POST['id'];
}else{
  $pessoaId = $_GET['pessoaId'];
}


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
$sql = "SELECT nome,sobrenome FROM pessoa WHERE id ='$pessoaId'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//Variaveis contendo os dados da pessoa
$nome = $row['nome'];
$sobrenome = $row['sobrenome'];

//Query de busca para a lista de contatos cadastradas da referida pessoa
$sql = "SELECT id,contato,tipo_contato_id FROM contato_pessoa WHERE pessoa_id ='$pessoaId'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Prova de desenvolvedor Junior CBMSE</title>
    <script type="text/javascript">
      //Função para alterar o formulario e o destino dinamicamente
     function enviarFormulario(id,action){
        var nome = 'formulario'+id;
        var form = document.getElementById(nome);
        form.action = action;
        form.submit();
    }
   </script>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
   <style type="text/css">
        div{
            width: 90%;
            padding: 5%;
        }
    </style>
  </head>
  <body>
    <div>
    <h2>Visualizar Contato</h2>

    Nome<br><input type='text' name="nome" id="nome" value=" <?php echo $nome ?>" disabled="disabled"><br>
    Sobrenome<br><input type='text' name="sobrenome" id="sobrenome" value="<?php echo $sobrenome; ?>" disabled="disabled"><br><br>

    <form name="add_contato" action="contato.php" method="post">
      <input type='hidden' name='id' id='id' value="<?php echo $pessoaId; ?>">
      <button type="submit" class="btn btn-outline-success btn-sm">Adicionar Contato</button>
    </form>
    <h2>Contatos</h2>

    <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">Tipo</th>
      <th scope="col">Contato</th>
      <th scope="col" colspan="2">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
         //Geração da Lista de contatos recebidas na query ao banco de dados
        $contador = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $contador = $contador+1;

            $tipo = $row["tipo_contato_id"];
            //Trocar o digito do tipo pelo respectivo significado
            if($tipo ==1){
              $tipo= 'Telefone';
            }elseif($tipo==2){
              $tipo= 'Celular';
            }elseif($tipo==3){
              $tipo= 'E-mail';
            }elseif($tipo==4){
              $tipo= 'Outros';
            }

            $contato = $row["contato"];
            $id = $row["id"];
            //Loop que vai imprimir linhas de uma tabela contendo os contatos e os botões de ação de cada pessoa na lista
            echo "<tr>";
            echo    "<td>".$tipo."</td>";
            echo    "<td>".$contato."</td>";
            echo    "<form id='formulario".$contador."' action='' method='post'><input type='hidden' name='id' id='id' value='".$id."'><input type='hidden' name='pessoaId' id='pessoaId' value='".$pessoaId."'></form>";
            echo    "<td><button type='button' class='btn btn-outline-secondary btn-sm' onClick='enviarFormulario(".$contador.",\"editar_contato.php\")'>Editar</button></td>";
            echo    "<td><button type='button' class='btn btn-outline-danger btn-sm' onClick='enviarFormulario(".$contador.",\"deletar_contato.php\")'>Deletar</button></td>";
            echo "</tr>";
        }
    ?>
    
  </tbody>
</table>
<button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location.href = 'index.php'">Voltar</button>
</div>
</body>
</html>