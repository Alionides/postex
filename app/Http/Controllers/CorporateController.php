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

    // public function index(Request $request)
    // {
    //     $data['books'] = Acceptance::orderBy('id','desc')->paginate(5);
        
    //     return view('corporate.index',$data);
    // }





    public function index()
    {
        $data['acceptance'] = Acceptance::orderBy('id','desc')->paginate(5);   
        return view('corporate.index',$data);
    }
    
  
    public function GetJsonAcceptance(Request $request)
    {   
        $where = array('id' => $request->id);
        $item  = Acceptance::where($where)->first(); 
        return response()->json($item);
    }
 
   
}
