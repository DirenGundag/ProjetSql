<?php
require_once "../Pages/dbconnexion.php";
require_once "../Class/ClassTarif.php";
require_once "../CSS/listetarifcss.php";



  $tarif = new Tarif($db);

  // Selectionne le tarif dans la base de données

  $tarif->selectall();
  $results = $tarif->getTarifs();
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1>Liste des prestations</h1>
<table id="table-produits">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Description</th>
          <th>Prix</th>
        </tr>
      </thead>
      <tbody>
      <?php
      foreach($results as $tarif){
      ?>
      <tr>
        <td><?php echo $tarif->getTitre()?></td>
        <td><?php echo $tarif->getDescription()?></td>
        <td><?php echo $tarif->getPrix()?></td>
        <td>
 <a href="modiftarif.php?id=<?php echo $tarif->getId(); ?>" >Modifier</a>
 <a href="suptarif.php?id=<?php echo $tarif->getId(); ?>" >Supprimer</a>
</td>
      </tr>
      <?php
      }
      ?>
      </tbody>
    </table>
    <a class="boutonajout" href="tarif.php?id=<?php echo $tarif->getId(); ?>" >Ajouter une nouvelle prestation</a>
</body>
</html>