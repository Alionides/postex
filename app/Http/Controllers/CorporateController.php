<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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

    public function index(Request $request)
    {
        return view('corporate.index');
    }
}
