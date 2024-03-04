<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
 //This method will list all users 

  public function index()
  {
    //$users = DB::table('user')->get();
   // return json_encode($users);
   return view('front.home');
  }

  // list all jobs

  // public function listJobs()
  // {
  //   $jobs = DB::table('job')->get();
  //   return json_encode($jobs);
  // }

}
