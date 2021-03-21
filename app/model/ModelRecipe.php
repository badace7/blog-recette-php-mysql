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
        $ingredient = $ingredient->getIngredients();
        $ustensile = $ustensile->getUstensile();


        // // var_dump($titre_recette,$conseil_recette, $preparation_recette,$cuisson_recette, $tempsTotal_recette, $image_recette, $date_recette, $ingredient, $ustensile, $id_utilisateur);

        // $bddConnectRecette = $this->pdoConnect();
        // $bddConnectIngredient = $this->pdoConnect();
        // $bddConnectUstensile = $this->pdoConnect();


        // $requestRecipe = "INSERT INTO recettes (`image_recette`,`titre_recette`,`conseil`,`temps_preparation`,`temps_cuisson`,`temps_total`,`date_publication`,`id_utilisateur`)
        //             VALUES (:titre, :conseil, :preparation, :cuisson, :tempsTotal, :image, :date, :id_utilisateur)";

        // $requestIngredient = "INSERT INTO ingredients (`ingredients`)
        // VALUES (:ingredient)";

        // $requestUstensile = "INSERT INTO Ustensiles (`ustensile`)
        // VALUES (:ustensile)";

        // $statement = $bddConnectRecette->prepare($requestRecipe);
        // $statement->bindParam('titre', $titre_recette);
        // $statement->bindParam('conseil', $conseil_recette);
        // $statement->bindParam('preparation', $preparation_recette);
        // $statement->bindParam('cuisson', $cuisson_recette);
        // $statement->bindParam('tempsTotal', $tempsTotal_recette);
        // $statement->bindParam('image', $image_recette);
        // $statement->bindParam('date', $date_recette);
        // $statement->bindParam('id_utilisateur', $id_utilisateur);
        // $statement->execute();

        // $statement = $bddConnectIngredient->prepare($requestIngredient);
        // $statement->bindParam('ingredient', $ingredient);
        // $statement->execute();

        // $statement = $bddConnectUstensile->prepare($requestUstensile);
        // $statement->bindParam('ustensile', $ustensile);
        // $statement->execute();


        // $idRecette = $bddConnectRecette->lastInsertId();
        // $recette->setId_recette($idRecette);

        // $idIngredient = $bddConnectIngredient->lastInsertId();
        // $ingredient->setId_ingredients($idIngredient);


        // $idUstensile = $bddConnectUstensile->lastInsertId();
        // $ustensile->setId_ustensile($idUstensile);

    }



}