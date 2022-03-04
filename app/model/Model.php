<?php
namespace app\model;
use PDO;
use Exception;
use PDOException;

/**
 * Class Model permettant la connexion a la base de donnée dont va hérité les Modèles
 */

 class Model {

    static private ?PDO $connectBdd = null;

    private $ds = '';
    private $userName = '';
    private $password = '';


    // Permet la connexion à la base de donnée
    public function pdoConnect() {
        
        if (is_null(self::$connectBdd)) {

            try {

                // Instanciation de la classe PDO
                $pdo = new PDO($this->ds, $this->userName, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$connectBdd = $pdo;

            } catch (PDOException $e) {
                header("Location: index.php?action=error");
                exit();
            
            }
        }

        return self::$connectBdd;
    }
 }





