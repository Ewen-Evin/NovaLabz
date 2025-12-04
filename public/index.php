<?php
// Front Controller - Point d'entrée unique
require_once '../core/Router.php';
require_once '../app/controllers/HomeController.php';

// Définir la constante BASE pour Laragon
define('BASE', '/NovaLabz/public/');

// Initialisation du routeur
$router = new Router();

// Routes
$router->add('/', 'HomeController@index');
$router->add('/services', 'HomeController@services');
$router->add('/projects', 'HomeController@projects');
$router->add('/contact', 'HomeController@contact');

// Dispatch la requête
$router->dispatch($_SERVER['REQUEST_URI']);
?>