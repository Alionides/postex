<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acceptance;

class AcceptancesController extends Controller
{
    public function index(Request $request){
       
        $acceptance_id=$request->id;

        $data['acceptance'] = Acceptance::orderBy('id','desc')->where('id',$acceptance_id)->paginate(20);   
      
        return view('vendor.voyager.acceptances.print',$data);
    }
}
