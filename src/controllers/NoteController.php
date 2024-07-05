<?php

namespace App\Controllers;

use Twig\Environment;
use App\Helpers\SessionHelper;
use App\Models\Notes;

class NoteController
{
    private $twig;

    public function __construct()
    {
        $this->twig = require_once __DIR__ . '/../bootstrap.php';
    }

    public function showNotes()
    {
        $notesModel = new Notes();
        $notes = $notesModel->getAllNotes();        
        echo $this->twig->render('notes.twig', ['notes' => $notes, 'isLoggedIn' => SessionHelper::isLoggedIn()]);
    }

    public function addNote()
    {
        echo $this->twig->render('notes_create.twig', ['isLoggedIn' => SessionHelper::isLoggedIn()]);     
    }

    public function showById($id){
        $notesModel = new Notes();
        $notes = $notesModel->find($id);

        echo $this->twig->render('notes_detail.twig', ['notes' => $notes, 'isLoggedIn' => SessionHelper::isLoggedIn() ]);
    }

    public function saveNote()
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $creatorId = $_SESSION['user_id'] ?? null;

        if (!empty($title) && !empty($content)) {
            $notes = new Notes();
            $notes->save($title,$content,$creatorId);            
            
            header('Location: /notes');
            exit;
        } else {
            echo "Error: Datos incompletos.";
        }
    }
}
