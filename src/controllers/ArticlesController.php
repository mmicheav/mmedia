<?php

namespace App\Controllers;

use Twig\Environment;
use App\Helpers\SessionHelper;
use App\Models\Articles;

class ArticlesController
{
    private $twig;

    public function __construct()
    {
        $this->twig = require_once __DIR__ . '/../bootstrap.php';
    }

    public function showArticles()
    {
        $articlesModel = new Articles();
        $articles = $articlesModel->getAllArticles();        
        echo $this->twig->render('articles.twig', ['articles' => $articles, 'isLoggedIn' => SessionHelper::isLoggedIn()]);
    }

    public function addArticle()
    {
        echo $this->twig->render('articles_create.twig', ['isLoggedIn' => SessionHelper::isLoggedIn()]);     
    }

    public function showById($id){
        $articlesModel = new Articles();
        $articles = $articlesModel->find($id);

        echo $this->twig->render('articles_detail.twig', ['articles' => $articles, 'isLoggedIn' => SessionHelper::isLoggedIn() ]);
    }

    public function saveArticle()
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $creatorId = $_SESSION['user_id'] ?? null;

        if (!empty($title) && !empty($content)) {
            $articles = new Articles();
            $articles->save($title,$content,$creatorId);            
            
            header('Location: /articles');
            exit;
        } else {
            echo "Error: Datos incompletos.";
        }
    }
}
