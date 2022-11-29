<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Enums\HttpMethod;
use App\View;

class HomeController
{
    public function __construct()
    {
    }
    #[Get('/')]
    #[Get('/home', HttpMethod::Head)]
    public function index(): View
    {
        if (empty($_SESSION['username'])){
            $_SESSION['message'] = "Please login";
            \header('Location: /login');
        }

        return View::make('index.php');
    }
}
