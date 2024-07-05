<?php

namespace App\Middleware;

use Closure;
use App\Core\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        return $next($request);
    }
}
