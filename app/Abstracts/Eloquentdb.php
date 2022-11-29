<?php

declare(strict_types=1);

namespace App\Abstracts;

use App\Config;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;

Abstract class Eloquentdb
{
    public function __construct()
    {
        $config = new Config($_ENV);
        $capsule = new Capsule();
        $capsule->addConnection($config->db);
        $capsule->setEventDispatcher(new Dispatcher());
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
