<?php
namespace app\model;
use PDO;
use PDOException;

class ModelLogin extends Dao {


public function getUser(string $email) {
        try {
            $bddConnect = $this->pdoConnect();

            $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
            $statement = $bddConnect->prepare($requestLogin);
    
            $statement->bindParam('email', $email);
            $statement->execute();


            $test = $statement->fetch(PDO::FETCH_ASSOC);

            var_dump($test);
        } catch (PDOException $e) {
                echo "Erreur : ".$e->getMessage();
        }
}
}

$test = new ModelLogin();
$test->getUser('admin@afpa.fr');

// Voir avec M Bonneau...