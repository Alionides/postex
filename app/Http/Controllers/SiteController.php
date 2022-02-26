<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdviceComplaint;
use Illuminate\Support\Facades\Validator;

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

   public function advice_complaint(Request $request){
        
     if ($request->isMethod('get')) {
     return view('site.advice_complaint');
     }

     $validator = Validator::make($request->all(), [
          
          "first_name" => "required",
          "last_name" => "required",
          "email" => "required|email",
          "phone" => "required",
          "tracking_id" => "required",
          "notes" => "required",
      ]);

      $inputs = $request->all();

      $data = AdviceComplaint::create($inputs);

      if(!is_null($data)) {
          return response()->json(["message" => "Sorğunuz uğurla qeydə alındı"], 200);
      }


   }
}

