<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Services\BalancingService;
use App\View;
use Carbon\Carbon;

class BalancingController
{
    public function __construct(private BalancingService $balancingService)
    {
    }

    #[Get('/balancingOptions')]
    public function balApp(): View
    {
        return View::make('pages/balancing/BalancingOptions.php');
    }

    #[Get('/balancing')]
    public function balApp1(): View
    {
        if (isset($_GET['date'])) {

            $useDate = $_GET['date'];
        } else { $useDate = (new Carbon())->format('Y-m-d');}

        (int)$withdrawalTotal   =    $this->balancingService->withdrawalTotal($useDate);
        (int)$transferTotal     =    $this->balancingService->transferTotal($useDate);
        (int)$airtimeTotal      =    $this->balancingService->airtimeTotal($useDate);
        (int)$electricityTotal  =    $this->balancingService->electricityTotal($useDate);
        (int)$cableTvTotal      =    $this->balancingService->cableTvTotal($useDate);
        (int)$cashChargeTotal   =    $this->balancingService->cashChargeTotal($useDate);
        (int)$electChargeTotal  =    $this->balancingService->electChargeTotal($useDate);


        return View::make(
            'pages/balancing/balancing.php', 
            [
                'withdrawals' => $withdrawalTotal,
                'transfers'   => $transferTotal,
                'airtimes'    => $airtimeTotal,
                'electricity' => $electricityTotal,
                'cabletv'     => $cableTvTotal,
                'cashcharge'  => $cashChargeTotal,
                'electcharge' => $electChargeTotal,
                'date'        => $useDate,
    ]);
    }

    // #[Post('/balancing')]
    // public function BalApp2(): View
    // {
    //     if (isset($_GET['date'])){

    //         $useDate = $_GET['date'];

    //     } else {
    //         $useDate = $_POST['date'];
    //     }

    //     (int)$withdrawalTotal   =    $this->balancingService->withdrawalTotal($useDate);
    //     (int)$transferTotal     =    $this->balancingService->transferTotal($useDate);
    //     (int)$airtimeTotal      =    $this->balancingService->airtimeTotal($useDate);
    //     (int)$electricityTotal  =    $this->balancingService->electricityTotal($useDate);
    //     (int)$cableTvTotal      =    $this->balancingService->cableTvTotal($useDate);
    //     (int)$cashChargeTotal   =    $this->balancingService->cashChargeTotal($useDate);
    //     (int)$electChargeTotal  =    $this->balancingService->electChargeTotal($useDate);


    //     return View::make(
    //         'pages/balancing/balancing.php',
    //         [
    //             'withdrawals' => $withdrawalTotal,
    //             'transfers'   => $transferTotal,
    //             'airtimes'    => $airtimeTotal,
    //             'electricity' => $electricityTotal,
    //             'cabletv'     => $cableTvTotal,
    //             'cashcharge'  => $cashChargeTotal,
    //             'electcharge' => $electChargeTotal,
    //             'date'        => $useDate
    //         ]
    //     );
    // }
}