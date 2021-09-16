<?php

class View{
    function __construct(){
    }

    public function render($name, $load_view = true){
        if($load_view){
            require "views/header.php";
            require "views/" . $name . ".php";
            require "views/footer.php";
        }
    }
}

?>