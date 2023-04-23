<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Session;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.pages.dashboard');
    }
    public function checkForm(){
        //echo "forms";
        return view('admin.pages.forms');
    }
    public function checkTable(){
        return view('admin.pages.tables');
    }
    public function createTeacher(){
        return view('admin.pages.createTeacher');
    }
    public function createStudent(){
        return view('admin.pages.createStudent');
    }
    public function createSession(){
        return view('admin.pages.createSession');
    }
    public function storeTeacher(Request $r){
        $name = $r->name;
        $email = $r->email;
        $password = $r->password;
        $teacher = Teacher::where('email','=',$email)->first();
        if($teacher){
            return redirect()->back()->with('err','email already exists');
        }
        else{
            $teacher = new Teacher();
            $teacher->name = $name;
            $teacher->email = $email;
            $teacher->password = md5($password);
            $teacher->image = 'user.jpg';
            if($teacher->save()){
                return redirect()->back()->with('info','teacher created successfully');
            }
        }
    }
    public function storeStudent(Request $r){
        $name = $r->name;
        $email = $r->email;
        $password = $r->password;
        $teacher = Student::where('email','=',$email)->first();
        if($teacher){
            return redirect()->back()->with('err','email already exists');
        }
        else{
            $teacher = new Student();
            $teacher->name = $name;
            $teacher->email = $email;
            $teacher->password = md5($password);
            $teacher->image = 'user.jpg';
            if($teacher->save()){
                return redirect()->back()->with('info','student created successfully');
            }
        }
    }

    public function storeSession(Request $r){
        $session = Session::where('name','=',$r->name)->first();
        if($session){
            return redirect()->back()->with('err','session already exists');
        }
        else{
            $session = new Session();
            $session->name = $r->name;
            $session->status = 1;
            if($session->save()){
                return redirect()->back()->with('info','sesssion created successfully');
            }
        }

    }

    public function allTeachers(){
        $users = Teacher::all();
        return view('admin.pages.allTeachers',compact('users'));
    }
    public function allStudents(){
        $users = Student::all();
        return view('admin.pages.allStudents',compact('users'));
    }
    public function allSessions(){
        $users = Session::all();
        return view('admin.pages.allSessions',compact('users'));
    }

    public function editTeacher($id) {
        
        $u = Teacher::find($id);
        return view('admin.pages.editTeacher',compact('u'));
    } 
    public function updateTeacher($id, Request $r){
        $teacher = Teacher::find($id);
        $name = $r->name;
        $email = $r->email;
        $t= Teacher::where('email','=',$email)->first();
        if($teacher->email != $email && $t){
            return redirect()->back()->with('err','email already exists');
        }
        else{
            $teacher->name = $name;
            $teacher->email = $email;
            if($teacher->save()){
                return redirect()->back()->with('info','teacher edited successfully');
            }
        }
    }
    public function deleteTeacher($id) {
        $teacher = Teacher::find($id);
        if(!is_null($teacher)){
            $teacher->delete();
            return redirect()->back()->with('scs','teacher deleted successfully');
        }
    }


    public function editStudent($id) {
        $u = Student::find($id);
        return view('admin.pages.editStudent',compact('u'));
    }
    public function updateStudent($id, Request $r){
        $student = Student::find($id);
        $name = $r->name;
        $email = $r->email;
        $s= Student::where('email','=',$email)->first();
        if($student->email != $email && $s){
            return redirect()->back()->with('err','email already exists');
        }
        else{
            $student->name = $name;
            $student->email = $email;
            if($student->save()){
                return redirect()->back()->with('info','student edited successfully');
            }
        }
    }
    public function deleteStudent($id) {
        $student = Student::find($id);
        if(!is_null($student)){
            $student->delete();
            return redirect()->back()->with('scs','student deleted successfully');
        }
    }
    public function updateSession($id){
        $session = Session::find($id);
        if($session->status == 0){
            $session->status = 1;
        }
        else{
            $session->status = 0;
        }
        if($session->save()){
            return redirect()->to('admin/all-sessions');
        }
    }

}
