<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
//        User::find(1)->update(
//          [
//              'password'=>bcrypt('123456')
//          ]
//        );
        $validData=$this->validate($request,[
           'email'=>'required|exists:users',
           'password'=>'required'
        ]);
      if(Auth::attempt($validData)){
          //if(Auth::user()->isAdmin()) return "admin";
          return response([
              'data'=>'logined',
              'status'=>'success'
          ],200);
      };
        return response([
            'data'=>'not logined',
            'status'=>'error'
        ],Response::HTTP_UNAUTHORIZED);


    }
}
