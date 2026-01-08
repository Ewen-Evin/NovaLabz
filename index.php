<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$base = './public/';
$route_base = '/';


$page = $_GET['page'] ?? 'accueil';

switch ($page) {
    case 'accueil':
        require 'app/views/accueil.php';
        break;

    case 'contact':
        require 'app/views/contact.php';
        break;

    case 'mentions':
        require 'app/views/mentions.php';
        break;

    case 'privacy':
        require 'app/views/privacy.php';
        break;

    case 'cgv':
        require 'app/views/cgv.php';
        break;

    case 'traiter-contact':
        require 'app/controllers/ContactController.php';
        $controller = new ContactController();
        $controller->traiter();
        break;

    case 'tarifs':
        //require 'app/views/tarifs.php';
        require 'app/views/tarifs_later.php';
        break;

    /*
    case 'portfolio':
        require 'app/views/portfolio.php';
        break;
        */

    case 'apropos':
        require 'app/views/apropos.php';
        break;

    default:
        require 'app/views/accueil.php';
        break;
}