<?php

class Login extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('logged_in');
        if($logged){
            header('location: '.URL.'dashboard');
            exit;
        }
        $this->view->loginStatus = "";
    }

    function show(){
        $this->view->render("login/index");
    }

    function loginDo(){
        $result = $this->model->login();
        if($result['okay']){
            header('location: '.URL.'dashboard');
            exit;
        }else{
            $this->view->loginStatus = "Login failed!";
            $this->view->render("login/index");
        }
    }
}