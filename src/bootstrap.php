<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/views/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

// Iniciar la base de datos
$db = Database::getInstance();

return $twig;
