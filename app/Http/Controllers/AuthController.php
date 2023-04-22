<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;
class AuthController extends Controller
{
    public function logout(){
        Session::forget('id');
        Session::forget('role');

        return redirect()->to('/');
    }

    public function login(){
        return view ('login');
    }
    public function storeLogin(Request $r){
        $email = $r->email;
        $password = md5($r->password);
        $admin = Admin::where('email','=',$email)
                      ->where('password','=',$password)
                      ->first();
        if($admin){
            Session::put('role','Admin');
            Session::put('id',$admin['id']);
            return redirect()->to('/admin/dashboard');
        }


    }
}
