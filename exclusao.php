<!DOCTYPE html>
<html>
<head>
  <title>Consultar Status do Livro</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="manifest" href="/manifest.json">
  <script>
      //pwa -  registrar o service worker
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
        navigator.serviceWorker.register('/sw.js').then(function(registration) {
          console.log('Service worker registered: ', registration);
        }, function(err) {
          console.log('Service worker registration failed: ', err);
        });
      });
    }
  </script>
</head>
<body>
<?php
// Conectar ao banco de dados
$host = "localhost";
$username = "root";
$password = "";
$dbname = "catu";

// Criar conexão
$conn = mysqli_connect($host, $username, $password, $dbname);
// Verificar conexão
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Receber o valor do livro digitado
$nome = $_POST["nome"];

// Consulta de livro por nome faça a consulta ao BD aqui
$sql = "DELETE FROM mulheres WHERE Nome LIKE '$nome'";
$result = mysqli_query($conn, $sql);

// Verificar se a consulta retornou algum resultado
if (!$result) {
  die('Erro na consulta: ' . mysqli_error($conn));
}

else {
    echo  "<h1>Usuário deletado com sucesso!</h1>";
}

// Fechar a conexão
mysqli_close($conn);
?>
</body>
</html>
