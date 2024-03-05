<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // THis methos will show user registration page
    public function registration() {
       return view('front.account.registraion');
    }

    //save the user
    public function processRegistration(Request $request) {
        $validator = Validator::make($request->all(),[
           'name' => 'required',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|min:5|same:confirm_password',
           'confirm_password' => 'required',
        ]);

        if($validator->passes()) {
              
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($user->password);
            $user->save();

            session()->flash('success', 'you have registered successfully');
            return response()->json([
                'status' => true,
                'errors' => [],
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    //This method will show user registraion page
    public function login() {
         return view('front.account.login');
    }

    public function authenticate(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'email' =>'required',
            'password' =>  'required'
        ]);

        if($validator->passes()) {

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                 return redirect()->route();
            } else {
                return redirect()->route('account.login')->with('error','Either Email/password is incorrect');
            }

        } else {
            return redirect()->route('account.login')
              ->withErrors($validator)
              ->withInput($request->only('email'));
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('account.login');
    }

   
}
