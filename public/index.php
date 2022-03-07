<?php
/* テストプロジェクトです */

require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;
use app\core\Router;
use app\controllers\SiteController;
use app\controllers\AuthController;

$app = new Application(__DIR__);


$app->router->get('/', function(){
    return 'Hello World';
});
$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class,'handleContact']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->post('/register', [AuthController::class,'register']);
$app->router->get('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);


$app->run();