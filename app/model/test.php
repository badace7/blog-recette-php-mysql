<?php
namespace app\model;

use PDO;
use Exception;
use PDOException;
use app\entity\User;

/**
 * Class Dao permettant la connexion a la base de donnée
 */


 class Dao {

    static private ?PDO $connectBdd = null;

    private const DATA_SERVER_NAME = 'mysql:host=localhost;port=3306;dbname=blog_recette;charset=utf8';
    private const  USERNAME = 'root';
    private const PASSWORD = 'rootdwwm';

    public function __construct() {

        if (is_null(self::$connectBdd)) {

            try {

                $pdo = new PDO(self::DATA_SERVER_NAME, self::USERNAME, self::PASSWORD);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo 'Connexion Réussie';

                self::$connectBdd = $pdo;

            } catch (PDOException $e) {

                echo "Erreur : ".$e->getMessage();

            }
        }
    }

    public function pdoConnect() {
        return self::$connectBdd;
    }
 }


 $test = new Dao();
 $test->pdoConnect();


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
                return $statement->fetch();       
            }
        } catch (Exception $e) {

            throw new Exception("Error Processing Request BRO", 1);
            
        }
    }

    public function newUser(string $email, string $password, string $pseudo, string $nom, string $prenom) {
        try {
            $bddConnect = $this->pdoConnect();

            $requestNew = "INSERT INTO Utilisateur (`email_utilisateur`,`password_utilisateur`,`pseudo_utilisateur`,`nom_utilisateur`,`prenom_utilisateur`,`role_utilisateur`)
            VALUES (:email, :password, :pseudo, :nom, :prenom, :role)";

            $password = password_hash($password, PASSWORD_BCRYPT);
            $role = 'ROLE_USER';
            
            $statement = $bddConnect->prepare($requestNew);
            $statement->bindParam('email', $email);
            $statement->bindParam('password', $password);
            $statement->bindParam('pseudo', $pseudo);
            $statement->bindParam('nom', $nom);
            $statement->bindParam('prenom', $prenom);
            $statement->bindParam('role', $role);
            $statement->execute();

            
        } catch (Exception $e) {
            throw new Exception("Error Request", 1);
        }
}
    }
    
    $test = new ModelLogin();
    $test->newUser('tata@tata.fr', 'test', 'Hubert', 'Nom', 'Prenom');



    // $test = new ModelLogin();
    // $test = $test->getUser('admin@afpa.fr');

    // $_SESSION['user'] = $test;

    // extract($_SESSION['user']);




    // var_dump($role_utilisateur);


    // // if (password_verify($password, $test['password_utilisateur'])) {
    // //     echo 'Mot de passe valide !';
    // // }   else {
    // //     echo 'Mot de passe non valide :/ ! ';
    // // }
    