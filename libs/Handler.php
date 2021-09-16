<?php

class Handler{
    function __construct(){
        try{
            $url = (isset($_GET['url']))? $_GET['url'] : "index";

            $url = rtrim($url, "/");
            $url = explode("/", $url);

            $controller_name = array_shift($url);

            $controller_path = "controllers/$controller_name.php";
            if(file_exists($controller_path)){
                require $controller_path;
            }else{
                throw new Exception("This page doesn't exist");
            }

            $controller = new $controller_name;
            $controller->load_model($controller_name);


            $method = array_shift($url);

            $load_view;

            if(method_exists($controller, $method) && $method!="load"){
                $arguments = $url;
                if(isset($arguments)){
                    $load_view = $controller->{$method}($arguments);
                }else{
                    $load_view = $controller->{$method};
                }
            }else if(isset($method)){
                throw new Exception("This method doesn't exist");
            }

            if(!isset($load_view)){
                $load_view = true;
            }
            $controller->show($load_view);
            
        }catch(Exception $e){
            require "controllers/error_.php";
            $controller = new Error_();
            $controller->show($e->getMessage());
        }
    }
}

?>