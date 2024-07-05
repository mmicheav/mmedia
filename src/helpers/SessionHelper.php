<?php

namespace App\Helpers;

class SessionHelper
{
    public function isLoggedIn(){
        return isset($_SESSION['user_id']);
    }
}
