<?php

declare(strict_types = 1);

namespace App\Services;

use App\Abstracts\Eloquentdb;
use Illuminate\Database\Capsule\Manager as Capsule;

class AmountsService extends Eloquentdb
{
    public function __construct()
    {
        parent::__construct();
    }
    public function amountsSearch(string $range, $from, $to)
    {
        $parts = \explode(',', $range);
        
        return Capsule::table('pos_records')
        ->where('amount', $parts[0], (int)$parts[1])
        ->where('amount', $parts[2], (int)$parts[3])
        ->whereBetween('date', [$from, $to])
        ->orderBy('amount', 'asc')
        ->get()
        ->toArray();
    }

    public function updatedId(string $id)
    {
        return Capsule::table('pos_records')
        ->where('id', $id)
        ->get()
        ->toArray();

    }
}