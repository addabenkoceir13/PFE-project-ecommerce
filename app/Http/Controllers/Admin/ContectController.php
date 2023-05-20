<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;

// use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;


class ContectController extends Controller
{
    public function index()
    {
        return view('contect');
    }

    public function send(Request $request)
    {

    }

}

