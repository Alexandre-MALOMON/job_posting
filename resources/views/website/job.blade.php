@extends('partial.template')
@section('title')
Job
@endsection
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-title text-center">
                    <h2>Featured Jobs <small>Lorem ipsum dolor sit amet.</small></h2>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="courses-thumb courses-thumb-secondary">
                    <div class="courses-top">
                        <div class="courses-image">
                            <img src="{{ asset('images/product-1-720x480.jpg')}}" class="img-responsive" alt="">
                        </div>
                        <div class="courses-date">
                            <span title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</span>
                            <span title="Location"><i class="fa fa-map-marker"></i> London</span>
                            <span title="Type"><i class="fa fa-file"></i> Contract</span>
                        </div>
                    </div>

                    <div class="courses-detail">
                        <h3><a href="job-details.html">Lorem ipsum dolor sit amet</a></h3>

                        <p class="lead"><strong>$60 000</strong></p>

                        <p>Medical / Health Jobs for <strong>BMI Kings Park Hospital</strong></p>
                    </div>

                    <div class="courses-info">
                        <a href="job-details.html" class="section-btn btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="courses-thumb courses-thumb-secondary">
                    <div class="courses-top">
                        <div class="courses-image">
                            <img src="{{ asset('images/product-2-720x480.jpg')}}" class="img-responsive" alt="">
                        </div>
                        <div class="courses-date">
                            <span title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</span>
                            <span title="Location"><i class="fa fa-map-marker"></i> London</span>
                            <span title="Type"><i class="fa fa-file"></i> Contract</span>
                        </div>
                    </div>

                    <div class="courses-detail">
                        <h3><a href="job-details.html">Lorem ipsum dolor sit amet</a></h3>

                        <p class="lead"><strong>$60 000</strong></p>

                        <p>Medical / Health Jobs for <strong>BMI Kings Park Hospital</strong></p>
                    </div>

                    <div class="courses-info">
                        <a href="job-details.html" class="section-btn btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">
                <div class="courses-thumb courses-thumb-secondary">
                    <div class="courses-top">
                        <div class="courses-image">
                            <img src="{{ asset('images/product-3-720x480.jpg')}}" class="img-responsive" alt="">
                        </div>
                        <div class="courses-date">
                            <span title="Posted on"><i class="fa fa-calendar"></i> 15-06-2020</span>
                            <span title="Location"><i class="fa fa-map-marker"></i> London</span>
                            <span title="Type"><i class="fa fa-file"></i> Contract</span>
                        </div>
                    </div>

                    <div class="courses-detail">
                        <h3><a href="job-details.html">Lorem ipsum dolor sit amet</a></h3>

                        <p class="lead"><strong>$60 000</strong></p>

                        <p>Medical / Health Jobs for <strong>BMI Kings Park Hospital</strong></p>
                    </div>

                    <div class="courses-info">
                        <a href="job-details.html" class="section-btn btn btn-primary btn-block">View Details</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
