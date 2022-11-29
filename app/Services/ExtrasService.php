<?php

declare(strict_types = 1);

namespace App\Services;

use App\Abstracts\Eloquentdb;
use App\Models\Extras;
use Illuminate\Database\Capsule\Manager as Capsule;

class ExtrasService extends Eloquentdb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function savingExtra(): void
    {
        if (isset($_POST['submit']))
            $record = $_POST;

            $extraRecord = new Extras();

            $extraRecord->date         = $record['date'];
            $extraRecord->ewallet      = $record['ewallet'];
            $extraRecord->bankbal      = $record['bankbal'];
            $extraRecord->cashbal      = $record['cashbal'];
            $extraRecord->grosstotal   = $record['gtotal'];
            $extraRecord->rcapital     = $record['rcapital'];
            $extraRecord->rcapital     = $record['rcapital'];
            $extraRecord->profit       = $record['profit'];
            $extraRecord->dprofit      = $record['dprofit'];
            $extraRecord->nrcapital    = $record['nrcapital'];
            $extraRecord->user    = $_SESSION['username'];

            $extraRecord->save();
    }

    public function getExtra(): array
    {
        $month = \date('m');

        return Capsule::table('extras')
            ->select()
            ->whereMonth('date', $month)
            ->latest('date')
            ->get()
            ->toArray();
    }

    public function getExtraWithDate(string $from, string $to): array
    {
        return Capsule::table('extras')
            ->whereBetween('date', [$from, $to])
            ->limit(100)
            ->latest('date')
            ->get()
            ->toArray();

    }
}