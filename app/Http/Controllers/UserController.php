<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Appointment;
use App\Models\PasswordReset;
use App\Models\Profile;
use Str;
use Mail;
use carbon\Carbon;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        if(Auth::check()){
            return  redirect('dashboard');
        }
        return view('Accounts.register');
    }
    
    public function registerpost(Request $request){
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'confirm'=>'required'
        ]);

        $data['username']=$request->username;
        $data['email']=$request->email;
        $data['password']=$request->password;

        if($data){
            User::create($data);
            return redirect('login')->with('success','Account created successfully');
        }
        else{
            return redirect('register');
        }
        
    }
    public function login(){
        if(Auth::check()){
            return  redirect('dashboard');
        }
        return view('Accounts.login');
    }

    public function loginpost(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $credentials=$request->only('username','password');
        if(Auth::attempt($credentials)){
            return redirect('dashboard');
        }
        else{
            return redirect('login')->with('error','Wrong credentials');
        }
    }
    public function home(){
        return view('dashboard.home');
    }


    public function lab(Appointment $id){
        return view('dashboard.lab',compact('id'));
    }

    public function labpost(Request $request ,Appointment $id){
        $id->testname=$request->name;
        $id->allergies=$request->allergies;
        $id->medication=$request->medication;
        $id->testmethod=$request->method;
        $id->testcost=$request->cost;
        $id->update();
        return redirect('dashboard');
    }

    public function dashboard(){
        $id=Auth::user()->id;
        $username=Auth::user()->username;
        $username=Auth::user()->username;
        $data=Schedule::where('user_id',$id)->get();
        $datas=Schedule::all();
        $row=Appointment::where('doctor',$username)->paginate(5);
        $record=Appointment::where('username',$username)->get();
        // joining two tables
        // $join_data=Appointment::join('schedules','schedules.doctor','=','appointments.doctor')->where('address','kitui')->get(['evening','morning','action','testcost','testmethod']);
        return view('dashboard.dashboard',compact('data','datas','row','record'));
    }



    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login')->with('error','You have been logged out');
    }

    public function book(Schedule $id){
        return view('dashboard.book',compact('id'));
    }


    public function approve(Appointment $id){
        return view('dashboard.approve',compact('id'));
    }

    public function approvepost(Request $request, Appointment $id){
        $request->validate([
            'action'=>'required'
        ]);
        $id->action=$request->action;
        $id->update();
        return redirect('dashboard');
    }

    public function bookpost(Request $request){
        $request->validate([
            'doctor'=>'required',
            'name'=>'required',
            'time'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $data['doctor']=$request->doctor;
        $data['username']=auth()->user()->username;
        $data['name']=$request->name;
        $data['address']=$request->address;
        $data['time']=$request->time;
        $data['email']=$request->email;
        $data['phone']=$request->phone;

        Appointment::create($data);
        return redirect('dashboard');
    }


    public function update( Schedule $id){
        return view('dashboard.update',compact('id'));
    }

    public function updatepost(Request $request,Schedule $id){
        $validated=$request->validate([
            'day'=>'required',
            'early'=>'required',
            'morning'=>'required',
            'afternoon'=>'required',
            'evening'=>'required',
        ]);
        $id->update($validated);
        return redirect('dashboard');
    }

    public function add(){
        return view('dashboard.add');
    }

    public function profile(){
        $id=auth()->user()->id;
        $data=Profile::where('user_id',$id)->get()->first();
        if($data)
            return view('dashboard.profile',compact('data'));
        else{
            return view('dashboard.profiles');
        }
    }

    public function profilepost(Request $request){
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('profileimages',$imagename);
        $data['image']=$imagename;
        $data['user_id']=auth()->user()->id;
        $data['fname']=$request->fname;
        $data['lname']=$request->lname;
        $data['address']=$request->address;
        
        $data['bio']=$request->bio;
        $data['phone']=$request->phone;

        $id=auth()->user()->id;
        $record=Profile::where('user_id',$id)->get()->first();
        if($record){
            $record->update($data);
        }
        else{
            Profile::create($data);
        }

        return redirect('profile');
    }

    public function delete($id){
        $data=Schedule::where('id',$id);
        $data->delete();
        return redirect('dashboard')->with('success','Schedule deleted successfully');
    }

    public function addpost(Request $request){
        $request->validate([
            'day'=>'required',
            'early'=>'required',
            'morning'=>'required',
            'afternoon'=>'required',
            'evening'=>'required',
        ]);
        $data['user_id']=auth()->user()->id;
        $data['doctor']=auth()->user()->username;
        $data['day']=$request->day;
        $data['early']=$request->early;
        $data['morning']=$request->morning;
        $data['afternoon']=$request->afternoon;
        $data['evening']=$request->evening;

        Schedule::create($data);
        return redirect('dashboard')->with('success','Schedule added successfully');
    }

    public function forgot(){
        return view('Accounts.forgot');
    }

    public function forgotpost(Request $request){
        $email=$request->email;
        $record=User::where('email',$email)->get()->first();
        if($record){
            $token=Str::random(200);
            $data['user_id']=$record->id;
            $data['token']=$token;
            $data['created']=Carbon::now();
            $username=$record->username;
            PasswordReset::create($data);
            Mail::to($email)->send(new ResetPassword($token,$username));
            return redirect('forgot')->with('success','Reset link send to your email');
        }
        else{
            return redirect('forgot')->with('error','Email not found try again');
        }
    }
    public function reset($token){
        $record = PasswordReset::where('token', $token)->first();
        if (!$record || Carbon::now()->subMinutes(15) > $record->created) {
            return redirect('forgot')->with('error', 'Your reset token has expired');
        } else {
            return view('Accounts.reset', compact('token'));
        }
    }
    
    public function resetpost(Request $request, $token){
        $record = PasswordReset::where('token', $token)->first();
        if (Carbon::now()->subMinutes(15) > $record->created) {
            return redirect('forgot')->with('error', 'Your reset token has expired');
        }
        else {
        if($request->password != $request->confirm){
            return back()->with('error', 'Password do not match');
        }
        else{
        $id = $record->user_id;
        $user = User::where('id', $id)->first();
        $user->password = $request->password;
        $user->update();
        $record->delete();
        return redirect('login')->with('success', 'Your password has been reset');
        }
    }
    }
    
}
