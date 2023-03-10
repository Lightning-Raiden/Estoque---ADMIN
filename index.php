<?php
    session_start();
    ob_start();
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

<body style="padding: 5rem">
    
    <div>
        <h1> Seja bem-vindo! </h1><br/>
    </div>

    <div>
        <a class="btn btn-primary" href="cadastro.php"> Criar conta </a>
        <a class="btn btn-success" href="login.php"> Login </a><br/><br/>
    </div>

</body>