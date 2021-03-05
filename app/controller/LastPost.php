<?php
namespace app\controller;

class LastPost extends Controller {


    function recettePate() {
        $this->render('recettes/recettepate');
    }

    function recettePoulet() {
        $this->render('recettes/recettepoulet');
    }

    function recetteTomate() {
        $this->render('recettes/recettetomate');
    }

    function recettePainperdu() {
        $this->render('recettes/recettepainperdu');
    }

    function recettePancake() {
        $this->render('recettes/recettepancake');
    }

    function recetteTortillas() {
        $this->render('recettes/recettetortillas');
    }
}
