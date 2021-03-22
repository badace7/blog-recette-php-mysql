<?php

namespace app\controller;

use app\entity\Avoir;
use app\entity\Recette;
use app\entity\Composer;
use app\entity\Ustensile;
use app\entity\Ingredient;
use app\model\ModelRecipe;

class RecetteController extends Controller {

    public function addRecette() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('recettes/formulaireRecette');
        } else  {

            
            $titre = filter_input(INPUT_POST, 'titre-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $ingredients = $_POST['ingredient'];
            $ustensiles = $_POST['ustensile'];
            $conseil = filter_input(INPUT_POST, 'conseil-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $preparation = filter_input(INPUT_POST, 'preparation-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $cuisson = filter_input(INPUT_POST, 'cuisson-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $tempsTotal = filter_input(INPUT_POST, 'tempstotal-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $type_recette = filter_input(INPUT_POST, 'type-recette', FILTER_SANITIZE_SPECIAL_CHARS);

            


            $image = $_FILES['image-recette'];
            $imageName = $image['name'];
            $targetDir =  'app/images/'.$imageName;
            $fichierTmp = $image['tmp_name'];
            move_uploaded_file($fichierTmp, $targetDir);


            $user = unserialize($_SESSION['user']);


            $recette = new Recette($titre, $imageName, $conseil, $preparation, $cuisson, $tempsTotal, $type_recette);
            $recette->setId_utilisateur($user->getId_utilisateur());


            $ingredients = new Ingredient($ingredients);
            $ustensiles = new Ustensile($ustensiles);

            $id_recette = $recette->getId_recette();
            $id_ingredients = $ingredients->getId_ingredients();
            $id_ustensiles = $ustensiles->getId_ustensile();
            
            $model = new ModelRecipe();
            $model->newRecipe($recette, $ingredients, $ustensiles, $user);

            header('Location: index.php');

        }
    }

    

    public function recetteSalee() {

        $this->render('rubriques/rubrique_salee');

    }


    public function recetteSucree() {

        $this->render('rubriques/rubrique_sucree');

    }
}