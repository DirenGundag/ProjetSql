<?php
require_once "../Pages/dbconnexion.php";
require_once "../Class/ClassTarif.php";
require_once "../CSS/ajouttarif.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id = $_POST["id"];
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];

    // Mettre à jour l'objet Tarifs correspondant
    $tarif = new Tarif($db);
    $tarif->update($id, $titre, $description, $prix);

    // Rediriger vers la liste des tarifs
    header("Location: listetarif.php");
    exit();
}
$tarif = new Tarif($db);
$tarif->select($_GET["id"]);



?>
<h1>Modifier la prestation</h1>
<form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $tarif->getId(); ?>">
        <div>
            <label>Titre :</label>
            <br>
            <input type="text" name="titre" value="<?php echo $tarif->getTitre(); ?>" required>
            <br>
            <label>Description :</label>
            <br>
            <textarea name="description" rows="5" cols="33" required><?php echo $tarif->getDescription(); ?></textarea>
            <br>
            <label>Prix :</label>
            <br>
            <input type="text" name="prix" value="<?php echo $tarif->getPrix(); ?>" required>
            <br>
            <input type="submit" name="submit" value="Modifier">
        </div>
    </form>