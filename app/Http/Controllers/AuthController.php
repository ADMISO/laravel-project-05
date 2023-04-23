<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
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
        else{
            $student = Student::where('email','=',$email)
                        ->where('password','=',$password)
                        ->first();
            if($student){
                Session::put('role','Student');
                Session::put('id',$student['id']);
                Session::put('image',$student['image']);
                return redirect()->to('/student/dashboard');
            }
            else{
                
                $teacher = Teacher::where('email','=',$email)
                            ->where('password','=',$password)
                            ->first();
                if($teacher){
                    Session::put('role','Teacher');
                    Session::put('id',$teacher['id']);
                    Session::put('image',$teacher['image']);
                    return redirect()->to('/teacher/dashboard');
                }
                else{
                    return redirect()->back()->with('info','account with this info does not exists');
                   
                }
    
            }

        }


    }
}
