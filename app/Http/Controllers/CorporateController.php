<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorporateController extends Controller
{
    //

    public function index()
    {
        return view('corporate.index');
    }
}
