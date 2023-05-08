<?php
require_once "../Pages/dbconnexion.php";
require_once "../Class/ClassTarif.php";


$tarif = new Tarif($db);
$tarif->delete($_GET["id"]);

header("Location: listetarif.php");

// // Vérifie si le formulaire a été soumis
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Récupère les données du formulaire
//     $titre = $_POST["titre"];
//     $description = $_POST["description"];
//     $prix = $_POST["prix"];

//     $tarif = new Tarif($db);

//     $tarif->setTitre($titre);
//     $tarif->setDescription($description);
//     $tarif->setPrix($prix);

//     // Insère le tarif dans la base de données
//     $tarif->delete($id);

//     header("Location:listetarif.php");
//     exit();

// }


?>
<!-- <form action="" method="post">
    <label for="titre">Titre :</label>
    <br>
    <input type="text" id="titre" name="titre">
    <br>
    <label for="description">Description :</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <br>
    <label for="prix">Prix :</label>
    <br>
    <input type="text" id="prix" name="prix">
    <br>
    <br>
    <input type="submit" value="Supprimer">
</form> -->