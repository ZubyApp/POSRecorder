<?php

declare(strict_types=1);

use App\Controllers\HomeController;
use App\App;
use App\Controllers\AuthenticationController;
use App\Controllers\BalancingController;
use App\Controllers\DeleteController;
use App\Controllers\EditController;
use App\Controllers\ExtraController;
use App\Router;
use App\Controllers\RecordController;
use App\Controllers\ReportsController;
use App\Controllers\TotalsController;
use Illuminate\Container\Container;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('FILE_PATH', __DIR__ . '/../storage/');
define('FILE_PATH2', __DIR__ . '/../storage/invoices/');
define('VIEW_PATH', __DIR__ . '/../views');
define('HEADER', __DIR__ . '/../views/pages/header.php');
define('FOOTER', __DIR__ . '/../views/pages/footer.php');

$container = new Container;
$router    = new Router($container);

$router->registerRoutesFromControllerAttributes(
    [
        HomeController::class,
        RecordController::class,
        BalancingController::class,
        TotalsController::class,
        ReportsController::class,
        ExtraController::class,
        DeleteController::class,
        EditController::class,
        AuthenticationController::class,
    ]
);


(new App(
    $container,
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
))->boot()->run();
