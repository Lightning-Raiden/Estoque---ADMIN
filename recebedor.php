<?php
    // session_start();
    // ob_start();
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');

    $permitidos = array('image/jpg', 'image/jpeg', 'image/png');

    if(in_array($_FILES['img_prod']['type'], $permitidos)) {
        $img_prod = $_FILES['img_prod']['name'];
        move_uploaded_file($_FILES['img_prod']['tmp_name'], 'assets/img/'.$img_prod);

            $sql = $pdo->prepare("UPDATE tbl_produto SET img_prod = :img_prod WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':img_prod', $img_prod);
            $sql->execute();

        echo 'Arquivo salvo com sucesso!';
            if($resultado['nivel'] == 1) {
                header("Location: home_admin.php");
               exit;
            } else {
                header("Location: home.php");
                 exit;
            }

    } else {
        echo 'Arquivo não permitido!';
    }

?>