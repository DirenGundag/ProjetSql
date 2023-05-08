<?php
require_once "../Pages/dbconnexion.php";

?>


<style>


/* Style pour la table */
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
  margin-top: 20px;
  margin-top: 2%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: #333;
  color: white;
  margin-top: 100px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Style pour les liens */
a {
  display: inline-block;
  margin: 5px;
  padding: 8px 15px;
  text-decoration: none;
  background-color: #333;
  color: white;
  border-radius: 5px;
}

a:hover {
  background-color: #555;
}

h1 {
    text-align: center;
    margin-top: 2%;
}

.boutonajout{
    margin-top: 4%;
    margin-left: 18.2%;
}
</style>