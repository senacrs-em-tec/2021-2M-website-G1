<?php

function moeda($value, $precisao = 2) {

    if(empty($value))
      return '0';
  
    // Remove a virgula do valor
    $value = str_replace(',', '', $value);
  
    // Formata usando o numero de casas decimais desejado
    return number_format($value, $precisao, ',', '.');
}

if (empty($_GET['cat']) == FALSE) {
    $categoria = $_GET['cat'];
}

if (empty($_GET['search']) == FALSE) {
    $pesquisa = $_GET['search'];
}

?>

<div>
    <h3>Produtos</h3>
    <div class="row">
        <div class="products">
            <?php
                include 'dados.php';

                $counter = 0;

                foreach ($produtos as &$produto) {
                    $codigo = $produto['codigo'];
                    $valor= moeda ($produto['preco']);
                    

                    if (!empty($pesquisa)) {
                        if (str_contains(strtolower($produto['nome']), strtolower($pesquisa))) {
                            $counter++;

                            echo "
                            <a href=\"product.php?cod=$codigo\">
                                <div class=\"productBox \">
                                    <img src=\"produtos/{$produto['imagem']} \">
                                    <p class=\"nameProduct\">{$produto['nome']}</p>
                                    <div class=\"wrap\">
                                    <div class=\"container d-flex mt-200\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"stars\">
                                                    <form action=\"\"> <input class=\"star star-5\" id=\"star-5\" type=\"radio\" name=\"star\" /> <label class=\"star star-5\" for=\"star-5\"></label> <input class=\"star star-4\" id=\"star-4\" type=\"radio\" name=\"star\" /> <label class=\"star star-4\" for=\"star-4\"></label> <input class=\"star star-3\" id=\"star-3\" type=\"radio\" name=\"star\" /> <label class=\"star star-3\" for=\"star-3\"></label> <input class=\"star star-2\" id=\"star-2\" type=\"radio\" name=\"star\" /> <label class=\"star star-2\" for=\"star-2\"></label> <input class=\"star star-1\" id=\"star-1\" type=\"radio\" name=\"star\" /> <label class=\"star star-1\" for=\"star-1\" style=\"padding-left: 0px;\"></label> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p class=\"productPrice\">R$ {$valor}</p>
                                    <p class=\"productCard\">12x no cartão sem juros</p>
                                </div>
                            </a>
                            ";
                        }
                    }

                    else if (!empty($categoria)) {
                        if (strtolower($produto['categoria']) == strtolower($categoria)) {
                            $counter++;

                            echo "
                            <a href=\"product.php?cod=$codigo\">
                                <div class=\"productBox \">
                                    <img src=\"produtos/{$produto['imagem']} \">
                                    <p class=\"nameProduct\">{$produto['nome']}</p>
                                    <div class=\"wrap\">
                                    <div class=\"container d-flex mt-200\">
                                        <div class=\"row\">
                                            <div class=\"col-md-12\">
                                                <div class=\"stars\">
                                                    <form action=\"\"> <input class=\"star star-5\" id=\"star-5\" type=\"radio\" name=\"star\" /> <label class=\"star star-5\" for=\"star-5\"></label> <input class=\"star star-4\" id=\"star-4\" type=\"radio\" name=\"star\" /> <label class=\"star star-4\" for=\"star-4\"></label> <input class=\"star star-3\" id=\"star-3\" type=\"radio\" name=\"star\" /> <label class=\"star star-3\" for=\"star-3\"></label> <input class=\"star star-2\" id=\"star-2\" type=\"radio\" name=\"star\" /> <label class=\"star star-2\" for=\"star-2\"></label> <input class=\"star star-1\" id=\"star-1\" type=\"radio\" name=\"star\" /> <label class=\"star star-1\" for=\"star-1\" style=\"padding-left: 0px;\"></label> </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <p class=\"productPrice\">R$ {$valor}</p>
                                    <p class=\"productCard\">12x no cartão sem juros</p>
                                </div>
                            </a>
                            ";
                        }
                    } 
                    
                    else {
                        echo "
                        <a href=\"product.php?cod=$codigo\">
                            <div class=\"productBox \">
                                <img src=\"produtos/{$produto['imagem']} \">
                                <p class=\"nameProduct\">{$produto['nome']}</p>
                                <div class=\"wrap\">
                                <div class=\"container d-flex mt-200\">
                                    <div class=\"row\">
                                        <div class=\"col-md-12\">
                                            <div class=\"stars\">
                                                <form action=\"\"> <input class=\"star star-5\" id=\"star-5\" type=\"radio\" name=\"star\" /> <label class=\"star star-5\" for=\"star-5\"></label> <input class=\"star star-4\" id=\"star-4\" type=\"radio\" name=\"star\" /> <label class=\"star star-4\" for=\"star-4\"></label> <input class=\"star star-3\" id=\"star-3\" type=\"radio\" name=\"star\" /> <label class=\"star star-3\" for=\"star-3\"></label> <input class=\"star star-2\" id=\"star-2\" type=\"radio\" name=\"star\" /> <label class=\"star star-2\" for=\"star-2\"></label> <input class=\"star star-1\" id=\"star-1\" type=\"radio\" name=\"star\" /> <label class=\"star star-1\" for=\"star-1\" style=\"padding-left: 0px;\"></label> </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <p class=\"productPrice\">R$ {$valor}</p>
                                <p class=\"productCard\">12x no cartão sem juros</p>
                            </div>
                        </a>
                        ";
                    }
                }

                if ($counter == 0) {
                    ?>
                        <label>Nenhum produto foi encontrado.</label>
                    <?php
                }
            ?>
        </div>
    </div>
</div>