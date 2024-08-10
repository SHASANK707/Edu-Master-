<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Demomail;

class MailController extends Controller
{
    //
    public function index(){
        $mailData = [
            'title'=> 'Mail from Shashank',
            'body'=> 'This is for testing email using smtp',
            'student' => [
            'name' => 'John Doe',
            'id' => '12345',
            'email' => 'john.doe@example.com'
        ]
        ];
        Mail::to('shashank.pandey9657@gmail.com')->send(new Demomail($mailData));
        dd('Email send successfully');
    }

}
