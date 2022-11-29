<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Enums\HttpMethod;
use App\Services\AuthenticationService;
use App\View;

class AuthenticationController
{
    public function __construct(private AuthenticationService $authenticationService)
    {
    }

    #[Get('/register')]
    public function registerPage(): View
    {
        return View::make('pages/authentication/register.php');
    }

    #[Post('/register')]
    public function registerUser(): void
    {
        $this->authenticationService->createNewUser();
    }

    #[Get('/login')]
    public function loginPage(): View
    {
        return View::make('pages/authentication/login.php');
    }

    #[Post('/login')]
    public function loginUser(): void
    {
        $this->authenticationService->loginUser();
    }

    #[Get('/logout')]
    public function logoutUser(): void
    {
        if ($_SESSION['username']){
            unset($_SESSION['username']);
            \header('Location: /login');
        }
    }
}
