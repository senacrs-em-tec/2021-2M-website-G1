<script>

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>

<?php  

include "header.php";

include "navbar.php";

function moeda($value, $precisao = 2) {

    if(empty($value))
    
    return '0';
  
    $value = str_replace(',', '', $value);
  
    return number_format($value, $precisao, ',', '.');
}

if (!empty($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    $produto = $produtos[$codigo];

    $preco = moeda($produto['preco']);
    $nome = $produto['nome'];
    $imagem = $produto['imagem'];
    $descricao = $produto['descricao'];
    $especificacoes = $produto['especificacoes'];

    ?>
    
    <h3>Carrinho de compras</h3>

    <div class="productContainer">
        <div class="productImgContainer">
            <?php echo "<img class=\"productImg\" src=\"produtos/$imagem\">" ?>
        </div>  
        <div class="productDataContainer">
            <p class="productName"><?php echo $nome ?></p>
            <p><?php echo $descricao ?></p>
            <hr id="hrProduct">
            <?php
                foreach (array_keys($especificacoes) as &$especificacao) {
                    echo "<p class=\"productDescName\">$especificacao:   <p class=\"productDesc\">$especificacoes[$especificacao]</p></p>";
                }
            ?>
        </div>
    </div>

    <div class="pricingContainer">
        <p class="productPriceShopping">R$ <?php echo $preco ?> </p>
        <p class="productCardShopping">12x no cartão de crédito sem juros.</p>
        <hr>
        <form method="get" action=".">
            <label>Digite seu endereço</label>
            <input class="dadosEndereco" type="type" value="" size="10" maxlength="9" name="cep" id="cep" placeholder="CEP">
            <input class="dadosEndereco" type="type" size="60" name="rua" id="rua" placeholder="Rua e Número">
            <input class="dadosEndereco" type="type" size="2" name="uf" id="uf"  placeholder="Estado">
            <input class="dadosEndereco" type="type" size="40" name="cidade" id="cidade" placeholder="Cidade">
            <input class="dadosEndereco" type="type" size="40" name="bairro" id="bairro" placeholder="Bairro">
            <input class="dadosEndereco" type="type" name="" id="" placeholder="Complemento">
            <hr>
            <button  class="buy" ><i class="fas fa-shopping-cart"></i> Finalizar compra</button>
        </form>
    </div>
        

    <?php
} 

else {
    ?>

    <h3>Carrinho de compras</h3>

    <label>Nenhum produto encontrado no carrinho.</label>

    <?php
}

?>

<?php

include "footer.php";

?>