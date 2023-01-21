<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head.php';

    $lista = [];
    $sql = $pdo->query("SELECT * FROM tbl_produto");
   
    if($sql->rowCount() > 0) {
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
   
    if(!isset($_SESSION['id'], $_SESSION['nome'])) {
        header("Location: index.php");
        exit;
    }

    $id = filter_input(INPUT_GET, 'id');
    $name = filter_input(INPUT_GET, 'name');
    $preco = filter_input(INPUT_GET, 'preco');
    $quantidade = filter_input(INPUT_GET, 'quantidade');
    $quantidade_min = filter_input(INPUT_GET, 'quantidade_min');

    $lista = $pdo->query("SELECT * FROM tbl_produto WHERE id LIKE '%$id%' and nome LIKE '%$name%'");

?>

<body>
    <div class="container">

        <div>
            <h2> Bem-vindo, <?php echo $_SESSION['nome'] ?></h2>
            <h1> Produtos </h1><br/>
        </div>

        <form action="" method="get">
            <div class="d-flex">
                <input type="number" name="id" placeholder="Buscar ID" class="form-control">
                <input type="text" name="name" placeholder="Buscar nome" class="form-control">
                <input type="submit" name="Buscar" value="Buscar" class="btn btn-primary">
            </div>
        </form><br/>

        <div class="table-responsive">
            <table class="table ">
                <tr>
                    <th>Imagem</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                </tr>
                <?php foreach($lista as $produto): ?>
                    <tr>
                        <td><img src="assets/img/<?php echo $produto['img_prod'] ?>" width="80" height="80"></td>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['preco'] ?></td>
                        <td><?php echo $produto['quantidade'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</body>