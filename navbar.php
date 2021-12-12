        <div class="navbarCustom navbar navbar-expand-md navbarColor mb-4" role="navigation">
        <a class="navbar-brand navbarFont" href="index.php">TecHub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="pagprodutos.php">Produtos <span class="sr-only">(current)</span></a>

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>

                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                        <?php
                            include 'dados.php';

                            foreach (array_keys($categorias) as &$value) {
                                echo '<li class="dropdown-submenu">';

                                echo '<a class="dropdown-item" tabindex="-1" href="#">'.$value.'</a>';

                                echo '<ul class="dropdown-menu">';

                                foreach ($categorias[$value] as &$subcategorias) {
                                    echo '<li class="dropdown-item"><a href="pagprodutos.php?cat='.$subcategorias.'">'.$subcategorias.'</a></li>';
                                }

                                echo '</ul>';
                            }
                        ?>
                    </ul>
                </div>

                <input id="source" class="form-control mr-sm-2 search" type="text" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" aria-label="Search" onkeypress="onTextChange()">
                
                <a class="buttonSearch my-2 my-sm-0" id="form-search" style="text-decoration: none" href="">Pesquisar</a>                
            </ul>

            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i></a>

        </div>
    </div>
    
    <script type="text/javascript">
        function onTextChange() {
            var value = document.getElementById('source').value;
            var form = document.getElementById('form-search');

            form.href = "pagprodutos.php?search=" + value;
        }
    </script>

    <script src="script.js"></script>