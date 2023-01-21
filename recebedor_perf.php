<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');

    $permitidos = array('image/jpg', 'image/jpeg', 'image/png', 'image/jfif');
    
    if(in_array($_FILES['avatar']['type'], $permitidos)) {
        $avatar = $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/img/'.$avatar);
       
            $sql = $pdo->prepare("UPDATE tbl_usuario SET avatar = :avatar WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':avatar', $avatar);
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