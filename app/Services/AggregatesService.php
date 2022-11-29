<?php

declare(strict_types = 1);

namespace App\Services;

use App\Abstracts\Eloquentdb;
use App\Helpers\ConvertRecords;

class AggregatesService extends Eloquentdb
{
    public function __construct(private TotalsService $totalsService)
    {
        parent::__construct();
    }

    public function janTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(1, $year);

        $janRecords = (new ConvertRecords())->decode($records);

        $jantotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($janRecords as $janRecord) {
            $jantotals['transfers']     += intval($janRecord['transfers']);
            $jantotals['airtime']       += intval($janRecord['airtime']);
            $jantotals['electricity']   += intval($janRecord['electricity']);
            $jantotals['cabletv']       += intval($janRecord['cabletv']);
            $jantotals['cashcharge']    += intval($janRecord['cashcharge']);
            $jantotals['electcharge']   += intval($janRecord['electcharge']);
            $jantotals['withdrawals']   += intval($janRecord['withdrawals']);
            $jantotals['difference']    += intval($janRecord['difference']);
        }
        return $jantotals;
    }

    public function febTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(2, $year);

        $febRecords = (new ConvertRecords())->decode($records);

        $febtotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($febRecords as $febRecord) {
            $febtotals['transfers'] += intval($febRecord['transfers']);
            $febtotals['airtime'] += intval($febRecord['airtime']);
            $febtotals['electricity'] += intval($febRecord['electricity']);
            $febtotals['cabletv'] += intval($febRecord['cabletv']);
            $febtotals['cashcharge'] += intval($febRecord['cashcharge']);
            $febtotals['electcharge'] += intval($febRecord['electcharge']);
            $febtotals['withdrawals'] += intval($febRecord['withdrawals']);
            $febtotals['difference'] += intval($febRecord['difference']);
        }
        return $febtotals;
    }

    public function marTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(3, $year);

        $marRecords = (new ConvertRecords())->decode($records);

        $martotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($marRecords as $marRecord) {
            $martotals['transfers'] += intval($marRecord['transfers']);
            $martotals['airtime'] += intval($marRecord['airtime']);
            $martotals['electricity'] += intval($marRecord['electricity']);
            $martotals['cabletv'] += intval($marRecord['cabletv']);
            $martotals['cashcharge'] += intval($marRecord['cashcharge']);
            $martotals['electcharge'] += intval($marRecord['electcharge']);
            $martotals['withdrawals'] += intval($marRecord['withdrawals']);
            $martotals['difference'] += intval($marRecord['difference']);
        }
        return $martotals;
    }

    public function aprTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(4, $year);

        $aprRecords = (new ConvertRecords())->decode($records);

        $aprtotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($aprRecords as $aprRecord) {
            $aprtotals['transfers'] += intval($aprRecord['transfers']);
            $aprtotals['airtime'] += intval($aprRecord['airtime']);
            $aprtotals['electricity'] += intval($aprRecord['electricity']);
            $aprtotals['cabletv'] += intval($aprRecord['cabletv']);
            $aprtotals['cashcharge'] += intval($aprRecord['cashcharge']);
            $aprtotals['electcharge'] += intval($aprRecord['electcharge']);
            $aprtotals['withdrawals'] += intval($aprRecord['withdrawals']);
            $aprtotals['difference'] += intval($aprRecord['difference']);
        }
        return $aprtotals;
    }

    public function mayTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(5, $year);

        $mayRecords = (new ConvertRecords())->decode($records);

        $maytotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($mayRecords as $mayRecord) {
            $maytotals['transfers'] += intval($mayRecord['transfers']);
            $maytotals['airtime'] += intval($mayRecord['airtime']);
            $maytotals['electricity'] += intval($mayRecord['electricity']);
            $maytotals['cabletv'] += intval($mayRecord['cabletv']);
            $maytotals['cashcharge'] += intval($mayRecord['cashcharge']);
            $maytotals['electcharge'] += intval($mayRecord['electcharge']);
            $maytotals['withdrawals'] += intval($mayRecord['withdrawals']);
            $maytotals['difference'] += intval($mayRecord['difference']);
        }
        return $maytotals;
    }

    public function junTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(6, $year);

        $junRecords = (new ConvertRecords())->decode($records);

        $juntotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($junRecords as $junRecord) {
            $juntotals['transfers'] += intval($junRecord['transfers']);
            $juntotals['airtime'] += intval($junRecord['airtime']);
            $juntotals['electricity'] += intval($junRecord['electricity']);
            $juntotals['cabletv'] += intval($junRecord['cabletv']);
            $juntotals['cashcharge'] += intval($junRecord['cashcharge']);
            $juntotals['electcharge'] += intval($junRecord['electcharge']);
            $juntotals['withdrawals'] += intval($junRecord['withdrawals']);
            $juntotals['difference'] += intval($junRecord['difference']);
        }
        return $juntotals;
    }

    public function julTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(7, $year);

        $julRecords = (new ConvertRecords())->decode($records);

        $jultotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($julRecords as $julRecord) {
            $jultotals['transfers'] += intval($julRecord['transfers']);
            $jultotals['airtime'] += intval($julRecord['airtime']);
            $jultotals['electricity'] += intval($julRecord['electricity']);
            $jultotals['cabletv'] += intval($julRecord['cabletv']);
            $jultotals['cashcharge'] += intval($julRecord['cashcharge']);
            $jultotals['electcharge'] += intval($julRecord['electcharge']);
            $jultotals['withdrawals'] += intval($julRecord['withdrawals']);
            $jultotals['difference'] += intval($julRecord['difference']);
        }
        return $jultotals;
    }

    public function augTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(8, $year);

        $augRecords = (new ConvertRecords())->decode($records);

        $augtotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($augRecords as $augRecord) {
            $augtotals['transfers'] += intval($augRecord['transfers']);
            $augtotals['airtime'] += intval($augRecord['airtime']);
            $augtotals['electricity'] += intval($augRecord['electricity']);
            $augtotals['cabletv'] += intval($augRecord['cabletv']);
            $augtotals['cashcharge'] += intval($augRecord['cashcharge']);
            $augtotals['electcharge'] += intval($augRecord['electcharge']);
            $augtotals['withdrawals'] += intval($augRecord['withdrawals']);
            $augtotals['difference'] += intval($augRecord['difference']);
        }
        return $augtotals;
    }

    public function sepTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(9, $year);

        $sepRecords = (new ConvertRecords())->decode($records);

        $septotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($sepRecords as $sepRecord) {
            $septotals['transfers'] += intval($sepRecord['transfers']);
            $septotals['airtime'] += intval($sepRecord['airtime']);
            $septotals['electricity'] += intval($sepRecord['electricity']);
            $septotals['cabletv'] += intval($sepRecord['cabletv']);
            $septotals['cashcharge'] += intval($sepRecord['cashcharge']);
            $septotals['electcharge'] += intval($sepRecord['electcharge']);
            $septotals['withdrawals'] += intval($sepRecord['withdrawals']);
            $septotals['difference'] += intval($sepRecord['difference']);
        }
        return $septotals;
    }

    public function octTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(10, $year);

        $octRecords = (new ConvertRecords())->decode($records);

        $octtotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($octRecords as $octRecord) {
            $octtotals['transfers'] += intval($octRecord['transfers']);
            $octtotals['airtime'] += intval($octRecord['airtime']);
            $octtotals['electricity'] += intval($octRecord['electricity']);
            $octtotals['cabletv'] += intval($octRecord['cabletv']);
            $octtotals['cashcharge'] += intval($octRecord['cashcharge']);
            $octtotals['electcharge'] += intval($octRecord['electcharge']);
            $octtotals['withdrawals'] += intval($octRecord['withdrawals']);
            $octtotals['difference'] += intval($octRecord['difference']);
        }
        return $octtotals;
    }

    public function novTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(11, $year);

        $novRecords = (new ConvertRecords())->decode($records);

        $novtotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($novRecords as $novRecord) {
            $novtotals['transfers'] += intval($novRecord['transfers']);
            $novtotals['airtime'] += intval($novRecord['airtime']);
            $novtotals['electricity'] += intval($novRecord['electricity']);
            $novtotals['cabletv'] += intval($novRecord['cabletv']);
            $novtotals['cashcharge'] += intval($novRecord['cashcharge']);
            $novtotals['electcharge'] += intval($novRecord['electcharge']);
            $novtotals['withdrawals'] += intval($novRecord['withdrawals']);
            $novtotals['difference'] += intval($novRecord['difference']);
        }
        return $novtotals;
    }

    public function decTotals(string|int $year = null)
    {
        $records = $this->totalsService->getTotals(12, $year);

        $decRecords = (new ConvertRecords())->decode($records);

        $dectotals = [
            'transfers'   => 0,
            'airtime'     => 0,
            'electricity' => 0,
            'cabletv'     => 0,
            'cashcharge'  => 0,
            'electcharge' => 0,
            'withdrawals' => 0,
            'difference'  => 0
        ];


        foreach ($decRecords as $decRecord) {
            $dectotals['transfers'] += intval($decRecord['transfers']);
            $dectotals['airtime'] += intval($decRecord['airtime']);
            $dectotals['electricity'] += intval($decRecord['electricity']);
            $dectotals['cabletv'] += intval($decRecord['cabletv']);
            $dectotals['cashcharge'] += intval($decRecord['cashcharge']);
            $dectotals['electcharge'] += intval($decRecord['electcharge']);
            $dectotals['withdrawals'] += intval($decRecord['withdrawals']);
            $dectotals['difference'] += intval($decRecord['difference']);
        }
        return $dectotals;
    }
}