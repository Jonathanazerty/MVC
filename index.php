<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function whatIsHappening()
{
    echo '<pre>';
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
//    echo '<h2>$_SESSION</h2>';
//    var_dump($_SESSION);
    echo '</pre>';
}

whatIsHappening();

//include all your model files here
require 'Model/Article.php';
//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/ArticleController.php';
require 'Model/config.php';
require 'Model/DatabaseManager.php';


$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

$articleController = new ArticleController ($databaseManager);
$rawArticles= $articleController ->getArticles();


// Get the current page to load
// If nothing is specified, it will remain empty (home should be loaded)
$page = $_GET['page'] ?? null;

// Load the controller
// It will *control* the rest of the work to load the page
switch ($page) {
    case 'articles':
        // This is shorthand for:
        // $articleController = new ArticleController;
        // $articleController->index();
        (new ArticleController($databaseManager))->index();
        break;
    case 'show':
        (new ArticleController($databaseManager))->show();
        break;
    case 'home':
    default:
        (new HomepageController())->index();
        break;

}
