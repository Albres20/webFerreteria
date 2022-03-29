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

    public function Select1($attr,$table,$where,$param){ //funcion para consultar una tabla
        try{
            $where = $where ?? "";
            $query = "SELECT ".$attr." FROM ".$table." ".$where;
            $sth = $this->pdo->prepare($query);
            $sth -> execute($param);
            $response = $sth->fetchAll(PDO::FETCH_ASSOC);
            return array("results" => $response);
        }catch (\Throwable $th){
            return $th -> getMessage();
        }

        $pdo = null;
    }
}


?>