<?php
namespace app\model;


use PDO;
use Exception;
use PDOException;


/**
 * Class Model permettant la connexion a la base de donnée
 */


 class Model {

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

 class ModelLogin extends Model
 {
     public function getUser(string $email)
     {
         $bddConnect = $this->pdoConnect();

         $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
         $statement = $bddConnect->prepare($requestLogin);
         $statement->bindParam('email', $email);
         $statement->execute();

         $test = $statement->fetch(PDO::FETCH_ASSOC);
         var_dump($test);
     }
 }

 $test = new ModelLogin();
 $test->getUser('admin@eatndream.fr');

 var_dump($test);



//  $test = new Model();
//  $test->pdoConnect();


 
// class Recette {

//     private $id_recette;
//     private $titre_recette;
//     private $conseil;
//     private $temps_preparation;
//     private $temps_cuisson;
//     private $temps_total;
//     private $date_publication;
//     private $id_utilisateur;
//     private $image_recette;
//     private $type_recette;
//     private $resume;


//     function __construct ($titre_recette, $image_recette, $conseil, $temps_preparation, $temps_cuisson, $temps_total, $type_recette, $resume) {

//         $this->id_recette = 0;
//         $this->image_recette = $image_recette;
//         $this->titre_recette = $titre_recette;
//         $this->conseil = $conseil;
//         $this->temps_preparation = $temps_preparation;
//         $this->temps_cuisson = $temps_cuisson;
//         $this->temps_total = $temps_total;
//         $this->type_recette = $type_recette;
//         $this->resume = $resume;
//         $this->date_publication = date('d-m-Y');

//     }

//     /**
//      * Get the value of id_recette
//      */ 
//     public function getId_recette()
//     {
//         return $this->id_recette;
//     }

//     /**
//      * Set the value of id_recette
//      *
//      * @return  self
//      */ 
//     public function setId_recette($id_recette)
//     {
//         $this->id_recette = $id_recette;

//         return $this;
//     }

//     /**
//      * Get the value of titre_recette
//      */ 
//     public function getTitre_recette()
//     {
//         return $this->titre_recette;
//     }

//     /**
//      * Set the value of titre_recette
//      *
//      * @return  self
//      */ 
//     public function setTitre_recette($titre_recette)
//     {
//         $this->titre_recette = $titre_recette;

//         return $this;
//     }

//     /**
//      * Get the value of conseil
//      */ 
//     public function getConseil()
//     {
//         return $this->conseil;
//     }

//     /**
//      * Set the value of conseil
//      *
//      * @return  self
//      */ 
//     public function setConseil($conseil)
//     {
//         $this->conseil = $conseil;

//         return $this;
//     }

//     /**
//      * Get the value of temps_preparation
//      */ 
//     public function getTemps_preparation()
//     {
//         return $this->temps_preparation;
//     }

//     /**
//      * Set the value of temps_preparation
//      *
//      * @return  self
//      */ 
//     public function setTemps_preparation($temps_preparation)
//     {
//         $this->temps_preparation = $temps_preparation;

//         return $this;
//     }

//     /**
//      * Get the value of temps_cuisson
//      */ 
//     public function getTemps_cuisson()
//     {
//         return $this->temps_cuisson;
//     }

//     /**
//      * Set the value of temps_cuisson
//      *
//      * @return  self
//      */ 
//     public function setTemps_cuisson($temps_cuisson)
//     {
//         $this->temps_cuisson = $temps_cuisson;

//         return $this;
//     }

//     /**
//      * Get the value of temps_total
//      */ 
//     public function getTemps_total()
//     {
//         return $this->temps_total;
//     }

//     /**
//      * Set the value of temps_total
//      *
//      * @return  self
//      */ 
//     public function setTemps_total($temps_total)
//     {
//         $this->temps_total = $temps_total;

//         return $this;
//     }

//     /**
//      * Get the value of date_publication
//      */ 
//     public function getDate_publication()
//     {
//         return $this->date_publication;
//     }

//     /**
//      * Set the value of date_publication
//      *
//      * @return  self
//      */ 
//     public function setDate_publication($date_publication)
//     {
//         $this->date_publication = $date_publication;

//         return $this;
//     }


//     /**
//      * Get the value of id_utilisateur
//      */ 
//     public function getId_utilisateur()
//     {
//         return $this->id_utilisateur;
//     }

//     /**
//      * Set the value of id_utilisateur
//      *
//      * @return  self
//      */ 
//     public function setId_utilisateur($id_utilisateur)
//     {
//         $this->id_utilisateur = $id_utilisateur;

//         return $this;
//     }

//     /**
//      * Get the value of image_recette
//      */ 
//     public function getImage_recette()
//     {
//         return $this->image_recette;
//     }

//     /**
//      * Set the value of image_recette
//      *
//      * @return  self
//      */ 
//     public function setImage_recette($image_recette)
//     {
//         $this->image_recette = $image_recette;

//         return $this;
//     }

//     /**
//      * Get the value of type_recette
//      */ 
//     public function getType_recette()
//     {
//         return $this->type_recette;
//     }

//     /**
//      * Set the value of type_recette
//      *
//      * @return  self
//      */ 
//     public function setType_recette($type_recette)
//     {
//         $this->type_recette = $type_recette;

//         return $this;
//     }

//     /**
//      * Get the value of resume
//      */ 
//     public function getResume()
//     {
//         return $this->resume;
//     }

//     /**
//      * Set the value of resume
//      *
//      * @return  self
//      */ 
//     public function setResume($resume)
//     {
//         $this->resume = $resume;

//         return $this;
//     }
// }


//  class ModelRecipe extends Model
//  {
//      public function getSaltPostRecipe() :Recette
//      {
//          $salee = "salée";

//          $bddConnect = $this->pdoConnect();

//          $requestRecipe = "SELECT * FROM recettes WHERE id_recette=32";
//          $statement = $bddConnect->query($requestRecipe);

//             $statement->fetchObject('Recette');
//             return $statement->fetch();
//      }
//  }

//  $test = new ModelRecipe();
//  $objet = $test->getSaltPostRecipe();

//  var_dump($objet);










//  class ModelLogin extends Model {


//     public function getUser(string $email) {
    

//         try {
//             $bddConnect = $this->pdoConnect();
    
//             $requestLogin = "SELECT * FROM Utilisateur WHERE email_utilisateur=:email";
//             $statement = $bddConnect->prepare($requestLogin);
        
//             $statement->bindParam('email', $email);
//             $statement->execute();
    
//             if ($statement->rowCount() == 1) {
//                 $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'app\entity\User.php');
//                 return $statement->fetch();       
//             }
//         } catch (Exception $e) {

//             throw new Exception("Error Processing Request BRO", 1);
            
//         }
//     }

//     public function newUser(string $email, string $password, string $pseudo, string $nom, string $prenom) {
//         try {
//             $bddConnect = $this->pdoConnect();

//             $requestNew = "INSERT INTO Utilisateur (`email_utilisateur`,`password_utilisateur`,`pseudo_utilisateur`,`nom_utilisateur`,`prenom_utilisateur`,`role_utilisateur`)
//             VALUES (:email, :password, :pseudo, :nom, :prenom, :role)";

//             $password = password_hash($password, PASSWORD_BCRYPT);
//             $role = 'ROLE_USER';
            
//             $statement = $bddConnect->prepare($requestNew);
//             $statement->bindParam('email', $email);
//             $statement->bindParam('password', $password);
//             $statement->bindParam('pseudo', $pseudo);
//             $statement->bindParam('nom', $nom);
//             $statement->bindParam('prenom', $prenom);
//             $statement->bindParam('role', $role);
//             $statement->execute();

            
//         } catch (Exception $e) {
//             throw new Exception("Error Request", 1);
//         }
// }
//     }

//     class User {

//         private $id_utilisateur;
//         private $email_utilisateur;
//         private $password_utilisateur;
//         private $pseudo_utilisateur;
//         private $nom_utilisateur;
//         private $prenom_utilisateur;
//         private $role_utilisateur;
    
       
//         function __construct($email_utilisateur = '', $password_utilisateur = '', $pseudo_utilisateur = '', $nom_utilisateur = '', $prenom_utilisateur = '')
//         {   
//             $this->id_utilisateur = 0;
//             $this->email_utilisateur = $email_utilisateur;
//             $this->password_utilisateur = $password_utilisateur;
//             $this->pseudo_utilisateur = $pseudo_utilisateur;
//             $this->nom_utilisateur = $nom_utilisateur;
//             $this->prenom_utilisateur = $prenom_utilisateur;
//             $this->role_utilisateur = 'ROLE_USER';
//         }
    
    
//         /**
//          * Get the value of id_utilisateur
//          */ 
//         public function getId_utilisateur()
//         {
//             return $this->id_utilisateur;
//         }
    
//         /**
//          * Set the value of id_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setId_utilisateur($id_utilisateur)
//         {
//             $this->id_utilisateur = $id_utilisateur;
    
//             return $this;
//         }
    
//         /**
//          * Get the value of email_utilisateur
//          */ 
//         public function getEmail_utilisateur()
//         {
//             return $this->email_utilisateur;
//         }
    
//         /**
//          * Set the value of email_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setEmail_utilisateur($email_utilisateur)
//         {
//             $this->email_utilisateur = $email_utilisateur;
    
//             return $this;
//         }
    
//         /**
//          * Get the value of password_utilisateur
//          */ 
//         public function getPassword_utilisateur()
//         {
//             return $this->password_utilisateur;
//         }
    
//         /**
//          * Set the value of password_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setPassword_utilisateur($password_utilisateur)
//         {
//             $this->password_utilisateur = $password_utilisateur;
    
//             return $this;
//         }
    
//         /**
//          * Get the value of pseudo_utilisateur
//          */ 
//         public function getPseudo_utilisateur()
//         {
//             return $this->pseudo_utilisateur;
//         }
    
//         /**
//          * Set the value of pseudo_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setPseudo_utilisateur($pseudo_utilisateur)
//         {
//             $this->pseudo_utilisateur = $pseudo_utilisateur;
    
//             return $this;
//         }
    
//         /**
//          * Get the value of nom_utilisateur
//          */ 
//         public function getNom_utilisateur()
//         {
//             return $this->nom_utilisateur;
//         }
    
//         /**
//          * Set the value of nom_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setNom_utilisateur($nom_utilisateur)
//         {
//             $this->nom_utilisateur = $nom_utilisateur;
    
//             return $this;
//         }
    
//         /**
//          * Get the value of prenom_utilisateur
//          */ 
//         public function getPrenom_utilisateur()
//         {
//             return $this->prenom_utilisateur;
//         }
    
//         /**
//          * Set the value of prenom_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setPrenom_utilisateur($prenom_utilisateur)
//         {
//             $this->prenom_utilisateur = $prenom_utilisateur;
    
//             return $this;
//         }
    
//         /**
//          * Get the value of role_utilisateur
//          */ 
//         public function getRole_utilisateur()
//         {
//             return $this->role_utilisateur;
//         }
    
//         /**
//          * Set the value of role_utilisateur
//          *
//          * @return  self
//          */ 
//         public function setRole_utilisateur($role_utilisateur)
//         {
//             $this->role_utilisateur = $role_utilisateur;
    
//             return $this;
//         }
//     }
    

    




//     $test = new ModelLogin();
//     $test = $test->getUser('admin@afpa.fr');

// var_dump($test);
   


    // // if (password_verify($password, $test['password_utilisateur'])) {
    // //     echo 'Mot de passe valide !';
    // // }   else {
    // //     echo 'Mot de passe non valide :/ ! ';
    // // }
    