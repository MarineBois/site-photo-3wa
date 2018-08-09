<?php
include('utilities.php');
if (isset($_SESSION['idUser'])) {

    // récupérer les infos de l'image sélectionnée :
    $query = $pdo->prepare
    (
        'SELECT *
        FROM photo
        WHERE id=?
        '
    );

    $query->bindParam(1, $_GET['id'], PDO::PARAM_STR);

    $query->execute();

    $photo = $query->fetch(PDO::FETCH_ASSOC);

    //suppression dans la bdd de l'image
    $query = $pdo->prepare
    (
        'DELETE FROM photo
        WHERE id=?
        '
    );
    $query->bindParam(1, $photo['id'], PDO::PARAM_STR);

    $query->execute();

    //suppression de l'image sur le serveur
    unlink('../img/photos/'.$photo['src']);


    header('Location: ../admin.php');
    exit; 
}
header('Location: ../index.php');
exit;