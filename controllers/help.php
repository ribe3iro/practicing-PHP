<?php

class Help extends Controller{
    function __construct(){
        parent::__construct();
    }

    function show(){
        $this->view->render("help/index");
    }
}