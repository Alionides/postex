<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
   public function index(){
        return view('site.index');
   }

   public function campaigns(){
        return view('site.campaigns');
   }

   public function onlineservices(){
        return view('site.online_services');
   }

   public function tariffs(){
        return view('site.tariffs');
   }

   public function branches(){
        return view('site.branches');
   }
  
   public function internaldelivery(){
        return view('site.internal_delivery');
   }

   public function getfromdoor(){
        return view('site.get_fromdoor');
   }

   public function deliveryoffices(){
        return view('site.delivery_offices');
   }

   public function aboutus(){
        return view('site.aboutus');
   }
}

