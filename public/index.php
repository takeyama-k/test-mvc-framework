<?php
/*
*下記のYoutube Courseを元にした
*学習用のプロジェクトです
*https://www.youtube.com/watch?v=WKy-N0q3WRo 
*/

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;
use app\core\Router;
use app\controllers\SiteController;
use app\controllers\AuthController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' =>[
        'dsn' => $_ENV['DB_DSN'] ?? '',
        'user' => $_ENV['DB_USER'] ?? '',
        'password' => $_ENV['DB_PASSWORD'] ?? '',
    ]
];


$app = new Application(__DIR__, $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class,'handleContact']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->post('/register', [AuthController::class,'register']);
$app->router->get('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);


$app->run();