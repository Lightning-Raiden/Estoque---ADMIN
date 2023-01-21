<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $nome = filter_input(INPUT_POST, 'name');
    $preco = filter_input(INPUT_POST, 'preco');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $quantidade_min = filter_input(INPUT_POST, 'quantidade_min');

    if($id && $nome && $preco && $quantidade && $quantidade_min) {

        $sql = $pdo->prepare("UPDATE tbl_produto SET nome = :name, preco = :preco, quantidade = :quantidade, quantidade_min = :quantidade_min WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':name', $nome);
        $sql->bindValue(':preco', $preco);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->bindValue(':quantidade_min', $quantidade_min);
        $sql->execute();

        header("Location: home_admin.php");
        exit;

    } else {
        header("Location: editar.php");
        exit;
    }

?>