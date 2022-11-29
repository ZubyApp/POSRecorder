<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Services\ExtrasService;
use App\View;

class ExtraController
{
    public function __construct(private ExtrasService $extraService)
    {
        
    }

    #[Get('/recordExtra')]
    public function extraApp(): View
    {
        return View::make('pages/extra/recordExtra.php');
    }

    #[Post('/recordExtra')]
    public function saveExtra(): void
    {
        $this->extraService->savingExtra();

        \header('Location: /extrasReport?=success');
    }
}