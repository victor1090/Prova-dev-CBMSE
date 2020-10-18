<?php
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

//Query de busca para a lista de pessoas cadastradas
$sql = "SELECT id,nome, sobrenome FROM pessoa";
$result = mysqli_query($conn, $sql);

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
    <h2>Lista de Contatos</h2>
    <br><button type="submit" class="btn btn-outline-success btn-sm" onclick="window.location.href = 'adicionar_pessoa.html'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Adicionar Pessoa</button><br><br>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" width="400">Nome Completo</th>
          <th scope="col" colspan="4">Ações</th>
        </tr>
      </thead>
      <tbody>
  <?php
      //Geração da Lista de pessoas recebidas na query ao banco de dados
      $contador = 0;
      while($row = mysqli_fetch_assoc($result)) {
          //Loop que vai imprimir linhas de uma tabela contendo os dados e os botões de ação de cada pessoa na lista
          $contador = $contador+1;
          $nome = $row["nome"];
          $sobrenome = $row["sobrenome"];
          $nomeCompleto = $nome.' '.$sobrenome;
          $id = $row["id"];
          
          echo "<tr><th scope='row'>".$contador."</th>";
          echo    "<td>".$nomeCompleto."</td>";
          echo    "<form id='formulario".$contador."' action='' method='post'>";
          echo    "<input type='hidden' name='id' id='id' value='".$id."'></form>";
          echo    "<td><button type='button' class='btn btn-outline-success btn-sm' onClick='enviarFormulario(".$contador.",\"contato.php\")'>Adicionar Contato</button></td>";
          echo    "<td><button type='button' class='btn btn-outline-secondary btn-sm' onClick='enviarFormulario(".$contador.",\"visualizar_contato.php\")'>Visualizar</button></td>";
          echo    "<td><button type='button' class='btn btn-outline-secondary btn-sm' onClick='enviarFormulario(".$contador.",\"editar_pessoa.php\")'>Editar</button></td>";
          echo    "<td><button type='button' class='btn btn-outline-danger btn-sm' onClick='enviarFormulario(".$contador.",\"deletar_pessoa.php\")'>Deletar</button></td>";
          echo "</tr>";
      }
      //Fechamento da conexão com o banco de dados
      mysqli_close($conn);
    ?>
    
    </tbody>
    </table>
  </div>
 </body>
</html>