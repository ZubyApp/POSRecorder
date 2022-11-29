<?php

declare(strict_types = 1);

namespace App\Services;

use App\Abstracts\Eloquentdb;
use App\Controllers\TotalsController;
use App\Models\Totals;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;

class TotalsService extends Eloquentdb
{
    public function __construct()
    {
        parent::__construct();
    }

    public function inputTotals()
    {
        if (isset($_POST['submit'])) {
            $postedDate = $_POST['date'];

            // if ($postedDate == \null) {
            //     $postedDate = (new Carbon())->format("d/M/Y");
            // }
            
            $savedDates = (new Totals())->select('date')->where('date', $postedDate)->get()->toArray();

            if (\count($savedDates) > 0) {
                $date = $postedDate;

                $link = "<a style='color: black; text-decoration: underline;' href='/dailybalance'>here</a>";

                $_SESSION['message'] = 'Date has already been balanced. To view, click ' . $link;

            //\header('HTTP/1.1 307 Temporary Redirect');
            \header("Location: /balancing?date= " . $date);
            exit;
                } else {

            $totals = $_POST;

            $posTotals = new Totals();

            $posTotals->withdrawals = $totals['withdrawals'];
            $posTotals->date = $postedDate;
            $posTotals->transfers = $totals['transfers'];
            $posTotals->airtime = $totals['airtime'];
            $posTotals->electricity = $totals['electricity'];
            $posTotals->cabletv = $totals['cabletv'];
            $posTotals->cashcharge = $totals['cashcharge'];
            $posTotals->openingbal = $totals['openingbal'];
            $posTotals->exclosingbal = $totals['exclosingbal'];
            $posTotals->actclosingbal = $totals['actclosingbal'];
            $posTotals->difference = $totals['difference'];
            $posTotals->electcharge = $totals['electcharge'];
            $posTotals->user = $_SESSION['username'];

            $posTotals->save();

            (new TotalsController)->goTo();
            }
            
        }
    }

    public static function getTotals(string|int $month = null, string $year = null)
    {
        if ($month === null && $year === null){
            $month = \date('m');
            $year  = \date('Y');
        }

        return Capsule::table('totals')
            ->select()
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->latest('date')
            ->get()
            ->toArray();
    }

    public function getSearchedTotals(string $from = null, string $to = null)
    {
        return Capsule::table('totals')
            ->select()
            ->whereBetween('date', [$from, $to])
            ->latest('date')
            ->get()
            ->toArray();
    }
}