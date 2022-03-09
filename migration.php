<?php
/*
*下記のYoutube Courseを元にした
*学習用のプロジェクトです
*https://www.youtube.com/watch?v=WKy-N0q3WRo 
*/

require_once __DIR__.'/vendor/autoload.php';

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' =>[
        'dsn' => $_ENV['DB_DSN'] ?? '',
        'user' => $_ENV['DB_USER'] ?? '',
        'password' => $_ENV['DB_PASSWORD'] ?? '',
    ]
];


$app = new Application(__DIR__, $config);

$app->db->applyMigrations();