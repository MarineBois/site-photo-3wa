<?php
include('utilities.php');
if (isset($_SESSION['idUser'])) {

    // récupérer les infos des images sélectionnées :
    $query = $pdo->prepare
    (
        'SELECT *
        FROM photo
        WHERE idCategorie=?
        '
    );

    $query->bindParam(1, $_GET['id'], PDO::PARAM_STR);

    $query->execute();

    $photo = $query->fetchAll(PDO::FETCH_ASSOC);


    // suppression des photos de la catégorie sélectionné :
    foreach ($photo as $value) {

        $query = $pdo->prepare
        (
            'DELETE FROM photo
            WHERE idCategorie=?
            '
        );
        $query->bindParam(1, $value['idCategorie'], PDO::PARAM_STR);

        $query->execute();

        //suppression de l'image sur le serveur
        unlink('../img/photos/'.$value['src']);

    }    

    $query = $pdo->prepare
    (
        'DELETE FROM categorie
        WHERE id=?
        '
    );
    $query->bindParam(1, $_GET['id'], PDO::PARAM_STR);

    $query->execute();
    header('Location: ../admin.php');
    exit; 
}
header('Location: ../index.php');
exit;