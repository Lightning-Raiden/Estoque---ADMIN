<?php
    require 'config.php';

    if(isset($_SESSION['id'], $_SESSION['nome'])) {
        if($resultado['nivel'] == 1) {
            header("Location: home_admin.php");
            exit;
            
        } else {
            header("Location: home.php");
            exit;
        }
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

<body style="margin-top: 4rem">
    <div class="container">

        <div>
            <h1> Cadastrar Usuário </h1><br/>
        </div>

        <form action="cadastro_action.php" method="post">
            <label for="">
                Nome: <br/>
                <input type="text" name="name" class="form-control" required>
            </label><br/><br/>

            <label for="">
                E-mail: <br/>
                <input type="email" name="email" class="form-control" required>
            </label><br/><br/>

            <label for="">
                Senha: <br/>
                <input type="password" name="senha" class="form-control" required>
            </label><br/><br/>

            <label for="">
                Confirmar senha: <br/>
                <input type="password" name="confirm_senha" class="form-control" required>
            </label><br/><br/>

            <label for="">
                Nível: <br/>
                <input type="number" name="nivel" class="form-control" required>
            </label><br/><br/>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
            <a href="index.php" class="btn btn-danger"> Cancelar </a>
        </form>

    </div>
</body>