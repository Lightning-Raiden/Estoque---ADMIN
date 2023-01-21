<?php
    require 'config.php';

    $nome = filter_input(INPUT_POST, 'name');
    $preco = filter_input(INPUT_POST, 'preco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $quantidade_min = filter_input(INPUT_POST, 'quantidade_min');

    if($nome && $preco && $quantidade && $quantidade_min) {

        $sql = $pdo->prepare("INSERT INTO tbl_produto (nome, preco, quantidade, quantidade_min) VALUES (:name, :preco, :quantidade, :quantidade_min)");
        $sql->bindValue(':name', $nome);
        $sql->bindValue(':preco', $preco);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':quantidade_min', $quantidade_min);
        $sql->execute();

        if($resultado['nivel'] == 1) {
            header("Location: home_admin.php");
           exit;
        } else {
            header("Location: home.php");
             exit;
        }

    } else {
        header("Location: registrar.php");
        exit;
    }

?>