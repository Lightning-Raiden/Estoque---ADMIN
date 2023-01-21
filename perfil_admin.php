<?php
    session_start();
    ob_start();
    require 'config.php';

    $info = [];
    $id = $_SESSION['id'];
    $sql = $pdo->query("SELECT * FROM tbl_usuario WHERE id = $id");
    
    if($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }

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

    <a class="title" href="home.php"> Sistema de Estoque </a>    

    <a class="relatorio" href="relatorio.php"> Relatório </a>

    <a class="logout" href="logout.php"> Sair </a>

</header><br/><br/>

<body>
    <div class="container">

        <div>
            <h1> Perfil </h1>
        </div>

        <div>
            <img src="assets/img/<?=$info['avatar']; ?>" widht="350" height="350" alt="foto do perfil"><br/><br/>
        </div>

        <div class="mx-5">
            <form action="recebedor_perf.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$info['id']; ?>">
                <label for="">
                    Imagem do Perfil:
                    <input type="file" name="avatar" class="form-control">
                </label><br/><br/>

                <input type="submit" value="Enviar" class="btn btn-success">
                <a class="btn btn-danger" href="home_admin.php"> Voltar </a>
            </form>
        </div>

    </div>
</body>