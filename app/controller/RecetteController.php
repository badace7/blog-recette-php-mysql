<?php

namespace app\controller;


class RecetteController extends Controller {

    public function addRecette() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->render('recettes/formulaireRecette');
        } else  {


            $titre = filter_input(INPUT_POST, 'titre-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $ingredient = $_POST['ingredient'];
            $ustensile = $_POST['ustensile'];
            $conseil = filter_input(INPUT_POST, 'conseil-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $preparation = filter_input(INPUT_POST, 'preparation-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $cuisson = filter_input(INPUT_POST, 'cuisson-recette', FILTER_SANITIZE_SPECIAL_CHARS);
            $tempsTotal = filter_input(INPUT_POST, 'tempstotal-recette', FILTER_SANITIZE_SPECIAL_CHARS);

            $image = $_FILES['image-recette'];
            $imageName = $image['name'];
            $targetDir =  'app/images/'.$imageName;
            $fichierTmp = $image['tmp_name'];

            $test = move_uploaded_file($fichierTmp, $targetDir);



        }
    }

    

    public function recetteSalee() {

        $this->render('rubriques/rubrique_salee');

    }


    public function recetteSucree() {

        $this->render('rubriques/rubrique_sucree');

    }
}