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

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //print_r($dados);
    if(!empty($dados['Logar'])) {

        $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :email");
        $sql->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $sql->execute();

        if(($sql) && ($sql->rowCount() != 0)) {
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            //print_r($resultado);
            if(password_verify($dados['senha'], $resultado['senha'])) {
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['nome'] = $resultado['nome'];
                $_SESSION['nivel'] = $resultado['nivel'];

                if($resultado['nivel'] == 1) {
                    header("Location: home_admin.php");
                    exit;
                    
                } else {
                    header("Location: home.php");
                    exit;
                }
                
            } else {
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválidos!<p/>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválidos!<p/>";
        }

        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
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
            <h1> Login </h1><br/>
        </div>

        <form action="" method="post">

            <label for="">
                E-mail: <br/>
                <input type="email" name="email" class="form-control" value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>" required>
            </label><br/><br/>

            <label for="">
                Senha: <br/>
                <input type="password" name="senha" class="form-control" required>
            </label><br/><br/>

            <input type="submit" value="Logar" name="Logar" class="btn btn-primary">
            <a href="index.php" class="btn btn-danger"> Cancelar </a><br/><br/>

            <h4> Não tem uma conta? Crie a sua agora mesmo! </h4>
            <a href="cadastro.php" class="btn btn-success"> Criar uma conta </a>

        </form>

    </div>
</body>