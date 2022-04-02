<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.

ini_set("error_log", "php-error.log");
error_log( "Hello, errors!" );

//tail -f /tmp/php-error.log
require_once 'library/database.php';
//require_once 'library/messages.php';

require_once 'library/controller.php';
require_once 'library/view.php';
require_once 'library/model.php';
require_once 'library/app.php';


require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'classes/errors.php';
require_once 'classes/success.php';


require_once 'config/config.php';

include_once 'models/usermodel.php';
//include_once 'models/expensesmodel.php';
//include_once "models/categoriesmodel.php";
//include_once "models/joinexpensescategoriesmodel.php";

$app = new App();

?>