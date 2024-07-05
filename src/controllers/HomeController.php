<?php

namespace App\Controllers;

use App\Helpers\SessionHelper;
use App\Models\News;
use App\Models\Notes;
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
        $notesModel = new Notes();
        $notes = $notesModel->getAllTitles();
        echo $this->twig->render('index.twig', ['news'=> $news, 'notes' => $notes,'isLoggedIn' => SessionHelper::isLoggedIn()]);
    }
}
