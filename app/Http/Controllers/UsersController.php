<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Validator;

class UsersController extends Controller
{
    /**
     * Register a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration(Request $request)
    {
        //validation for registration
        $validation = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
        ]);
        if($validation->fails()){
            Log::channel('controllers')->error('Failed to create user because of missing parameters');
            return response()->json($validation->errors(),202);
        }

        $registrationData = $request->all();
        $registrationData['password'] = Hash::make($registrationData['password']);//secure password

        $user = User::create($registrationData);
        //log successful creation of the entity

        //craft api response
        $resArr = [];
        $resArr['token']=$user->createToken('api-application')->accessToken;
        $resArr['name']=$user->name;

        return response()->json($resArr, 200);

    }

      /**
     * Login a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //authenticate the user
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user = Auth::user();
            //craft api response
            $resArr = [];
            $resArr['token']=$user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name;
            return response()->json($resArr, 200);
        }else{
            return response()->json(['error'=>'Unauthorisied Access'], 203);
        }
    }

 
}
