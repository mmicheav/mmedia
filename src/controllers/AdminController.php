<?php

namespace App\Controllers;

use App\Core\Database;
use App\Helpers\SessionHelper;
use Twig\Environment;

class AdminController
{
    private $twig;
    private $db;

    public function __construct()
    {
        $this->twig = require_once __DIR__ . '/../bootstrap.php';
        $this->db = Database::getInstance()->getConnection();
    }

    public function index()
    {
        echo $this->twig->render('admin.twig',['isLoggedIn'=> SessionHelper::isLoggedIn()]);
    }

}
