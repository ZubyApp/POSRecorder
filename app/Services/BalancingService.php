<?php

declare(strict_types = 1);

namespace App\Services;

use App\Models\PosRecords;
use Carbon\Carbon;

class BalancingService
{

    public function __construct()
    {
    }

    public function withdrawalTotal($date)
    {
        $withdrawals = PosRecords::query('amount')
                                    ->where('amount_type', 'Withdrawal')
                                    ->where('date', $date)
                                    ->get()
                                    ->toArray();
        $sum = ['withdrawals' => 0];
        foreach ($withdrawals as $withdrawal) {
        
        $sum['withdrawals'] += $withdrawal['amount'];
        }
        return $sum;
    }

    public function transferTotal($date)
    {
        $tranfers = PosRecords::select('amount')
                                ->where('amount_type', 'Transfer')
                                ->where('date', $date)
                                ->get()
                                ->toArray();

        $sum = ['transfers' => 0];
        foreach ($tranfers as $transfer) {

            $sum['transfers'] += $transfer['amount'];
        }
        return $sum;
    }

    public function airtimeTotal($date)
    {
        $airtimes = PosRecords::select('amount')
                                ->where('amount_type', 'Airtime')
                                ->where('date', $date)
                                ->get()
                                ->toArray();

        $sum = ['airtime' => 0];

        foreach ($airtimes as $airtime) {

            $sum['airtime'] += $airtime['amount'];
        }
        return $sum;
    }

    public function electricityTotal($date)
    {
        $electricBills = PosRecords::select('amount')
                                    ->where('amount_type', 'Electricity')
                                    ->where('date', $date)
                                    ->get()
                                    ->toArray();

        $sum = ['electricity' => 0];

        foreach ($electricBills as $electricBill) {

            $sum['electricity'] += $electricBill['amount'];
        }
        return $sum;
    }

    public function cableTvTotal($date)
    {
        $cableTvBills = PosRecords::select('amount')
                                    ->where('amount_type', 'CableTv')
                                    ->where('date', $date)
                                    ->get()
                                    ->toArray();

        $sum = ['cabletv' => 0];

        foreach ($cableTvBills as $cableTvBill) {

            $sum['cabletv'] += $cableTvBill['amount'];
        }
        return $sum;
    }

    public function cashChargeTotal($date)
    {
        $cashCharges = PosRecords::select('charge')
                                    ->where('charge_type', 'CC')
                                    ->where('date', $date)
                                    ->get()
                                    ->toArray();

        $sum = ['cashcharge' => 0];

        foreach ($cashCharges as $cashCharge) {

            $sum['cashcharge'] += $cashCharge['charge'];
        }
        return $sum;
    }

    public function electChargeTotal($date)
    {
        $electCharges = PosRecords::select('charge')
                                    ->where('charge_type', 'EC')
                                    ->where('date', $date)
                                    ->get()
                                    ->toArray();

        $sum = ['electcharge' => 0];

        foreach ($electCharges as $electCharge) {

            $sum['electcharge'] += $electCharge['charge'];
        }
        return $sum;
    }
}