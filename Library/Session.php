<?php
    class Session
    {
        static function StartSession()
        {
            @session_start();
        }

        static function getSession($name){
            return $_SESSION[$name];
        }

        static function setSession($name, $data){
            $_SESSION[$name] = $data;
        }

        static function destroySession(){
            @session_destroy();
        }
    }
?>