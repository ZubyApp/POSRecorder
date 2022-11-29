<?php

declare(strict_types = 1);

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Abstracts\Eloquentdb;
use App\Models\PosRecords;

class ReportsService extends Eloquentdb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCurrentMonthRecords(): array
    {
        return Capsule::table('pos_records')
                        ->whereMonth('date', '=', \date('m'))
                        ->orderBy('date', 'desc')
                        ->lazy()
                        ->toArray();
    }

    public function searchRecords(string $aType, string $from, string $to)
    {
        return Capsule::table('pos_records')
                        ->where('amount_type', '=', $aType )
                        ->whereBetween('date', [$from, $to])
                        ->orWhere('charge_type', '=', $aType)
                        ->whereBetween('date', [$from, $to])
                        ->latest('date')
                        ->get()
                        ->toArray();
    }

    public function getAllWithDate(string $from, string $to): array
    {
        return Capsule::table('pos_records')
                        ->whereBetween('date', [$from, $to])
                        ->limit(200)
                        ->latest('date')
                        ->get()
                        ->toArray();
    }

    public function getAllUsers(): array
    {
        return Capsule::table('pos_records')->select('user')
                        ->whereNotNull('user')
                        ->distinct()
                        ->get()
                        ->toArray();
    }

    public function getUserRecords(string $user, string $from, string $to): array
    {
        return Capsule::table('pos_records')->select()
                        ->Where('user', '=', $user)
                        ->whereBetween('date', [$from, $to])
                        ->get()
                        ->toArray();
    }


}