<?php
include_once 'Library/IModel.php';
    class QueryManager{

        function __construct(){
            $this->db = new Connection();
        }

        function query($query){
            return $this->db->connect()->query($query);
        }

        function prepare($query){
            return $this->db->connect()->prepare($query);
        }
    }

?>