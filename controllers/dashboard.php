<?php

class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('logged_in');
        if(!$logged){
            Session::destroy();
            header('location: ./login');
            exit;
        }

        $this->view->js = array("dashboard/js/default.js");
    }

    function show($load_view){
        $this->view->render("dashboard/index", $load_view);
    }

    function logOut(){
        Session::destroy();
        header('location: ../login');
    }

    function xhrInsert(){
        $text = $_POST["text"];
        $text = preg_replace('/<|>/', "", $text);
        if(isset($text) && Session::get("logged_in")){
            $user_id = Session::get("user_id");
            echo $this->model->insertNewPost($user_id, $text);
        }

        return false;
    }

    function xhrGetAllPosts(){
        echo $this->model->selectAllPosts();

        return false;
    }

    function xhrDeletePost(){
        $id = $_POST["id"];
        echo $this->model->deletePost($id);

        return false;
    }
}