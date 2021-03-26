<?php

namespace app\model;

use app\entity\Ingredient;
use PDO;
use Exception;
use app\entity\Recette;



class ModelRecipe extends Dao {


    public function getAllRecipeByType($type_recette): Array
     {

         $bddConnect = $this->pdoConnect();

         $requestRecipe = "SELECT * FROM recettes WHERE type_recette=:type ORDER BY `id_recette` DESC";
         $statement = $bddConnect->prepare($requestRecipe);
         $statement->bindParam('type', $type_recette);
         $statement->execute();
         
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Recette');
           return $statement->fetchAll();
     }


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


        $requestRecipe = "INSERT INTO recettes (`image_recette`,`titre_recette`,`conseil`,`temps_preparation`,`temps_cuisson`,`temps_total`,`date_publication`,`id_utilisateur`, `type_recette`, `resume`)
                    VALUES (:image, :titre, :conseil, :preparation, :cuisson, :tempsTotal, :date, :id_utilisateur, :type_recette, :resume_recette)";

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

        $id_recette = $bddConnect->lastInsertId();



        $requestIngredient = "INSERT INTO ingredients (`ingredients`)
        VALUES (:ingredient)";

        foreach ($ingredients as $ingredient) {

            $statement = $bddConnect->prepare($requestIngredient);
            $statement->bindParam('ingredient', $ingredient);
            $statement->execute();
            $id_ingredients[] = $bddConnect->lastInsertId();
        }

        $requestComposer = "INSERT INTO Composer (`id_recette`, `id_ingredients`)
        VALUES (:id_recette, :id_ingredients)";

        foreach ($id_ingredients as $id_ingredient) {
            $statement = $bddConnect->prepare($requestComposer);
            $statement->bindParam('id_recette', $id_recette);
            $statement->bindParam('id_ingredients', $id_ingredient);
            $statement->execute();
        }

        $requestUstensile = "INSERT INTO Ustensiles (`ustensile`)
        VALUES (:ustensile)";

        foreach ($ustensiles as $ustensile) {
            
            $statement = $bddConnect->prepare($requestUstensile);
            $statement->bindParam('ustensile', $ustensile);
            $statement->execute();
            $id_ustensile[] = $bddConnect->lastInsertId();
    
        }

        $requestAvoir = "INSERT INTO Avoir (`id_recette`, `id_ustensile`)
        VALUES (:id_recette, :id_ustensile)";

        foreach ($id_ustensile as $id_ustensile) { 

            $statement = $bddConnect->prepare($requestAvoir);
            $statement->bindParam('id_recette', $id_recette);
            $statement->bindParam('id_ustensile', $id_ustensile);
            $statement->execute();

        }


    }

    public function deleteRecipe($id) {

        $bddConnect = $this->pdoConnect();

        $requestDelete = "DELETE FROM recettes WHERE id_recette=:id";
        $statement = $bddConnect->prepare($requestDelete);
        $statement->bindParam('id', $id);
        $statement->execute();
    }

    public function getIngredients($id):array {

        $bddConnect = $this->pdoConnect();
        $requestIngredient = "SELECT * FROM ingredients NATURAL JOIN Composer WHERE id_recette=:id";
        $statement = $bddConnect->prepare($requestIngredient);
        $statement->bindParam('id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Ingredient');
        return $statement->fetchAll();
    }

    public function getRecipe($id):Recette {

        $bddConnect = $this->pdoConnect();
        $requestRecipe = "SELECT * FROM recettes WHERE id_recette=:id";
        $statement = $bddConnect->prepare($requestRecipe);
        $statement->bindParam('id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Recette');
        
        return $statement->fetch(); 
    }


    public function getUstensiles($id):array {

        $bddConnect = $this->pdoConnect();
        $requestUstensiles = "SELECT * FROM Ustensiles NATURAL JOIN Avoir WHERE id_recette=:id";
        $statement = $bddConnect->prepare($requestUstensiles);
        $statement->bindParam('id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Ustensile');
        return $statement->fetchAll();
    }


    public function getLastRecipe():array {

        $bddConnect = $this->pdoConnect();
        $requestLastRecipe = "SELECT * FROM recettes ORDER BY id_recette DESC LIMIT 6";
        $statement = $bddConnect->query($requestLastRecipe);
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Recette');
        return $statement->fetchAll();
        
    }


}