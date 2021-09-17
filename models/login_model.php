<?php

class Login_Model extends Model{
    function __construct(){
        parent::__construct();
    }

    function login(){
        try{
            $args = array(
                ':login' => $_POST['login'],
                ':password' => $_POST['password']
            );
            $sth = $this->db->prepare("SELECT * FROM users WHERE
            login = :login AND password = MD5(:password)");

            $sth->execute($args);
            if($sth->rowCount() <= 0){
                return ["okay" => false];
            }else{
                $result = $sth->fetchAll();
                Session::init();
                Session::set("logged_in", true);
                Session::set("user_id", $result[0]["id"]);
                Session::set("login", $result[0]["login"]);
                Session::set("role", $result[0]["role"]);
                return ["okay" => true];
            }
        }catch(Exception $e){
            return ["okay" => false];
        }
    }
}
