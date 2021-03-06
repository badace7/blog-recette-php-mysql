<?php
namespace app\model;

use app\entity\User;
use PDO;
use Exception;


class ModelLogin extends Dao {


public function getUser(string $email) {
        try {
            $bddConnect = $this->pdoConnect();

            $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
            $statement = $bddConnect->prepare($requestLogin);
    
            $statement->bindParam('email', $email);
            $statement->execute();

        if ($statement->rowCount() == 1) {
                $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'app\entity\User.php');
                echo '<br>'.'REQUEST SUCCESS';
                return $statement->fetch();
            
        }
        } catch (Exception $e) {
                throw new Exception("Error Processing Request", 1);
                
        }
}
}


