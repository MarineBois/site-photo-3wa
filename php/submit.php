<?php
include 'utilities.php';

if(array_key_exists('email',$_POST) && array_key_exists('mdp',$_POST)) {
    $email = ($_POST['email']);
    $mdp = ($_POST['mdp']);
   

    $query = $pdo->prepare
    (
        'SELECT
                *
            FROM user
            WHERE email = ?
            '
        );
        $query->bindParam(1, $email);
        
        $query->execute();
        
        $user = $query->fetch(PDO::FETCH_ASSOC);

    if(!empty($user)){
        if (password_verify($mdp, $user['password'])) {
            $_SESSION['idUser'] = htmlspecialchars($user['id']);
            $_SESSION['prenomUser'] = htmlspecialchars($user['prenom']);
            $_SESSION['mailUser'] = htmlspecialchars($user['email']);
            echo json_encode(["result"=>true,"message"=>"Vous êtes connecté"]);
        } else {
            echo json_encode(["result"=>false,"message"=>"Mauvais mot de passe"]);
        }
    }else {
        echo json_encode(["result"=>false,"message"=>"Auteur inconnu"]);
    }
}