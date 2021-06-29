<?php 

$url_accueil = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/mvc/MVCuser/';



define('ROOTURL', $url_accueil); // constante url de la page d'accueil avec / à la fin

define('DBNAME', "mvc");
define('DBHOST', "localhost:3308");
define('DBUSER', "mvc");
define('DBPASSWORD', "mvc");



// On appelle le modèle et le contrôleur principaux
require_once(ROOT.'models/required_models.php');

require_once(ROOT.'app/Controller.php');
