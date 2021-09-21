<?php

class View{
    function __construct(){
    }

    public function render($name){
        $this->controller_name = explode("/",$name)[0];
        require "views/header.php";
        require "views/" . $name . ".php";
        require "views/footer.php";
    }
}

?>