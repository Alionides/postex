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
   public function user() {
       return view('individual.index');
   }   
   public function shippingsender() {
       return view('users.pages.shippingsender');
   }   
   
   public function register() {
       return view('customer.register');
   }   
   public function corporateregister() {
       return view('customer.corporateregister');
   }   
}

