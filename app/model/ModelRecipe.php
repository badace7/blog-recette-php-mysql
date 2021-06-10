<?php

namespace app\model;

use app\entity\Ingredient;
use PDO;
use Exception;
use app\entity\Recette;



class ModelRecipe extends Model {

    // Récupère toute les recettes par type
    public function getAllRecipeByType($type_recette): Array
     {
        // Retourne la connexion à la base de donnée
         $bddConnect = $this->pdoConnect();

         // Requête permettant de récupérer toutes les recettes par type dans un ordre décroissant
         $requestRecipe = "SELECT * FROM recettes WHERE type_recette=:type ORDER BY `id_recette` DESC";

         // Prépare la requête et l'éxecute
         $statement = $bddConnect->prepare($requestRecipe);
         $statement->bindParam('type', $type_recette);
         $statement->execute();
         
         // Permet de définir les données retourné sous forme d'objet
         $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Recette');
            return $statement->fetchAll();
     }

    // Permet d'ajouter une recette dans la base de donnée
    public function newRecipe($recette, $ingredient, $ustensile, $user) {


        $titre_recette = $recette->getTitre_recette();
        $conseil_recette = $recette->getConseil();
        $preparation_recette = $recette->getTemps_preparation();
        $cuisson_recette = $recette->getTemps_cuisson();
        $tempsTotal_recette = $recette->getTemps_total();
        $image_recette = $recette->getImage_recette();
        $date_recette = $recette->getDate_publication();
        $type_recette = $recette->getType_recette();
        $resume_recette = $recette->getResume();

        $id_utilisateur = $user->getId_utilisateur();
        $ingredients = $ingredient->getIngredients();
        $ustensiles = $ustensile->getUstensile();
        


        $bddConnect = $this->pdoConnect();

        // Requête d'insertion de donnée de la recette
        $requestRecipe = "INSERT INTO recettes (`image_recette`,`titre_recette`,`conseil`,`temps_preparation`,`temps_cuisson`,`temps_total`,`date_publication`,`id_utilisateur`, `type_recette`, `resume`)
                    VALUES (:image, :titre, :conseil, :preparation, :cuisson, :tempsTotal, :date, :id_utilisateur, :type_recette, :resume_recette)";

        // Préparation de requête et execution
        $statement = $bddConnect->prepare($requestRecipe);
        $statement->bindParam('titre', $titre_recette);
        $statement->bindParam('conseil', $conseil_recette);
        $statement->bindParam('preparation', $preparation_recette);
        $statement->bindParam('cuisson', $cuisson_recette);
        $statement->bindParam('tempsTotal', $tempsTotal_recette);
        $statement->bindParam('image', $image_recette);
        $statement->bindParam('date', $date_recette);
        $statement->bindParam('id_utilisateur', $id_utilisateur);
        $statement->bindParam('type_recette', $type_recette);
        $statement->bindParam('resume_recette', $resume_recette);
        $statement->execute();

        // Attribue le prochain id à la recette
        $id_recette = $bddConnect->lastInsertId();




        // Requête d'insertion d'ingrédients
        $requestIngredient = "INSERT INTO ingredients (`ingredients`)
        VALUES (:ingredient)";

        // Parcours le tableau $ingredients et insert les données l'une après l'autre
        foreach ($ingredients as $ingredient) {

            $statement = $bddConnect->prepare($requestIngredient);
            $statement->bindParam('ingredient', $ingredient);
            $statement->execute();
            $id_ingredients[] = $bddConnect->lastInsertId();
        }



        // Requête d'insertion des id recette et id ingredient dans la table relationnelle Composer 
        $requestComposer = "INSERT INTO Composer (`id_recette`, `id_ingredients`)
        VALUES (:id_recette, :id_ingredients)";

        foreach ($id_ingredients as $id_ingredient) {
            $statement = $bddConnect->prepare($requestComposer);
            $statement->bindParam('id_recette', $id_recette);
            $statement->bindParam('id_ingredients', $id_ingredient);
            $statement->execute();
        }



        // Requête d'insertion d'ustensile
        $requestUstensile = "INSERT INTO Ustensiles (`ustensile`)
        VALUES (:ustensile)";

        // Parcours le tableau $ustensile et insert les données l'une après l'autre
        foreach ($ustensiles as $ustensile) {
            
            $statement = $bddConnect->prepare($requestUstensile);
            $statement->bindParam('ustensile', $ustensile);
            $statement->execute();
            $id_ustensile[] = $bddConnect->lastInsertId();
    
        }



        // Requête d'insertion des id recette et id ustensile dans la table relationnelle Avoir
        $requestAvoir = "INSERT INTO Avoir (`id_recette`, `id_ustensile`)
        VALUES (:id_recette, :id_ustensile)";

        // Parcours le tableau $id_ustensile et insert les données l'une après l'autre dans la table relationnelle
        foreach ($id_ustensile as $id_ustensile) { 

            $statement = $bddConnect->prepare($requestAvoir);
            $statement->bindParam('id_recette', $id_recette);
            $statement->bindParam('id_ustensile', $id_ustensile);
            $statement->execute();

        }


    }


    // Permet de supprimer une recette de la base de donnée
    public function deleteRecipe($id):void {

        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête de suppression de recette en fonction de l'id
        $requestDelete = "DELETE FROM recettes WHERE id_recette=:id";

        // Prépare la requête et l'execute
        $statement = $bddConnect->prepare($requestDelete);
        $statement->bindParam('id', $id);
        $statement->execute();
    }

    // Permet d'obtenir un tableau avec des objets ingrédients
    public function getIngredients($id):array {


        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête permettant de récupérer les ingrédients d'une recette
        $requestIngredient = "SELECT * FROM ingredients NATURAL JOIN Composer WHERE id_recette=:id";

        // Prépare la requête et l'execute
        $statement = $bddConnect->prepare($requestIngredient);
        $statement->bindParam('id', $id);
        $statement->execute();

        // Permet de définir les données retourné sous forme d'objet
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Ingredient');
        return $statement->fetchAll();
    }

    // Permet de récupérer un objet recette
    public function getRecipe($id):Recette {

        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête permettant de récupérer une recette
        $requestRecipe = "SELECT * FROM recettes WHERE id_recette=:id";

        // Prépare la requête et l'execute
        $statement = $bddConnect->prepare($requestRecipe);
        $statement->bindParam('id', $id);
        $statement->execute();

        // Permet de définir les données retourné sous forme d'objet
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Recette');
        return $statement->fetch(); 
    }

    // Permet de récupérer un tableau contenant des objets ustensiles
    public function getUstensiles($id):array {

        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête permettant de récupérer des ustensiles
        $requestUstensiles = "SELECT * FROM Ustensiles NATURAL JOIN Avoir WHERE id_recette=:id";

        // Prépare la requête et l'execute
        $statement = $bddConnect->prepare($requestUstensiles);
        $statement->bindParam('id', $id);
        $statement->execute();

        // Permet de définir les données retourné sous forme d'objet
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Ustensile');
        return $statement->fetchAll();
    }

    // Permet de récupérer un tableau contenant des objets recettes
    public function getLastRecipe():array {

        // Connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête permettant de récupérer des recettes par id ordre décoissant et retourne les 6 dernières
        $requestLastRecipe = "SELECT * FROM recettes ORDER BY id_recette DESC LIMIT 6";

        // execute la requête
        $statement = $bddConnect->query($requestLastRecipe);

        // Permet de définir les données retourné sous forme d'objet
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Recette');

        return $statement->fetchAll();
    }


}