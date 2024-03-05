<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
 //This method will list all users 

  public function index()
  {
    
      $jobs = DB::table('job')->get();
      return view('front.home',[
        'jobs' => $jobs,
        'userArray' =>collect(),
      ]);
     
  
  }

}