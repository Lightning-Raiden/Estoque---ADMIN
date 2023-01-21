<?php
    require 'config.php';
    require 'head_admin.php';

    $info = [];

    $id = filter_input(INPUT_GET, 'id');

    if($id) {
        $sql = $pdo->prepare("SELECT * FROM tbl_produto WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
            
        } else {
            header("Location: home_admin.php");
            exit;
        }
    } else {
        header("Location: home_admin.php");
        exit;
    }

?>
<body>
    
    <div class="container">

        <h1> Editar </h1><br/>

        <img src="assets/img/<?=$info['img_prod'];  ?>" widht="150" height="150" alt="foto do produto"><br/><br/>

        <form action="recebedor.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$info['id']; ?>" />
            <label for="" class="form-label">
                Imagem do Produto: <br/>
                <input type="file" name="img_prod" class="form-control">
            </label><br/>

            <input type="submit" value="Enviar">
        </form><br/><br/>

        <form action="editar_action.php" method="post">
            <input type="hidden" name="id" value="<?=$info['id']; ?>" />
            <div class="mb-3">
                <label for="" class="form-label">
                    Nome: <br/>
                    <input type="text" name="name" value="<?=$info['nome']; ?>" class="form-control">
                </label><br/><br/>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Preço: <br/>
                    <input type="text" name="preco" value="<?=$info['preco']; ?>" class="form-control">
                </label><br/><br/>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Quantidade: <br/>
                    <input type="text" name="quantidade" value="<?=$info['quantidade']; ?>" class="form-control">
                </label><br/><br/>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    Quantidade Mínima: <br/>
                    <input type="text" name="quantidade_min" value="<?=$info['quantidade_min']; ?>" class="form-control">
                </label><br/><br/>
            </div>

            <input type="submit" value="Salvar" class="btn btn-primary">
            <a href="home.php" class="btn btn-danger"> Cancelar </a>
        </form><br/>

    </div>
    
</body>