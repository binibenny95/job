<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    // Fetch all the jobs

    public function index() {
        $jobs = DB::table('job')->orderBy('created_at','DESC')->get();
       // dd($jobs);
        return view('front.job.jobs', [
           'jobs' => $jobs,
           'userArray' => collect(),
        ]);
    }

    public function detail($id) {
       
        $job = DB::table('job')->where('id',$id)->first();
        if($job == null) {
            abort(404);
        }
       return view('front.job.jobDetails',['job' => $job,'userArray' =>collect(),]);
    }

    public function saveJob(Request $request){
        
        $savedjob = DB::table('fav_job')->where(['user_id'=> $request->userId,  'job_id' => $request->jobid])->count();
        if($savedjob > 0){
         session()->flash('error','you already applied');
        } else {
            DB::table('fav_job')->insert(['user_id' => $request->userId , 'job_id' => $request->jobid]);
            return view('front.job.jobDetails',['job' => collect(),'userArray' =>collect(),]);
        }
       
    }
}
