<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Helpers\ConvertRecords;
use App\Services\TotalsService;
use App\View;

class TotalsController
{
    public function __construct()
    {
        
    }

    #[Post('/savebalance')]
    public function saveTotals()
    {
        (new TotalsService)->inputTotals();
    }

    public function goTo(){
        \header('Location: /dailybalance');
    }

    #[Get('/dailybalance')]
    public function dailyBalance(): View
    {
        if (isset($_GET['submit'])){

        $dates = $_GET;

        $objectBals = (new TotalsService)->getSearchedTotals($dates['from'], $dates['to']);


        } else{$objectBals = (new TotalsService)->getTotals();}


        $savedBals = (new ConvertRecords())->decode($objectBals);


        $totals = [
                    'transfers'   => 0,
                    'airtime'     => 0,
                    'electricity' => 0,
                    'cabletv'     => 0,
                    'cashcharge'  => 0,
                    'electcharge' => 0,
                    'withdrawals' => 0,
                    'difference'  => 0,
                ] ;

        foreach ($savedBals as $savedBal) {
        $totals['transfers'] += intval($savedBal['transfers']);
        $totals['airtime'] += intval($savedBal['airtime']);
        $totals['electricity'] += intval($savedBal['electricity']);
        $totals['cabletv'] += intval($savedBal['cabletv']);
        $totals['cashcharge'] += intval($savedBal['cashcharge']);
        $totals['electcharge'] += intval($savedBal['electcharge']);
        $totals['withdrawals'] += intval($savedBal['withdrawals']);
        $totals['difference'] += intval($savedBal['difference']);
        
        }

        return View::make(
                        'pages/reports/dailyTotals.php', 
                        [
                        'savedBals'         => $savedBals,
                        'transferTotal'     => $totals['transfers'],
                        'airtimeTotal'      => $totals['airtime'],
                        'electricityTotal'  => $totals['electricity'],
                        'cabletvTotal'      => $totals['cabletv'],
                        'cashChargeTotal'   => $totals['cashcharge'],
                        'electChargeTotal'  => $totals['electcharge'],
                        'withdrawalsTotal'  => $totals['withdrawals'],
                        'differenceTotal'   => $totals['difference']
                    ]);
    }
}