<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:8',
            'password_confirmation' => 'required|min:5|max:8|same:password',

        ]);

$admin=new Admin;
$admin->name=$request->name;
$admin->email=$request->email;
$admin->password= Hash::make($request->password);
$save=$admin->save();
if($save){
    return back()->with('succsess', "New user had been added");
}else{
    return back()->with('fail', 'Something want wrong plz try again later');

}


    }
    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:8'

        ]);
       $userInfo=Admin::where( 'email','=', $request->email)->first();
if(!$userInfo){
    return back()->with('fail','We do not have an email in that name');
}else{
    if(Hash::check($request->password, $userInfo->password)){
        $request->session()->put('loggedUser',$userInfo->id);
        return redirect('master');
    }else{
    return back()->with('fail','The password is incorect');

    }
}

    }
    function logout(){
        if(session()->has('loggedUser')){
            session()->pull('loggedUser');
        }
        return redirect('auth/login');

    }
    function master(){
        return view('master');
    }


}
