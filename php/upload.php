<?php
include('utilities.php');

$query = $pdo->prepare
    (
        'SELECT
            *
        FROM categorie
        WHERE id = ?
        '
    );

$query->bindParam(1, $_POST['categorie']);
$query->execute();

$categorie = $query->fetch(PDO::FETCH_ASSOC);

// vérification extention :
$validExtentions = array('jpeg', 'png', 'jpg', 'JPG');
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
$size = $_FILES["file"]["size"];

$src = htmlspecialchars($categorie['libelle'])."_".htmlspecialchars($_FILES['file']['name']);

if ((in_array($file_extension, $validExtentions)) && ( $size < 2000000)){
    
    // save fichier
    $sourcePath = $_FILES['file']['tmp_name'];
    $targetPath = "../img/photos/".$src;
    move_uploaded_file($sourcePath,$targetPath);



    // update table
    $query = $pdo->prepare
    (
        'INSERT INTO photo (nom, description, src, idCategorie)
        VALUES (?,?,?,?)
        '
    );
    $query->bindParam(1, $_POST['nom'], PDO::PARAM_STR);
    $query->bindParam(2, $_POST['description'], PDO::PARAM_STR);
    $query->bindParam(3, $src, PDO::PARAM_STR);
    $query->bindParam(4, $_POST['categorie'], PDO::PARAM_INT);

    $query->execute();


    
    // return éléments
    echo json_encode([
        'result' => true,
        'message' => 'La photo a bien été ajoutée'
        ]);

} else {

    echo json_encode([
        'validation' => false,
        'message' => 'Vos données n\'ont pas pu être modifiées'
    ]);
        
}    
