<?php


use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\NewsController;
use App\Controllers\NoteController;
use App\Middleware\AuthMiddleware;
use App\Core\Router;

$router = new Router();

// Rutas de autenticación
$router->add('/login', 'AuthController', 'showLogin');
$router->add('/auth/login', 'AuthController', 'login');
$router->add('/logout', 'AuthController', 'logout');

// Ruta de la página de inicio
$router->add('/', 'HomeController', 'index');

// Rutas de noticias
$router->add('/news', 'NewsController', 'showNews');
$router->add('/news/(\d+)', 'NewsController', 'showById');
$router->add('/news/add', 'NewsController', 'addNews', [AuthMiddleware::class]);
$router->add('/news/save', 'NewsController', 'saveNews', [AuthMiddleware::class]);

// Rutas de notas
$router->add('/notes', 'NoteController', 'showNotes');
$router->add('/notes/(\d+)', 'NoteController', 'showById');
$router->add('/notes/add', 'NoteController', 'addNote', [AuthMiddleware::class]);
$router->add('/notes/save', 'NoteController', 'saveNote', [AuthMiddleware::class]);

// Ruta Admin
$router->add('/admin', 'AdminController', 'index', [AuthMiddleware::class]);

// Agregar más rutas según sea necesario

return $router;
