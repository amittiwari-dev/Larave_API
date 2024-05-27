<?php

namespace App\Http\Controllers;
//use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\register;
use App\Models\user;
use Illuminate\Support\Facades\Validator;

class ApiDataController extends Controller
{
    public function showRecords(Request $req)
    {
        $users = DB::table('users')->whereBetween('Date', [$req->startDate, $req->endDate])
        ->get();
        if ($users->isEmpty()) {
            return response()->json([
                'code' => 500,
                'message' => 'Records not Found',
                'status' => false,
                'error' => true,
                'data' => []
            ]);
        } else {
            return response()->json([
                'code' => 200,
                'message' => ' Data Found Successfully',
                'status' => true,
                'error' => false,
                'data' => $users
            ]);
        }
    }


    // User Register Method
    public function register(Request $req)
    {
        $user=register::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'country'=>$req->country,
            'password'=>Hash::make($req->password),
        ]);
        if($user){
            return response()->json([
                'code' => 200,
                'message' => 'Records Added Successfully',
                'status' => true,
                'error' => false,
              
            ]);
        }
        else
        {
            return response()->json([
                'code' => 201,
                'message' => 'Records not added',
                'status' => false,
                'error' => true,
               
            ]);
        }
    }

    //User Login Method
    public function login(Request $req)
    {
        
       


        $result=Register::where('email',$req->email)->first();  // checking email is exists  or not
        if($result)
        {
           if(Hash::check($req->password,$result->password))  // checking password
           {
                $token  = $result->createToken('auth_token')->plainTextToken;
                return  response()->json([
                    'code'=>200,
                    'message'=>'Login Successfully...',
                    'status'=>true,
                    'error'=>false,
                    'token'=>$token,
                ]);
           }
           else
           {
            return  response()->json([
                'code'=>201,
                'message'=>'Wrong Password...',
                'status'=>false,
                'error'=>true,
                
            ]);
           }
        }
        else
        {
            return  response()->json([
                'code'=>201,
                'message'=>' Email or password invalid...',
                'status'=>false,
                'error'=>true,
                
            ]);
        }
    }

  

}
