<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Services\RecorderService;
use App\View;
use Carbon\Carbon;

class RecordController
{
    public function __construct(private readonly RecorderService $recorderService)
    {
    }

    // #[Post('/')]
    // public function index2()
    // {
    //     //$this->recorderService->record();

    //     //\header('Location: /record');
    // }

    #[Get('/recordOptions')]
    public function recApp(): View
    {
        return View::make('pages/record/recordOptions.php');
    }

    #[Get('/record')]
    public function recApp1(): View
    {
        if (isset($_GET['date'])){
            $useDate = $_GET['date'];
        }

        $useDate = (new Carbon())->format('Y-m-d');

        $records = $this->recorderService->getRecord($useDate);

        return View::make('pages/record/record.php', [
            'records'    => $records,
            'date'       => $useDate
        ]);
    }

    #[Post('/record')]
    public function recApp2(): Void
    {
        $useDate = (new Carbon())->format('Y-m-d');

        $this->recorderService->record($useDate);

        // $records = $this->recorderService->getRecord($useDate);

        // return View::make('pages/record/record.php', [
        //     'records'    => $records,
        //     'date'       => $useDate
        // ]);
        

        \header('Location: /record');
    }

    #[Get('/prevRecord')]
    public function recApp3(): View
    {
        if (isset($_GET)){
        $postDate = $_GET['date'];
        } elseif (isset($date)) {
            $postDate = $date;
        }

        $records = $this->recorderService->getRecord($postDate);

        return View::make('pages/record/prevRecord.php', [
            'records'    => $records,
            'date'       => $postDate,
        ]);
    }

    #[Post('/prevRecord')]
    public function recApp4(): void
    {
        $useDate = $_POST['date'];

        $this->recorderService->record($useDate);

        // $records = $this->recorderService->getRecord($useDate);

        $useDate;

        \header('Location: /prevRecord?date=' . $useDate);

        // return View::make('pages/record/prevRecord.php', [
        //     'records'    => $records,
        //     'date'       => $useDate,
        // ]);
    }
}
