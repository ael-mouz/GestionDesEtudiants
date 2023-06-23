<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Validator;

class AuthController extends Controller
{
    public function register(Request $request) 
    {    
        $validator = Validator::make($request->all(), [ 
                     'name' => 'required',
                     'email' => 'required|email',
                     'password' => 'required',  
                     'c_password' => 'required|same:password', 
           ]);   
        if ($validator->fails()) 
        {          
            return response()->json(['error'=>$validator->errors()], 401);
        }    
        $existsname = User::where("name", $request->name)->get()->first();
        $existsEmail = User::where("email", $request->email)->get()->first();
        if ($existsEmail || $existsname ) 
        {
            echo $existsname;
            return response()->json(['error'=> "Email or name deja exists."], 401);
        }
        $input = $request->all();  
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input); 
        $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['success'=>$success],200); 
    }
    
    public function login(Request $request)
    { 
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'password' => 'required',  
        ]);   
        if ($validator->fails()) {          
            return response()->json(['error'=>$validator->errors()], 401);  
        }
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('AppName')-> accessToken; 
            return response()->json(['success' => $success],200); 
        } 
        else
        { 
            return response()->json(['error'=>'wrong Credentials'], 401); 
        } 
    }
         
    public function getUser() 
    {
        $user = Auth::user();
        return response()->json(['profile' => $user], 200); 
    }

}
