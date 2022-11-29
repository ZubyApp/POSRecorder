<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Capsule\Manager as Capsule;
use App\Abstracts\Eloquentdb;
use App\Helpers\ConvertRecords;
use App\Models\Posusers;
use Valitron\Validator;

class AuthenticationService extends Eloquentdb
{
    public function __construct(private Posusers $posusers, private ConvertRecords $convertRecords)
    {
        parent::__construct();
    }

    public function createNewUser()
    {
        if (isset($_POST['submit']))
            $userDetails = $_POST;

        $v = new Validator($userDetails);
        $v->rule('required', ['username', 'email', 'password', 'conpassword']);
        $v->rule('email', 'email');
        $v->rule('equals', 'conpassword', 'password')->label('');
        $v->rule(
            fn ($field, $value, $params, $fields) => !$this->posusers->where(
                ['email' => $value],
            )->count(),
            'email'
            )->message('Email already exists');
        

        if ($v->validate()) {
        echo 'All good';
        }else {$_SESSION['errors'] = $v->errors();
        \header('Location: /register');
        exit;
        }

        $userTable              = new Posusers();
        $userTable->username    = $userDetails['username'];
        $userTable->email       = $userDetails['email'];
        $userTable->password    = $userDetails['password'];
        $userTable->pos_vendor  = $userDetails['vendors'];

        $userTable->save();

        $_SESSION['message'] = 'Succesful!, Please login';

        \header('Location: /login');
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authenticate = Capsule::table('posusers')->select()
            ->where('email', $email)
            ->where('password', $password)
            ->get()
            ->toArray();

        if (\count($authenticate) == 0 ) {
            $_SESSION['message'] = 'Invalid username or password!';

            \header('Location: /login');
        } else {
            $authenticate = $this->convertRecords->decode($authenticate);
            
            $_SESSION['username'] = $authenticate[0]['username'];
            
            \header('Location: /');
        }
    }
}
