<?php

namespace App\Controllers;

use App\Helpers\SessionHelper;
use App\Models\News;
use App\Models\Articles;
use Twig\Environment;

class HomeController
{
    private $twig;

    public function __construct()
    {
        $this->twig = require_once __DIR__ . '/../bootstrap.php';
    }

    public function index()
    {        
        $newsModel = new News();
        $news = $newsModel->getAllTitles();
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllTitles();
        echo $this->twig->render('index.twig', ['news'=> $news, 'articles' => $articles,'isLoggedIn' => SessionHelper::isLoggedIn()]);
    }
}
