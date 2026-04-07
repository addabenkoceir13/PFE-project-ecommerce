<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

