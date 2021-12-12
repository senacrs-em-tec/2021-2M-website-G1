<?php  

include "header.php";

include "navbar.php";

?>

<h3>Contato</h3>
<div class="contatoContainer">
    <form class="contatoForm" action="processacontato.php" method="post" enctype="multipart/form-data">
        <p style="font-weight: bolder;font-size: 1.5rem;">Por aqui você vai poder entrar em contato conosco para um suporte melhorado com nossa equipe.</p>
        <label>Nome:</label>
        <input type="text" name="nome" autocomplete="off" style="width: 20%;" required ><br>
        <label>Email:</label>
        <input type="email" name="email" autocomplete="off" style="width: 20.4%;" required><br>
        <label>Mensagem:</label><br>
        <textarea name="mensagem" rows="15" cols="193" autocomplete="off" spellcheck="true" onselect="" required></textarea><br>      
        <input class="contatoSubmit" type="submit">
    </form>
</div>

<?php 

include "footer.php";

?>