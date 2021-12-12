<?php  

include "header.php";

// Navegation Bar | Barra de navegação
include "navbar.php";

include "footer.php";

?>

<h3>Trabalhe conosco</h3>
<div class="contatoContainer">
    
    <form class="contatoForm" action="processatrabalhe.php" method="post" enctype="multipart/form-data">
        <p style="font-size: 1.25em; font-weight: bolder;"> Envie seu currículo e suas informações para nossa equipe analizar e possívelmente aceitar o seu contrato (aceitamos arquivos .doc e .pdf).</p>
        <label>Nome Completo:</label><br>
        <input type="text" name="nome" autocomplete="off" style="width: 20%;" required ><br>
        <label>Currículo:</label><br>
        <input type="file" name="curriculo">
        <input class="contatoSubmit" type="submit">
    </form>
</div>