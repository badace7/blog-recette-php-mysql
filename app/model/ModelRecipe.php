<?php

namespace app\model;



class ModelRecipe extends Dao {


    public function newRecipe($recette, $ingredient, $ustensile, $user) {


        $titre_recette = $recette->getTitre_recette();
        $conseil_recette = $recette->getConseil();
        $preparation_recette = $recette->getTemps_preparation();
        $cuisson_recette = $recette->getTemps_cuisson();
        $tempsTotal_recette = $recette->getTemps_total();
        $image_recette = $recette->getImage_recette();
        $date_recette = $recette->getDate_publication();
        $id_utilisateur = $user->getId_utilisateur();
        $ingredients = $ingredient->getIngredients();
        $ustensiles = $ustensile->getUstensile();
        


        $bddConnect = $this->pdoConnect();


        $requestRecipe = "INSERT INTO recettes (`image_recette`,`titre_recette`,`conseil`,`temps_preparation`,`temps_cuisson`,`temps_total`,`date_publication`,`id_utilisateur`)
                    VALUES (:image, :titre, :conseil, :preparation, :cuisson, :tempsTotal, :date, :id_utilisateur)";

        $statement = $bddConnect->prepare($requestRecipe);
        $statement->bindParam('titre', $titre_recette);
        $statement->bindParam('conseil', $conseil_recette);
        $statement->bindParam('preparation', $preparation_recette);
        $statement->bindParam('cuisson', $cuisson_recette);
        $statement->bindParam('tempsTotal', $tempsTotal_recette);
        $statement->bindParam('image', $image_recette);
        $statement->bindParam('date', $date_recette);
        $statement->bindParam('id_utilisateur', $id_utilisateur);
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



}