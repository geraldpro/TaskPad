<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;



class UserController extends Controller{

 /*
    |--------------------------------------------------------------------------
    | UserController
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users.
    |
    */

//Get user login page
 public function getLogin(){

   return view('auth.login');
}


// Get user registration page
public function getRegister(){

   return view('auth.register');

}

// Register new user
public function store(Request $request){

//get data input from a user
$data = $request->all();

$user = new User;
$validator = Validator::make($data, [
'name' => 'required',
'email' => 'required|unique:users',
'password' => 'required|min:6',


]);


//validate user input using set rules

if($validator->passes()){

	$data['password'] = bcrypt($data['password']);
	$user->fill($data);
	$user->save();

	return redirect('auth/login')->with('status', 'You have successfully registered. You may now login.');
}

}

// Login authenticated user
public function authenticate(Request $request){

  //authenticate input parameters
	  $data = $request->all();

    if(Auth::attempt(array('email'=>$data['email'], 'password'=>$data['password']))){

     $user = Auth::user();
     $user->save();
     return redirect('tasks');


    }

    return redirect('auth/login')->With('info','Invalid Login details, Please try again');



}

//test case
public function authenticate(Request $request){
//dd($request->all());
  //authenticate input parameters
	  $data = $request->all();

    if(Auth::attempt(array('email'=>$data['email'], 'password'=>$data['password']))){
      $admin = Auth::admin();
      $admin->save();
      return redirect('/');
    }

    return redirect('alogin')->With('info','Invalid Login details, Please try again');
}




// Logout a user
public function logout(){

 Auth::logout();
 return redirect('/');

}




}
