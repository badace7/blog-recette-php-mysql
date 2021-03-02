<?php
namespace app\model;
use PDO;
use PDOException;

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
    
    
            $test = $statement->fetch(PDO::FETCH_ASSOC);
            
            echo 'Requête réussie';
            var_dump($test);
        } catch (PDOException $e) {

            echo "Erreur : ".$e->getMessage();
        }
    }
    }
    
    $test = new ModelLogin();
    $test->getUser('admin@afpa.fr');
    