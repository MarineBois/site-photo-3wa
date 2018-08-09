<?php
include 'utilities.php';

//affichage des photos :

if (isset($_SESSION['recherche']) && ($_SESSION['recherche']!="0")) {

    $query = $pdo->prepare
    (
        'SELECT
            *
        FROM photo
        WHERE idCategorie = ?
        ORDER BY id DESC
        '
    );
    $query->bindParam(1, $_SESSION['recherche']);
    $query->execute();

    $photos = $query->fetchAll(PDO::FETCH_ASSOC);

    

} else  {
    $query = $pdo->prepare
    (
        'SELECT
            *
        FROM photo
        ORDER BY id DESC
        '
    );
    
    $query->execute();
    
    $photos = $query->fetchAll(PDO::FETCH_ASSOC);

    
}

$query = $pdo->prepare
    (
        'SELECT
            *
        FROM categorie
        '
    );

    $query->execute();

    $categories = $query->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_GET['id'])){
    $query = $pdo->prepare
    (
        'SELECT
            *
        FROM photo
        WHERE id=?
        '
    );
    
    $query->bindParam(1, $_GET['id']);
    $query->execute();
    return $photo = $query->fetch(PDO::FETCH_ASSOC);

}    