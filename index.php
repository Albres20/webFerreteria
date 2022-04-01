<?php
    error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

    ini_set('ignore_repeated_errors', TRUE); // always use TRUE
    
    ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment
    
    ini_set('log_errors', TRUE); // Error/Exception file logging engine.
    
    ini_set("error_log", "php-error.log");
    error_log( "Hello, errors!" );

    //require_once 'classes/session.php';
    //require_once 'classes/sessionController.php';
    require_once 'classes/ErrorsMessages.php';
    require_once 'classes/SuccessMessages.php';

    require_once 'Library/Connection.php';
    require_once 'Library/Controllers.php';
    require_once 'Library/QueryManager.php';
    require_once 'Library/Views.php';
    require_once 'Library/Principal.php';

    require_once 'config.php';

    $principal = new Principal();
?>