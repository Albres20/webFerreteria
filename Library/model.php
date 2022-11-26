<?php

include_once 'library/imodel.php';

class Model{

    function __construct(){
        $this->db = new Database();
    }

    function query($query){
        return $this->db->connect()->query($query);
    }

    function prepare($query){
        return $this->db->connect()->prepare($query);
    }

    function beginTransaction(){
        return $this->db->connect()->beginTransaction();
    }

    function commit(){
        return $this->db->connect()->commit();
    }

    function rollback(){
        return $this->db->connect()->rollback();
    }

    function lastInsertId(){
        return $this->db->connect()->lastInsertId();
    }
}

?>