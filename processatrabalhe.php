<?php

$nome = $_POST['nome'];

$nomeArquivo = $nome;

$pasta = "curriculos/";

$temporario = $_FILES['curriculo']['tmp_name'];

$extensao = pathinfo($_FILES['curriculo']['name'], PATHINFO_EXTENSION);

$nomeTemp = $nomeArquivo.'.'.$extensao;

move_uploaded_file($temporario, $pasta.$nomeTemp);

include "header.php";

include "navbar.php";

?>

<h3>Sucesso.</h3>

<p>Seu formulário foi enviado com sucesso.</p>

<p>Confira se você enviou com os dados corretos:</p>

<?php

echo "<p>Nome: <b>".$nome."</b></p>";
echo "<p>Nome do Arquivo: <b>".$nomeTemp."</b></p>";

include "footer.php";

?>