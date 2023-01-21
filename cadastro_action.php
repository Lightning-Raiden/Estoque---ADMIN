<?php
    require 'config.php';

    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $confirm_senha = filter_input(INPUT_POST, 'confirm_senha');
    $nivel= filter_input(INPUT_POST, 'nivel');

    if($name && $email && $senha && $confirm_senha && $nivel) {

        $sql = $pdo->prepare("SELECT * FROM tbl_usuario WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() === 0) {
            
            if($senha === $confirm_senha) {
                
                $password_hash = password_hash($senha, PASSWORD_DEFAULT);

                $sql = $pdo->prepare("INSERT INTO tbl_usuario (nome, email, senha, nivel) VALUES (:name, :email, :senha, :nivel)");
                $sql->bindValue(':name', $name);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':senha', $password_hash);
                $sql->bindValue(':nivel', $nivel);
                $sql->execute();

                 header("Location: login.php");
                 exit;
            } else {
                header("Location: cadastro.php");
                exit;
            }
        } else {
            header("Location: cadastro.php");
            exit;
        }
    } else {
        header("Location: cadastro.php");
        exit;
    }

?>