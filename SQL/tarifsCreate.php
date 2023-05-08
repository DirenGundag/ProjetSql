<?php
require_once "../Pages/dbconnexion.php";
require_once "../Class/ClassTarif.php";


$statement= "CREATE TABLE tarif (
    id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre varchar(50) NOT NULL,
    description varchar(250) NOT NULL,
    prix varchar(50) NOT NULL
)";

try {
    $sqlstatement = $db->prepare($statement);
    if ($sqlstatement->execute()){
        echo "table créée avec succès";
    }

} catch (PDOException $e) {
    file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    echo 'Une erreur est survenue lors de la création de la table <br>';
}
