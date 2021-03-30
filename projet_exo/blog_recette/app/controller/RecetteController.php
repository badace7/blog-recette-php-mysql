<?php

namespace app\controller;

use app\entity\Avoir;
use app\entity\Recette;
use app\entity\Composer;
use app\entity\Ustensile;
use app\entity\Ingredient;
use app\model\ModelRecipe;
use app\model\ModelComment;

class RecetteController extends Controller {

    public function addRecette():void  {
        //Affiche le formulaire d'ajout de recette !!Accessible uniquement à l'administrateur
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $user = unserialize($_SESSION['user']);
            $role = $user->getRole_utilisateur();
            if ($role != 'ROLE_ADMIN') {
                header('Location: index.php');
            } else {
                $this->render('recettes/formulaireRecette');
            }

        } else {
            
            // Récupère les données du formulaire de recette 
            $titre = filter_input(INPUT_POST, 'titre-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $ingredients = filter_var_array($_POST['ingredient'], FILTER_SANITIZE_SPECIAL_CHARS);
            $ustensiles = filter_var_array($_POST['ustensile'], FILTER_SANITIZE_SPECIAL_CHARS);
            $conseil = filter_input(INPUT_POST, 'conseil-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $preparation = filter_input(INPUT_POST, 'preparation-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $cuisson = filter_input(INPUT_POST, 'cuisson-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $tempsTotal = filter_input(INPUT_POST, 'tempstotal-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $type_recette = filter_input(INPUT_POST, 'type-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $resume_recette = filter_input(INPUT_POST, 'resume-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            
            // Récupère l'image dans le formulaire et l'upload dans le dossier images
            $image = $_FILES['image-recette'];
            $imageName = $image['name'];
            $targetDir =  'app/images/'.$imageName;
            $fichierTmp = $image['tmp_name'];
            move_uploaded_file($fichierTmp, $targetDir);
        
            // Récupère les données utilisateur de la session actuelle
            $user = unserialize($_SESSION['user']);

            // Crée un objet recette, ingrédient, ustensiles
            $recette = new Recette($titre, $imageName, $conseil, $preparation, $cuisson, $tempsTotal, $type_recette, $resume_recette);
            $ingredients = new Ingredient($ingredients);
            $ustensiles = new Ustensile($ustensiles);
            
            
            $recette->setId_utilisateur($user->getId_utilisateur());
            $id_recette = $recette->getId_recette();
            $id_ingredients = $ingredients->getId_ingredients();
            $id_ustensiles = $ustensiles->getId_ustensile();
            
            // Crée une nouvelle recette à l'aide des donnée récupéré
            $model = new ModelRecipe();
            $model->newRecipe($recette, $ingredients, $ustensiles, $user);

            header('Location: index.php?action=ajout_recette');

        }
    }

    public function deleteRecette():void  {

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_SPECIAL_CHARS);
        $model = new ModelRecipe();
        $delete = $model->deleteRecipe($id);

        $type = substr($type, 9);

        header('Location: index.php?action=rubrique&type='.$type);

    }
    

    public function recettes($type_recette):void {
       

            $model = new ModelRecipe();
            $recettes = $model->getAllRecipeByType($type_recette);
            
            $this->render('rubriques/rubrique_'.$type_recette, ['recettes' => $recettes]);
    }


    public function afficheRecette($id_recette):void  {

        $id = intval($id_recette);
        $model = new ModelRecipe();
        $ustensiles = $model->getUstensiles($id);
        $ingredients = $model->getIngredients($id);
        $recette = $model->getRecipe($id);


        $model = new ModelComment();
        $comments = $model->getComments($id_recette);

        $this->render('recettes/recette', [
        'ingredients' => $ingredients,
        'recette' => $recette,
        'ustensiles' => $ustensiles,
        'commentaires' => $comments
        ]);

    }

}