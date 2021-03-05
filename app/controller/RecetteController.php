<?php

namespace app\controller;


class RecetteController extends Controller {


    public function recetteSalee() {

        $this->render('rubrique_salee');

    }


    public function recetteSucree() {

        $this->render('rubrique_sucree');

    }
}