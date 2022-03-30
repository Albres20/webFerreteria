<?php
    class Connection 
    {
        function __construct()
        {
            $this->db = new QueryManager("root", "1234", "hyt_trading");
        }
    }
?>