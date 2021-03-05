<?php
namespace app\controller;


class LoginLogon extends Controller {



    function connect() {
        $this->render('connect');
    }

    function inscription() {
        $this->render('inscription');
    }



}