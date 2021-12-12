<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

?>

<?php  

include "header.php";

include "navbar.php";

?>

<h3>Sucesso.</h3>

<p>Seu formulário foi enviado com sucesso.</p>

<p>Confira se você enviou com os dados corretos:</p>

<?php

echo "<p>Nome: <b>".$nome."</b></p>";
echo "<p>Email: <b>".strtolower($email)."</b></p>";
echo "<p>Mensagem: <b>".$mensagem."</b></p>";

include "footer.php";

?>