<?php

class Session{
    static public function init(){
        @session_start();
    }

    static public function set($key, $value){
        $_SESSION[$key] = $value;
    }

    static public function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
    }

    static public function destroy(){
        unset($_SESSION);
        session_destroy();
    }
}