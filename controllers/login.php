<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('logged_in');
        if($logged){
            header('location: ./dashboard');
            exit;
        }
        $this->view->loginStatus = "";
    }

    function show(){
        $this->view->render("login/index");
    }

    function loginDo(){
        $this->view->loginStatus = $this->model->login();
    }
}