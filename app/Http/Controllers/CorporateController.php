<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Acceptance;

class CorporateController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        $this->middleware(function ($request, $next) {
            if(Auth::guard('customer')->user()->is_corp !== 'corporate')
            {
                return abort(404);
            }
            else
            {
                return $next($request);
            }
        });
    }

   


    public function index()
    {
        $customer_id=Auth::guard('customer')->user()->fin;
        $data['acceptance'] = Acceptance::orderBy('id','desc')->where('sender_fin',$customer_id)->paginate(20);   
        return view('corporate.index',$data);
    }
    
  
    public function getjsonacceptance(Request $request)
    {   
        $where = array('id' => $request->id);
        $item  = Acceptance::where($where)->with('locations_receiver','locations_sender')->first(); 
        return response()->json($item);
    }
 

    public function wherecargo(Request $request)
    {

        $id=$request->id;

        $data['acceptance'] = Acceptance::orderBy('id','desc')->where('id',$id)->paginate(20); 
        
        if ($request->ajax()) {

            $item  = Acceptance::where('id',$id)->orderBy('id','desc')->first(); 
            return response()->json($item);
        }

        return view('corporate.wherecargo',$data);
    }  
  
   
}
