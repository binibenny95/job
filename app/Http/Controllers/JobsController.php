<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobsController extends Controller
{
    // Fetch all the jobs

    public function index() {
        $jobs = DB::table('job')->orderBy('created_at','DESC')->get();
       // dd($jobs);
        return view('front.job.jobs', [
           'jobs' => $jobs,
        ]);
    }

    public function detail($id) {
        $job = DB::table('job')->where('id',$id)->first();
        if($job == null) {
            abort(404);
        }
       return view('front.job.jobDetails',['job' => $job]);
    }
}
