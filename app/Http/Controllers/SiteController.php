<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdviceComplaint;
use Illuminate\Support\Facades\Validator;
use App\Models\Acceptance;

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


   public function leykoz(){
        return view('site.leykoz');
   }

   public function uafa(){
        return view('site.uafa');
   }
   public function yardimeli(){
        return view('site.yardimeli');
   }

   public function postkart(){
        return view('site.postkart');
   }
   public function explus(){
        return view('site.explus');
   }
   public function edukart(){
        return view('site.edukart');
   }
   public function covid(){
        return view('site.covid');
   }
   public function contactless(){
        return view('site.contactless');
   }
   public function multiform(){
        return view('site.multiform');
   }

   public function shorttime(){
        return view('site.shorttime');
   }

   public function postexapp(){
        return view('site.postexapp');
   }
   public function calculator(){
        return view('site.calculator');
   }
   public function ecommerce(){
        return view('site.ecommerce');
   }










   public function check_tracking(Request $request){
      
     $id=$request->id;     
    
     if ($request->isMethod('get')) {
         
          $data['acceptance'] = Acceptance::orderBy('id','desc')->where('tracking_id',$id)->first(); 
          if(!empty($data['acceptance'])){
          return view('site.tracking',$data);
     }else{
          abort(404);
     }
     }    

     $validator = Validator::make($request->all(), [
          
          "tracking" => "required",
      ]);
  

      if($validator->fails()) {
          return response()->json(["message" => 'Xana düzgün dolmayıb',"errors" => $validator->errors()], 400);
      }
      $inputs = $request->all();

      $data = Acceptance::where('tracking_id',$inputs)->first();

      if(!empty($data)) {
     
      }
      else{
          return response()->json(["message" => 'İzləmə kodu səhvdir',"errors" => $validator->errors()], 400);
      }


   }


   public function trackingpost(Request $request)
   { 
        
     $id=$request->id;
    
     if ($request->ajax()) {

          $item  = Acceptance::where('id',$id)->orderBy('id','desc')->first(); 
          return response()->json($item);
      }
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

      if($validator->fails()) {
          return response()->json(["message" => 'Xanaları doldurun',"errors" => $validator->errors()], 400);
      }


      $inputs = $request->all();

      $data = AdviceComplaint::create($inputs);

      if(!is_null($data)) {
          return response()->json(["message" => "Sorğunuz uğurla qeydə alındı"], 200);
      }


   }
}

