<?php

class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('logged_in');
        if(!$logged){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }

        $this->view->js = array("dashboard/js/default.js");
    }

    function show(){
        $this->view->render("dashboard/index");
    }

    function logOut(){
        Session::destroy();
        header('location: '.URL.'login');
    }

    function xhrInsert(){
        if(isset($_POST["text"])){
            $text = $_POST["text"];
            $text = preg_replace('/<|>/', "", $text);
            if(isset($text) && Session::get("logged_in")){
                $user_id = Session::get("user_id");
                echo json_encode($this->model->insertNewPost($user_id, $text));
            }else{
                echo json_encode(['okay' => false]);
            }
        }else{
            echo json_encode(['okay' => false]);
        }
    }

    function xhrGetAllPosts(){
        echo json_encode($this->model->selectAllPosts());
    }

    function xhrDeletePost(){
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            echo json_encode($this->model->deletePost($id));
        }else{
            echo json_encode(['okay' => false]);
        }
    }
}