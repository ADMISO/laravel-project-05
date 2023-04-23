<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session as Sess;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Session;
use Image;
use File;
class StudentController extends Controller
{
    public function dashboard(){
        $id = Sess::get('id');
        $student = Student::find($id);
        return view('student.pages.dashboard',compact('student'));
    }
    public function updateProfile(Request $r){
        $id = Sess::get('id');
        $student = Student::find($id);

        $student->name = $r->name;
        $student->email = $r->email;

        if($r->image!=null){
            $originalImage = $r->file('image');
            //dd($originalImage);
            $thumbnailImage = Image::make($originalImage);

            $thumbnailPath = public_path().'/thumbnail/';
            $originalPath = public_path().'/img/';

            //rename image;
            $temp = $originalImage->getClientOriginalName();
            $temp_ext=(explode(".",$temp));
            $ext = end($temp_ext);
            $filename = time().'.'.$ext;

            $thumbnailImage->save($originalPath.$filename);
            $thumbnailImage->resize(250,250);
            $thumbnailImage->save($thumbnailPath.$filename);

            //rename image
            
            $old_img = $student->image;
            if($old_img!='user.jpg'){
                if(File::exists(public_path('img/'.$old_img))){
                    File::delete(public_path('img/'.$old_img));
                }
                if(File::exists(public_path('thumbnail/'.$old_img))){
                    File::delete(public_path('thumbnail/'.$old_img));
                }
            }

            $student->image=$filename;
        }
        if($student->save()){
            return redirect()->to('student/dashboard');
        }


    }
}
