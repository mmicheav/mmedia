<?php

namespace App\Controllers;

use App\Core\Database;
use Twig\Environment;

class AuthController
{
    private $twig;
    private $db;

    public function __construct()
    {
        $this->twig = require_once __DIR__ . '/../bootstrap.php';
        $this->db = Database::getInstance()->getConnection();
    }

    public function showLogin()
    {
        echo $this->twig->render('login.twig');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->db->prepare('INSERT INTO users (username, password_hash) VALUES (?, ?)');
            $stmt->execute([$username, $passwordHash]);
            header('Location: /');
            exit;
        }
        echo $this->twig->render('register.twig');
    }

    public function login()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $this->db->prepare('SELECT id, password_hash FROM users WHERE username = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /admin');
                exit;
            } else {
                $error = 'Usuario o contraseña incorrectos';
                echo $this->twig->render('login.twig', ['error' => $error]);
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}
