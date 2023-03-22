<style>



@import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap');


{

  font-family: 'Libre Baskerville', serif;
   
}



  
</style>






<?php

    


//variaveis da conexão do banco dados

$servidor = "localhost";
$usuario = "id20466315_eduardo";
$senha = "+Y9/I=dn]KWzc7Zx";
$nomedb = "id20466315_doraaventureira"; // nome do banco de dados que será usado

// Cria a conexão com o banco de dados
$conn = new mysqli($servidor, $usuario, $senha, $nomedb);

// Checa a conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Conectado ao banco de dados"."<br>";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Coleta os dados do formulário
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $numero = $_POST["numero"];

  // Insere os dados no banco de dados
  $sql = "INSERT INTO alunos (nome, sobrenome, numero) VALUES ('$nome', '$sobrenome', '$numero')";
  if ($conn->query($sql) === TRUE) {
    echo "<br> Dados inseridos com sucesso"."<br>";
  } else {
    echo "Erro ao inserir dados: " . $conn->error;
  }
}

//visualiza tabela
$sql = "SELECT nome,  sobrenome,  numero  FROM alunos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Nome: " .  $row["nome"] . "  - Sobrenome:  " . $row["sobrenome"] . " - Número:  " . $row["numero"]. "<br>";
  }
} else {
  echo " 0 resultados tabela vazia ";
}

$conn->close();
?>