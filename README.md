# Responsável

* Victor Santos de Souza - git(victor.souza@dcomp.ufs.br) user: **@victor1090**

## Descrição da Implementação

A implementação consiste em um site que funciona como uma agenda eletrônica, fazendo adição,edição e exclusão de pessoas e contatos.
Para a codificação foi utilizada a linguagem de programação PHP para realizar as operações e as rotinas em conjunto com o banco de dados MySQL. Foi utilizado o software WampServer para fazer a instalação e configuração do servidor HTTP Apache, do banco de Dados MySQL e o suporte a linguagem PHP.


Foram criados diversos arquivos para atingir o proposito da aplicação. Existem 11 arquivos php e 1 arquivo html
que equivalem as funcionalidades básicas que foram solicitadas na aplicação. Sendo eles:
* index.php - Página inicial da Aplicação que funciona como uma listagem das pessoas adicionadas nos Contatos.
* adicionar_pessoa.html - Contém o formulário html para a inserção dos dados.
* adicionar_pessoa.php  - Contém a parte procedural da rotina de inserir o registro no banco de dados.
* editar_pessoa.php - Contém o formulário já preenchido com os dados da pessoa escolhida para alteração.
* salvar_editar_pessoa.php - Contém a parte procedural da rotina de alteração de registro no banco de dados.
* deletar_pessoa.php - Contém a parte procedural da rotina de apagamento de registro no banco de dados.
* visualizar_contato.php - Lista todos os contatos de uma determinada pessoa escolhida.
* contato.php - Contém o formulário para a inserção dos dados de um novo contato.
* adicionar_contato.php - Contém a parte procedural da rotina de inserção de registro no banco de dados.
* editar_contato.php - Contém o formulário já preenchido com os dados do contato escolhida para alteração.
* salvar_editar_contato.php - Contém a parte procedural da rotina de alteração de registro no banco de dados.
* deletar_contato.php - Contém a parte procedural da rotina de apagamento de registro no banco de dados.


# Dependências

* Servidor WEB com suporte a linguagem PHP e banco de dados MySQL.


# Licença

* [PHP]( https://www.php.net/license/3_01.txt ) .

* [Apache]( http://www.apache.org/licenses/LICENSE-2.0 ).

# Organização

* Pastas
  * Site - Pasta com os arquivos das funcionalidades da aplicação.
  * schema do banco - Pasta com o dump do banco de dados utilizado pela aplicação. Foram feita pequenas alterações do banco de dados original, por exemplo, Id auto-incrementavéis.