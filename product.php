<?php

function moeda($value, $precisao = 2) {

    if(empty($value))

    return '0';
  
    $value = str_replace(',', '', $value);
  
    return number_format($value, $precisao, ',', '.');
}

include 'dados.php';

$codigo = $_GET['cod'];

$produto = $produtos[$codigo];

$preco = moeda($produto['preco']);
$nome = $produto['nome'];
$imagem = $produto['imagem'];
$descricao = $produto['descricao'];
$especificacoes = $produto['especificacoes'];

include "header.php";

include "navbar.php";

?>

<h3>Visualizar produto</h3>

<div class="productContainer">
    <div class="productImgContainer">
        
        <?php echo "<img class=\"productImg\" src=\"produtos/$imagem\">" ?>
    </div>  
    <div class="productDataContainer">
        <p class=productName><?php echo $nome ?></p>
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
    <label>Calcular frete</label>
    <input class="calcFrete" type="type" placeholder="Digite seu CEP"><button class="okFrete">OK</button>
    <hr>
    <form action="cart.php" method="post">
        <button type="submit" class="buy" name="codigo" value="<?php echo $codigo?>"><i class="fas fa-shopping-cart"></i> Comprar</button>
    </form>
</div>

<?php
include "footer.php";
?>