<?php

declare(strict_types = 1);

namespace App\Services;

use App\Abstracts\Eloquentdb;
use App\Models\PosRecords;

class RecorderService extends Eloquentdb
{
    public string $date;

    public function __construct()
    {
        parent::__construct();
    }

    public function getDate(){
        $this->date = $_POST['date'];
    }

    public function record(string $date)
    {
        if (isset($_POST['submit'])) {
            $record = $_POST;

            unset($_POST);

            $posRecord = new PosRecords();
            
            $posRecord->date        = $date;
            $posRecord->amount      = $record['amount'];
            $posRecord->amount_type = $record['amount_type'];

                if ($record['charge'] === '') {
                    $record['charge'] = '0';
            $posRecord->charge      = $record['charge'];}

            $posRecord->charge      = $record['charge'];
            $posRecord->charge_type = $record['charge_type'];
            $posRecord->user = $_SESSION['username'];
            
            $posRecord->save();

        }
    }

    public function getRecord(string $date): array
    {
        return PosRecords::query()
                            ->where('date', $date)
                            ->latest()
                            ->get()
                            ->toArray();
    }

    public function getLastDate()
    {
        $lastEntry = PosRecords::query()->get()->last();

        if (!$lastEntry) {
            return $lastEntry['date'] = '';
        }

        $lastDate = $lastEntry['date'];

        return  $lastDate;
    }
}