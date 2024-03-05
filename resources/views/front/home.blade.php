@extends('front.layouts.app')


@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="{{ asset('assets/images/banner5.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Find your dream job</h1>
                <p>Thounsands of jobs available.</p>
               
            </div>
        </div>
    </div>
</section>



<section class="section-3  py-5">
    <div class="container">
        <h2>Find Jobs</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if($jobs->isNotEmpty())
                        
                        @foreach ($jobs as $job)
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $job->title }}</h3>
                                   
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">{{ $job->state }}</span>
                                        </p>
                                    
                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="{{ route('jobDetail', $job->id) }}" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        @else
                        <div class="col-md-12">Jobs not found </div>
                        @endif
                        
             
                                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection