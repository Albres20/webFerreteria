<?php
    class Connection 
    {
        function __construct()
        {
            $this->db = new QueryManager("root", "", "hyt_trading");
        }
    }
?>