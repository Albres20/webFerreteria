<?php

class QueryManager{
    public $pdo;

    function __construct($USER, $PASS, $DB){
        try{
            $this->pdo=new PDO('mysql:host=localhost; dbname='.$DB.';charset=utf8', $USER, $PASS, [
                PDO::ATTR_EMULATE_PREPARES=>false,
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ]);
        }
        catch (\Throwable $th){
            print "¡Error: ".$th->getMessage();
            die();
        }
    }
}


?>