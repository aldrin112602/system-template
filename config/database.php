<?php
require_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';
$database = getenv('DB_NAME') ?: null;

return [
    'host' => $host,
    'database' => $database,
    'username' => $username,
    'password' => $password,
    'port' => 3306,
    'charset' => 'utf8mb4',
];
