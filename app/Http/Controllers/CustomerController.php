<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;
use App\Models\CorporateRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\CustomerResource;
use App\Filters\UserFilters;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(User::class, 'user');
    // }

    public function index(Request $request, UserFilters $filters)
    {
        if($request->has('search')) {
            $users = Customer::search($request->search)->paginate($request->input('perPage', 10));
        }else{
            $users = Customer::where('role', 'recruiter')->filter($filters)->paginate($request->input('perPage', 10));
        }

        return CustomerResource::collection($users);
    }

    public function login_corporate(Request $request) 
    {
        if ($request->isMethod('get')) {
            return view('customer.login_corporate');
        }

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

         $user = Customer::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["error" => "Failed! Email not found"], 404);
        }
        
        
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::guard('customer')->user();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(["login" => true, "token" => $token, "data" => $user], 200);
        } else {
            return response()->json(["error" => "Whoops! invalid password"], 401);
        }
    }

    public function login_individual(Request $request) 
    {

        if ($request->isMethod('get')) {
            return view('customer.login_individual');
        }

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

         $user = Customer::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["error" => "Failed! Email not found"], 404);
        }
        
        
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::guard('customer')->user();
            $token = $user->createToken('token')->plainTextToken;            
            return response()->json(["login" => true, "token" => $token, "data" => $user], 200);
        } else {
            return response()->json(["error" => "Whoops! invalid password"], 401);
        }
    }

    public function register_individual(Request $request){
        if ($request->isMethod('get')) {
            return view('customer.register_individual');
        }
    }
    public function register_corporate(Request $request){

        if ($request->isMethod('get')) {
            return view('customer.register_corporate');
        }
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "first_name" => "required",
            "last_name" => "required",
            "phone" => "required",
            "corp_type" => "required",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => 'Xanaları doldurun',"errors" => $validator->errors()], 400);
        }

        $inputs = $request->all();

        if( Customer::where("email", $request->email)->count() ) {
            return response()->json(["message" => "User already exists!"], 400);
        }

        $user = Customer::create($inputs);

        if(!is_null($user)) {
            return new CustomerResource($user);
        } else {
            return response()->json(["message" => "User creation failed!"], 500);
        }
    }

    public function logout(Request $request)
    {
        if(Auth::guard('customer')->check())
        {
            Auth::guard('customer')->logout();            
        }
        return response()->json(["logout" => true]);
    }
    
    public function customer() 
    {
        $user = Auth::user();
        return new CustomerResource($user);

        if(!is_null($user)) {
            return new CustomerResource($user);
        } else {
            return response()->json(["message" => "Whoops! no user found"]);
        }        
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required|confirmed|min:6",
            "first_name" => "required",
            "last_name" => "required",
            "dob" => "date_format:Y-m-d",
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        $inputs = $request->all();
        $inputs["password"] = Hash::make($request->password);

        if( Customer::where("email", $request->email)->count() ) {
            return response()->json(["message" => "User already exists!"], 400);
        }

        $user = Customer::create($inputs);

        if(!is_null($user)) {
            return new CustomerResource($user);
        } else {
            return response()->json(["message" => "User creation failed!"], 500);
        }
    }

    public function show(User $user)
    {
        return new CustomerResource($user);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "password" => "confirmed|min:6",
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        $inputs = $request->all();

        if(!empty($request->password)) {
            $inputs["password"] = Hash::make($request->password);
        } else {
            unset($inputs["password"]);
        }

        try {
            $user->update($inputs);
        } catch (Exception $e) {
            return $e->getMessage();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }

        return new UserResource($user);
    }

    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();
        } catch (Exception $e) {
            return $e->getMessage();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }

        return new UserResource($user);
    }
}
