<?php
    require 'config.php';
    include 'head_admin.php';
?>

<body>
    <div class="container">
        
        <div>
            <h1> Registrar Produto </h1><br/>
        </div>
    
        <form method="post" action="registrar_action.php">
            <label for="">
                Nome: <br/>
                <input type="text" name="name" class="form-control">
            </label><br/><br/>

            <label for="">
                Preço: <br/>
                <input type="text" name="preco" class="form-control">
            </label><br/><br/>

            <label for="">
                Quantidade: <br/>
                <input type="text" name="quantidade" class="form-control">
            </label><br/><br/>

            <label for="">
                Quantidade Mínima: <br/>
                <input type="text" name="quantidade_min" class="form-control">
            </label><br/><br/>

        <input type="submit" value="Registrar" class="btn btn-primary">
        <a href="home_admin.php" class="btn btn-danger"> Cancelar </a>
    </form>

    </div>
</body>