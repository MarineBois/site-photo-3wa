<?php
include 'utilities.php';

// si tous les champs ont bien été complétés :
if(array_key_exists('email',$_POST) && array_key_exists('mdp',$_POST) && array_key_exists('mdp2',$_POST) && array_key_exists('prenom',$_POST)) {

    $email = htmlspecialchars($_POST['email']);
    $prenom = htmlspecialchars($_POST['prenom']);

    //step 1 on vérifie si les deux mdp sot identiques
    if ($_POST['mdp'] != $_POST['mdp2']) {

        //si non message erreur
        echo json_encode(["message_user"=>"La confirmation du mot de passe à échouée"]);

    } else {

        //si oui hash mdp
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

        // step 2 : vérifier si user pas déjà inscrit avec cet email :
        $query = $pdo->prepare
        (
            'SELECT
                    id
                FROM user
                WHERE email = ?
                '
        );
        $query->bindParam(1, $email);
        
        $query->execute();
        
        $user = $query->fetch(PDO::FETCH_ASSOC);

        //si déjà inscript => message erreur
        if(!empty($user)){
            echo json_encode(["message_user"=>"Vous êtes déjà inscrit"]);
        //sinon on passe au step 2    
        }else {

            // step 2 : Enregistrement dans la base de donnée :

            $query = $pdo->prepare
            (
                'INSERT INTO user (prenom, email, password) 
                VALUES (?,?,?)
                '
            );    
                
            $query->bindParam(1, $prenom);
            $query->bindParam(2, $email);
            $query->bindParam(3, $mdp);
        
            $query->execute();
        
            $_SESSION['idUser'] = htmlspecialchars($user['id']);
            $_SESSION['prenomUser'] = htmlspecialchars($user['prenom']);
            $_SESSION['mailUser'] = htmlspecialchars($user['email']);

            echo json_encode(["message_user"=>"Félicitation vous êtes inscrit","result"=>true]);

        }

    }    
} else {
    echo json_encode(["message_user"=>"Tous les champs doivent être complétés"]);
}