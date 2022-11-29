<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Abstracts\Eloquentdb;
use App\Attributes\Get;
use App\Attributes\Post;
use App\Helpers\ConvertRecords;
use App\View;
use Illuminate\Database\Capsule\Manager as Capsule;

class EditController extends Eloquentdb
{
    private static array $refurl = [];

    public function __construct(private ConvertRecords $convertRecords)
    {
        parent::__construct();
    }

    // Editing and updating records
    #[Get('/editRecord')]
    public function editRecord(): View
    {
        $record = $_GET;

        $_SESSION['referer'] = $_SERVER['HTTP_REFERER'];

        $forEditing = Capsule::table('pos_records')->select()->where('id', $record['id'])->get()->toArray();

        $forEditing = $this->convertRecords->decode($forEditing);


        return View::make('pages/record/edit.php', ['records' => $forEditing]);
    }

    #[Post('/updateRecord')]
    public function updateRecord()
    {
        $record = $_POST;

        if ($record['charge'] === '') {
            $record['charge'] = '0';
        }

        Capsule::table('pos_records')->where('id', $record['id'])
                ->update([
                    'amount'        => $record['amount'],
                    'amount_type'   => $record['amount_type'],
                    'charge'        => $record['charge'],
                    'charge_type'   => $record['charge_type'],
                    'date'          => $record['date'],
                    'user'          => $_SESSION['username'],
                ]);
                
            //\header('HTTP/1.1 307 Temporary Redirect');
            $referer = $_SESSION['referer'];
            unset($_SESSION['referer']);

            if (! \str_contains($referer, '?')){
            \header('Location: ' . $referer . '?&id=' . $record['id']);
            } else{
            //\var_dump($_SESSION['referer'] . '&id=' . $record['id']); exit;
            \header('Location: ' . $referer);}
    }

    // Editing and updating Extra Records
    #[Get('/editExtra')]
    public function editExtra(): View
    {
        $record = $_GET['id'];


        $forEditing = Capsule::table('extras')->select()->where('id', $record)->get()->toArray();

        $forEditing = $this->convertRecords->decode($forEditing);

        return View::make('pages/extra/edit.php',
            ['records' => $forEditing]
        );
    }

    #[Post('/updateExtra')]
    public function updateExtra()
    {
        $record = $_POST;

        Capsule::table('extras')->where('id', $record['id'])
            ->update([
            'date'       => $record['date'],
            'ewallet'    => $record['ewallet'],
            'bankbal'    => $record['bankbal'],
            'cashbal'    => $record['cashbal'],
            'grosstotal' => $record['gtotal'],
            'profit'     => $record['profit'],
            'dprofit'    => $record['dprofit'],
            'nrcapital'  => $record['nrcapital'],
            'user'  => $_SESSION['username'],
                
            ]);
        \header('Location: /extrasReport?=extraRecord updated');
    }
}