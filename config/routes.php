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
$router->add('/articles', 'ArticlesController', 'showArticles');
$router->add('/articles/(\d+)', 'ArticlesController', 'showById');
$router->add('/articles/add', 'ArticlesController', 'addArticle', [AuthMiddleware::class]);
$router->add('/articles/save', 'ArticlesController', 'saveArticle', [AuthMiddleware::class]);

// Rutas Admin
$router->add('/admin', 'AdminController', 'index', [AuthMiddleware::class]);


return $router;
