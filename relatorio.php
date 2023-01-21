<?php
    session_start();
    ob_start();
    require 'config.php';

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

    $lista = $pdo->query("SELECT * FROM tbl_produto WHERE id LIKE '%$id%' and nome LIKE '%$name%' and quantidade < quantidade_min");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Sistema de Estoque </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<header>

    <a class="title" href="home_admin.php"> Sistema de Estoque </a>  

    <a class="perf" href="perfil.php"> Perfil </a>

    <a class="logout" href="logout.php"> Sair </a>

</header><br/><br/>

<body>
    <div class="container">

        <div>
            <h1> Relatório </h1><br/>
        </div>

        <div>
            <a class="btn btn-danger" href="home_admin.php"> Voltar </a>
            <a class="btn btn-dark" href="" onclick="window.print()"> Imprimir </a><br/><br/>
        </div>

        <form action="" method="get">
            <div class="d-flex">
                <input type="number" name="id" placeholder="Buscar ID" class="form-control">
                <input type="text" name="name" placeholder="Buscar nome" class="form-control">
                <input type="submit" name="Buscar" value="Buscar" class="btn btn-primary">
            </div>
        </form><br/>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Imagem</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Quantidade Mínima</th>
                </tr>
                <?php foreach($lista as $produto): ?>
                    <tr>
                        <td><img src="assets/img/<?php echo $produto['img_prod'] ?>" width="75" height="75"></td>
                        <td><?php echo $produto['id'] ?></td>
                        <td><?php echo $produto['nome'] ?></td>
                        <td><?php echo $produto['preco'] ?></td>
                        <td><?php echo $produto['quantidade'] ?></td>
                        <td><?php echo $produto['quantidade_min'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    </div>
</body>