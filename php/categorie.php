<?php include('utilities.php');


$query = $pdo->prepare
(
    'INSERT INTO categorie (libelle) 
    VALUES (?)
    '
);    
    
$query->bindParam(1, $_POST['libelle']);

$query->execute();

echo json_encode(["result"=>true, 'message'=>'Catégorie ajoutée']);