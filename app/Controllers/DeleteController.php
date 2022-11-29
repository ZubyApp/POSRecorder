<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Abstracts\Eloquentdb;
use App\Attributes\Get;
use App\Helpers\ConvertRecords;
use App\View;
use Illuminate\Database\Capsule\Manager as Capsule;

class DeleteController extends Eloquentdb
{
    public function __construct(private ConvertRecords $convertRecords)
    {
        parent::__construct();
    }

    #[Get('/confirmDeletion')]
    public function confirmDeletion() : View
    {
        $recordId = $_GET['id'];

        $forDeletion = Capsule::table('pos_records')->select()->where('id', $recordId)->get()->toArray();

        $forDeletion = $this->convertRecords->decode($forDeletion);

        $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

        return View::make('pages/record/deletion.php', ['records' => $forDeletion]);

    }

    #[Get('/deleteRecord')]
    public function deleteRecord()
    {
        $recordId = $_GET['id'];

        $referer = $_SESSION['referer'];

        unset($_SESSION['referer']);

        Capsule::table('pos_records')->delete($recordId);

        $_SESSION['message'] = 'Record deleted';

        \header('Location: ' . $referer );
    }

    #[Get('/confirmDeletionTotals')]
    public function confirmDeletionTotals(): View
    {
        $recordId = $_GET['id'];

        $forDeletion = Capsule::table('totals')->select()->where('id', $recordId)->get()->toArray();

        $forDeletion = $this->convertRecords->decode($forDeletion);

        $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

        return View::make('pages/reports/deletion.php', ['savedBals' => $forDeletion]);
    }

    #[Get('/deleteTotals')]
    public function deleteTotals()
    {
        $recordId = $_GET['id'];

        $referer = $_SESSION['referer'];

        unset($_SESSION['referer']);

        Capsule::table('totals')->delete($recordId);

        \header('Location: ' . $referer);
    }

    #[Get('/confirmDeletionExtras')]
    public function confirmDeletionExtras(): View
    {
        $recordId = $_GET['id'];

        $forDeletion = Capsule::table('extras')->select()->where('id', $recordId)->get()->toArray();

        $forDeletion = $this->convertRecords->decode($forDeletion);

        $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

        return View::make('pages/extra/deletion.php', ['extra' => $forDeletion]);
    }

    #[Get('/deleteExtra')]
    public function deleteExtra()
    {
        $record = $_GET['id'];

        $referer = $_SESSION['referer'];

        unset($_SESSION['referer']);

        Capsule::table('extras')->delete($record);

        \header('Location: ' . $referer);
    }
}