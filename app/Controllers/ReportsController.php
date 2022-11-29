<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Helpers\ConvertRecords;
use App\Services\AggregatesService;
use App\Services\AmountsService;
use App\Services\ExtrasService;
use App\Services\ReportsService;
use App\Services\TotalsService;
use App\View;

class ReportsController
{
    public function __construct(
        private ReportsService $reportsService, 
        private ConvertRecords $convertRecords,
        private AggregatesService $aggregatesService,
        private ExtrasService $extrasService,
        private AmountsService $amountsService
        )
    {
        
    }

    #[Get('/reportOptions')]
    public function reportMenu(): View
    {
        return View::make('pages/reports/reportOptions.php');
    }

    #[Get('/recordsReport')]
    public function reportApp(): View
    {
        $records = $this->reportsService->getCurrentMonthRecords();
        $records = $this->convertRecords->decode($records);

        $total = ['charge' => 0];

        foreach ($records as $amount) {
            $total['charge'] += $amount['charge'];
        }

        return View::make('pages/reports/recordsReport.php', 
        [
            'records' => $records,
            'chargeTotal' => $total['charge'],
        ]);
    }

    #[Get('/searchRecords')]
    public function searchApp(): View
    {
        $params = $_GET;

        $atype = $params['type'];
        $from  = $params['fromdate'];
        $to    = $params['todate'];

        if ($atype === 'All'){
            $records = $this->reportsService->getAllWithDate($from, $to);
            $records = $this->convertRecords->decode($records); 
        } elseif ($atype !== 'All'){
            $records = $this->reportsService->searchRecords($atype, $from, $to);
            $records = $this->convertRecords->decode($records);
        }


        $total = ['charge' => 0];

        foreach ($records as $amount) {
            $total['charge'] += $amount['charge'];
        }


        return View::make('pages/reports/recordsReport.php', 
            [
                'records' => $records,
                'chargeTotal' => $total['charge'],
            ]);
    }


    #[Get('/aggregates')]
    public function reportApp1(): View
    {
        return View::make('pages/reports/aggregatedReports.php');
    }

    #[Get('/searchAggregates')]
    public function searchApp1(): View
    {
        
        $year = $_GET['year'];

        $jantotals = $this->aggregatesService->janTotals($year);
        $febtotals = $this->aggregatesService->febTotals($year);
        $martotals = $this->aggregatesService->marTotals($year);
        $aprtotals = $this->aggregatesService->aprTotals($year);
        $maytotals = $this->aggregatesService->mayTotals($year);
        $juntotals = $this->aggregatesService->junTotals($year);
        $jultotals = $this->aggregatesService->julTotals($year);
        $augtotals = $this->aggregatesService->augTotals($year);
        $septotals = $this->aggregatesService->sepTotals($year);
        $octtotals = $this->aggregatesService->octTotals($year);
        $novtotals = $this->aggregatesService->novTotals($year);
        $dectotals = $this->aggregatesService->decTotals($year);

        return View::make(
            'pages/reports/aggregatedReports.php', 
            [
                'Jan'    =>    $jantotals,
                'Feb'    =>    $febtotals,
                'Mar'    =>    $martotals,
                'Apr'    =>    $aprtotals,
                'May'    =>    $maytotals,
                'Jun'    =>    $juntotals,
                'Jul'    =>    $jultotals,
                'Aug'    =>    $augtotals,
                'Sep'    =>    $septotals,
                'Oct'    =>    $octtotals,
                'Nov'    =>    $novtotals,
                'Dec'    =>    $dectotals,
                'Year'   =>    $year
            ]);
    }

    #[Get('/extrasReport')]
    public function extraApp1(): View
    {
        $extraRecords = $this->extrasService->getExtra();
        $extraRecords = $this->convertRecords->decode($extraRecords);

        return View::make('pages/extra/extrasReport.php', ['extra' => $extraRecords]);
    }

    #[Post('/searchExtra')]
    public function searchExtra()
    {
        $dates = $_POST;

        $from = $dates['from'];
        $to = $dates['to'];

        $extraRecords = $this->extrasService->getExtraWithDate($from, $to);
        $extraRecords = $this->convertRecords->decode($extraRecords);

        return View::make('pages/extra/extrasReport.php', ['extra' => $extraRecords]);
    }

    #[Get('/amountsSearch')]
    public function reportApp2(): View
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $data = $this->amountsService->updatedId($id);
            $data = (new ConvertRecords)->decode($data);
            return View::make('pages/reports/amountsReport.php', ['records' => $data]);
        }
        

        return View::make('pages/reports/amountsReport.php');
    }

    #[Post('/amountsSearch')]
    public function reportApp3(): View
    {
        if (isset($_POST['range'])){
            $info = $_POST;
            $data = $this->amountsService->amountsSearch($info['range'], $info['from'], $info['to']);
        } else {
            $id = $_POST['id'];
            $data = $this->amountsService->updatedId($id);
        }


        
        $data = (new ConvertRecords)->decode($data);
        
        $total = ['charge' => 0];

        foreach ($data as $amount){
                $total['charge'] += $amount['charge'];
        }

        return View::make('pages/reports/amountsReport.php', 
        [
            'records'       => $data,
            'chargeTotal'   => $total['charge']
        ]);
    }

    #[Get('/usersSearch')]
    public function reportApp4(): View
    {
        $users = $this->reportsService->getAllUsers();
        $users = $this->convertRecords->decode($users);

        $pUsers = [];
        foreach ($users as $selectUser){
            foreach ($selectUser as $user){
                $pUsers[] = $user;
            }
        }

        return View::make(
            'pages/reports/usersReport.php', ['users' => $pUsers]
        );
    }

    #[Post('/usersSearch')]
    public function reportApp5(): View
    {
        if (!empty($_POST['user'])){
            $params = $_POST;
        }

        $records = $this->reportsService->getUserRecords($params['user'], $params['from'], $params['to']);
        $records = $this->convertRecords->decode($records);

        $users = $this->reportsService->getAllUsers();
        $users = $this->convertRecords->decode($users);

        $pUsers = [];
        foreach ($users as $selectUser) {
            foreach ($selectUser as $user) {
                $pUsers[] = $user;
            }
        }

        $total = ['charge' => 0];

        foreach ($records as $amount) {
            $total['charge'] += $amount['charge'];
        }

        return View::make(
            'pages/reports/usersReport.php', 
            [
                'users' => $pUsers,
                'records' => $records,
                'chargeTotal' => $total['charge']
            ]);
    }
}