<?php

class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function show(){
        $this->view->render("index/index");
    }
}