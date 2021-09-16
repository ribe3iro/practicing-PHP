<?php

class Controller{
    function __construct(){
        $this->view = new View();
    }

    function load_model($name){
        $path = "models/$name"."_model.php";
        
        if(file_exists($path)){
            require $path;
            $model_name = $name."_model";
            $this->model = new $model_name;
        }
    }
}

?>