<?php

namespace App\Controllers;

use App\Helpers\SessionHelper;
use Twig\Environment;
use App\Models\News;

class NewsController
{
    private $twig;

    public function __construct()
    {
        $this->twig = require_once __DIR__ . '/../bootstrap.php';
       
    }

    public function showNews()
    {
        $newsModel = new News();
        $news = $newsModel->getAllNews();
        echo $this->twig->render('news.twig', ['news' => $news, 'isLoggedIn' => SessionHelper::isLoggedIn()]);
    }

    public function addNews()
    {
        echo $this->twig->render('news_create.twig', ['isLoggedIn' => SessionHelper::isLoggedIn()]);
    }

    public function showById($id){

        $newsModel = new News();
        $news = $newsModel->find($id);

        echo $this->twig->render('news_detail.twig', ['news' => $news, 'isLoggedIn' => SessionHelper::isLoggedIn() ]);
    }

    public function saveNews()
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $creatorId = $_SESSION['user_id'] ?? null;

        if (!empty($title) && !empty($content)) {
            $news = new News();
            $news->save($title,$content,$creatorId);            
            
            header('Location: /news');
            exit;
        } else {
            echo "Error: Datos incompletos.";
        }
    }
}
