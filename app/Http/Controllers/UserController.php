<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Filters\UserFilters;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request, UserFilters $filters)
    {
        if($request->has('search')) {
            $users = User::search($request->search)->paginate($request->input('perPage', 10));
        }else{
            $users = User::where('role', 'recruiter')->filter($filters)->paginate($request->input('perPage', 10));
        }

        return UserResource::collection($users);
    }

    public function login(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["error" => "Failed! Email not found"], 404);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;

            return response()->json(["login" => true, "token" => $token, "data" => $user]);
        } else {
            return response()->json(["error" => "Whoops! invalid password"], 401);
        }
    }
    
    public function user() 
    {
        $user = Auth::user();
        return new UserResource($user);

        if(!is_null($user)) {
            return new UserResource($user);
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

        if( User::where("email", $request->email)->count() ) {
            return response()->json(["message" => "User already exists!"], 400);
        }

        $user = User::create($inputs);

        if(!is_null($user)) {
            return new UserResource($user);
        } else {
            return response()->json(["message" => "User creation failed!"], 500);
        }
    }

    public function show(User $user)
    {
        return new UserResource($user);
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
