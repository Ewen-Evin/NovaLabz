<?php
// Chargement des variables d'environnement (BASE dynamique, indépendant du nom du dossier)
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
if ($scriptDir === '' || $scriptDir === '.') {
    define('BASE', '/');
} else {
    define('BASE', $scriptDir . '/');
}

// Front Controller - Point d'entrée unique
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/app/controllers/HomeController.php';

// Initialisation du routeur
$router = new Router();

// Routes protégées - rediriger vers countdown si date < 1er janvier 2026
$currentDate = new DateTime();
$launchDate = new DateTime('2026-01-01');

if ($currentDate >= $launchDate) {
    // Après le lancement, toutes les routes sont accessibles
    $router->add('/', 'HomeController@index');
    $router->add('/services', 'HomeController@services');
    $router->add('/projects', 'HomeController@projects');
    $router->add('/contact', 'HomeController@contact');
} else {
    // Avant le lancement, rediriger toutes les routes vers countdown
    $router->add('/', 'HomeController@countdown');
    $router->add('/services', 'HomeController@countdown');
    $router->add('/projects', 'HomeController@countdown');
    $router->add('/contact', 'HomeController@countdown');
}

// Dispatch la requête
$router->dispatch($_SERVER['REQUEST_URI']);
?>