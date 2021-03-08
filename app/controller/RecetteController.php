<?php

namespace app\controller;


class RecetteController extends Controller {


    public function recetteSalee() {

        $this->render('rubriques/rubrique_salee');

    }


    public function recetteSucree() {

        $this->render('rubriques/rubrique_sucree');

    }
}