<?php
require_once "../Pages/dbconnexion.php";
// require_once "../Pages/tarif.php";

class Tarif {
    private int $id;
	private string $titre;
	private string $description;
	private string $prix;

	// public function __construct(int $id, string $titre, string $email, string $password){
	// 	$this->id=$id;
	// 	$this->titre=$titre;
	// 	$this->email=$email;
    //     $this->password=$password;
	// }

    private $db;
    private $matable;
    private $tarifs = [];
    private $erreurs = [];

    public function __construct($db, $matable="tarif")
    {
        $this->db=$db;
        $this->matable=$matable;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre(string $titre)
    {
        $this->titre = $titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix(string $prix)
    {
        $this->prix = $prix;
    }

    public function getTarifs()
    {
        return $this->tarifs;
    }

    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function insert(){
        $sql="INSERT INTO tarif (titre,description,prix) VALUES (:titre,:description,:prix)";
        try {
            $sqlstatement = $this->db->prepare($sql);
            $sqlstatement->execute([
                ':titre'=>$this->titre,
                ':description'=>$this->description,
                ':prix'=>$this->prix,
            ]);
        
        } catch (PDOException $e) {
            file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
            echo "Une erreur est survenue lors de l'insertion";
        }
    }

    // public function select(){
    //     $sql="SELECT * FROM tarif";
    //     try {
    //         $sqlstatement = $this->db->prepare($sql);
    //         $sqlstatement->execute();
        
    //     } catch (PDOException $e) {
    //         file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    //         echo 'Une erreur est survenue lors de la sélection';
    //     }
    // }


    // public function select()
    // {
    //             $sqlQuery = "SELECT * FROM  tarif";
    //             try {
    //                 $sqlStatement = $this->db->prepare($sqlQuery);

    //                 $sqlStatement->execute();

    //                 $result = $sqlStatement->fetch();

    //                 if ($result) {
    //                     $this->id = $result["id"];
    //                     $this->titre = $result["titre"];
    //                     $this->description = $result["description"];
    //                     $this->prix = $result["prix"];
    //                 }else {
    //                     $this->id = 0;}
    //             } catch (PDOException $e) {
    //                 file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
    //                 echo 'Une erreur est survenue lors de la selection ';

    //             }

    // }

    // public function selectall()
    // {
    //     $sqlQuery = "SELECT * FROM  tarif ";
    //     try {
    //         $sqlStatement = $this->db->prepare($sqlQuery);
    //         $sqlStatement->execute();
    //         $results = $sqlStatement->fetchAll(PDO::FETCH_ASSOC);
    //         $tarifs = array();
    //         foreach ($results as $result) {
    //             $tarif = new Tarif($this->db);
    //             $tarif->setId($result["id"]);
    //             $tarif->setTitre($result["titre"]);
    //             $tarif->setDescription($result["description"]);
    //             $tarif->setPrix($result["prix"]);
    //             $tarifs[] = $tarif;
    //         }
    //         return $tarifs;
    //     } catch (PDOException $e) {
    //         file_put_contents('dblogs.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
    //         echo 'Une erreur est survenue lors de la selection ';
    //     }
    // }



//   


public function selectall()
{
    $sqlQuery = "SELECT * FROM tarif";
    try {
        $sqlStatement = $this->db->prepare($sqlQuery);
        $sqlStatement->execute();
        $results = $sqlStatement->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0) {
            foreach ($results as $result) {
                $tarif = new Tarif($this->db);
                $tarif->setId($result["id"]);
                $tarif->setTitre($result["titre"]);
                $tarif->setDescription($result["description"]);
                $tarif->setPrix($result["prix"]);
                $this->tarifs[] = $tarif;
            }
        } else {
            $this->erreurs[] = "Aucun résultat trouvé";
        }
    } catch (PDOException $e) {
        file_put_contents('dblogs.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
        $this->erreurs[] = 'Une erreur est survenue lors de la sélection';
    }
}


public function select($id)
    {
        $sqlQuery = "SELECT * FROM tarif WHERE id = :id";
        try {
            $sqlStatement = $this->db->prepare($sqlQuery);
            $sqlStatement->bindParam(":id", $id);
            $sqlStatement->execute();
    
            $result = $sqlStatement->fetch();
    
            if ($result) {
                $this->id = $result["id"];
                $this->titre = $result["titre"];
                $this->description = $result["description"];
                $this->prix = $result["prix"];
            } else {
                $this->id = 0;
            }
        } catch (PDOException $e) {
            file_put_contents('dblogs.log', $e->getMessage().PHP_EOL, FILE_APPEND);
            echo 'Une erreur est survenue lors de la selection';
        }
    }


    public function update($id, $titre, $description, $prix)
    {
        $sql = "UPDATE tarif SET titre = :titre, description = :description, prix = :prix WHERE id = :id";
        try {
            $sqlstatement = $this->db->prepare($sql);
            $sqlstatement->execute([
                ':id' => $id,
                ':titre' => $titre,
                ':description' => $description,
                ':prix' => $prix,
            ]);
        } catch (PDOException $e) {
            file_put_contents('dblogs.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo "Une erreur est survenue lors de la modification";
        }
    }



    public function delete($id)
    {
        $sql = "DELETE FROM tarif WHERE id = :id";
        try {
            $sqlstatement = $this->db->prepare($sql);
            $sqlstatement->execute([
                ':id' => $id,
            ]);
        } catch (PDOException $e) {
            file_put_contents('dblogs.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
            echo "Une erreur est survenue lors de la suppression";
        }
    }

}

