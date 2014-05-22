<?php

/* RACINE DE PUBLIC */
define('WEBROOT',dirname(__FILE__));
/* RACINE DU SITE */
define('ROOT',dirname(WEBROOT));
/* DIRECTORY_SEPARATOR */
define('DS',DIRECTORY_SEPARATOR);
/* APPLICATION */
define('CORE', ROOT.DS.'core');
/* URL RACINE */
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'includes.php' ;
new Dispatcher();