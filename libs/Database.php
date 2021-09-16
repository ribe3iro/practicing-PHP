<?php

class Database extends PDO{
    function __construct(){
        parent::__construct(DB_TYPE.":dbname=".DB_NAME.";host=".DB_HOST, 
                            DB_USER, 
                            DB_PASS);
    }
}
