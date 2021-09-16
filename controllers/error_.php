<?php

class Error_ extends Controller{
    function __construct(){
        parent::__construct();
    }

    function show($message = "Error page!"){
        $this->view->msg = $message;
        $this->view->render("error/index");
    }
}