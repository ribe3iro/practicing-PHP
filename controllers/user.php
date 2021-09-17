<?php

class User extends Controller{
    function __construct(){
        parent::__construct();
        Session::init();
        $logged = Session::get('logged_in');
        $role = Session::get('role');
        if(!$logged || $role != 'owner'){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }
    }

    function show(){
        $this->view->userList = $this->model->selectAllUsers();
        $this->view->render("user/index");
    }

    function edit($data){
        $id = $data[0];
        if(isset($id)){
            $result = $this->model->selectUser($id);
            if($result['okay']){
                $this->view->user = $result['data'];
                $this->view->render("user/edit");
            }else{
                header('location: '.URL.'user');
            }
        }else{
            header('location: '.URL.'user');
        }
    }

    function save($data){
        $id = $data[0];
        try{
            if(isset($id)){
                if(!empty($_POST)){
                    $login = trim($_POST['login']);
                    $password = $_POST['password'];
                    $role = $_POST['role'];

                    $validRole = in_array($role, ["default", "owner", "admin"]);

                    if($id == Session::get("user_id") && $role != "owner"){
                        $validRole = false;
                    }

                    if($login == "" || !$validRole){
                        throw new Exception("Invalid arguments");
                    }

                    $result = $this->model->editUser($id, $login, $password, $role);
                    if($result['okay']){
                        header('location: '.URL.'user');
                    }else{
                        throw new Exception("Could not connect to database");
                    }
                }else{
                    throw new Exception("No arguments received");
                }
            }else{
                throw new Exception("No id received");
            }
        }catch(Exception $e){
            echo "Error during the edit: ".$e->getMessage();
            echo "<br><a href='".URL."user'>Back to user page</a>";
        }
    }

    function delete($data){
        $id = $data[0];
        if(isset($id) && $id != Session::get("id")){
            echo json_encode($this->model->deleteUser($id));
        }else{
            echo json_encode(['okay' => false]);
        }
        header('location: '.URL.'user');
    }

    function create(){
        if(!empty($_POST)){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            echo json_encode($this->model->createUser($login, $password, $role));
        }else{
            echo json_encode(['okay' => false]);
        }
        header('location: '.URL.'user');
    }
}