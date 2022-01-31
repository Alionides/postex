<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function index(){
        return view('site.index');
    }
   public function login() {
       return view('auth.login');
   }   
}
