@extends('layouts.master')
@section('head')
<meta name="keywords" content="">
<meta name="description" content="">
<title>E-Job</title>
@endsection
@section('body')
<header id="home" class="hero-area">
    @include('layouts.header')
    <div id="carousel-area">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-slider" data-slide-to="1"></li>
                <li data-target="#carousel-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="assets/img/slider/bg-1.jpg" alt="">
                    <div class="carousel-caption text-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 class="wow fadeInRight" data-wow-delay="0.4s">Find the career you <br> deserve</h2>
                                <p class="wow fadeInRight" data-wow-delay="0.6s">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                                    <br> Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
                                <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">See our jobs</a>
                                <a href="#" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Search jobs</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                <div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="assets/img/slider/img-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider/bg-1.jpg" alt="">
                    <div class="carousel-caption text-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">10000+ Jobs waiting <br>for you!</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                                    <br> Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
                                <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInUp" data-wow-delay="0.9s">See our jobs</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                <div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="assets/img/slider/img-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slider/bg-1.jpg" alt="">
                    <div class="carousel-caption text-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 class="wow fadeInRight" data-wow-delay="0.4s">Post a job and hunt <br> amazing talents</h2>
                                <p class="wow fadeInRight" data-wow-delay="0.6s">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                                    <br> Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
                                <a href="#" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Create Account</a>
                                <a href="#" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Post Job</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                <div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="assets/img/slider/img-3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
                <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
                <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</header>

<section class="browse-catagories section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Browse by Catagories</h2>
            <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries</p>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12">
                <a href="browse-categories.html" class="img-box">
                    <div class="img-box-content">
                        <h4>Healthcare</h4>
                        <span>3420 Jobs</span>
                    </div>
                    <div class="img-box-background">
                        <img class="img-fluid" src="assets/img/catagories/img1.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <a href="browse-categories.html" class="img-box">
                            <div class="img-box-content">
                                <h4>Education</h4>
                                <span>2379 Jobs</span>
                            </div>
                            <div class="img-box-background">
                                <img class="img-fluid" src="assets/img/catagories/img2.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <a href="browse-categories.html" class="img-box">
                            <div class="img-box-content">
                                <h4>Business</h4>
                                <span>1560 Jobs</span>
                            </div>
                            <div class="img-box-background">
                                <img class="img-fluid" src="assets/img/catagories/img3.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <a href="browse-categories.html" class="img-box">
                            <div class="img-box-content">
                                <h4>Finance</h4>
                                <span>2000 Jobs</span>
                            </div>
                            <div class="img-box-background">
                                <img class="img-fluid" src="assets/img/catagories/img4.jpg" alt="">
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <a href="browse-categories.html" class="img-box">
                            <div class="img-box-content">
                                <h4>Support</h4>
                                <span>3340 Jobs</span>
                            </div>
                            <div class="img-box-background">
                                <img class="img-fluid" src="assets/img/catagories/img5.jpg" alt="">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
                <a href="browse-categories.html" class="img-box">
                    <div class="img-box-content">
                        <h4>Law</h4>
                        <span>1200 Jobs</span>
                    </div>
                    <div class="img-box-background">
                        <img class="img-fluid" src="assets/img/catagories/img6.jpg" alt="">
                    </div>
                </a>
            </div>
            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-common">browse more</a>
            </div>
        </div>
    </div>
</section>

<section id="featured" class="section bg-cyan">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Featured Jobs</h2>
            <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries</p>
        </div>
        <div class="row">
            @foreach($vacs as $vac)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="job-featured">
                    <div class="icon">
                        <img src="assets/img/features/img1.png" alt="">
                    </div>
                    <div class="content">
                        <h3><a href="/job/{{$vac->vac_id}}">{{$vac->title}}</a></h3>
                        <p class="brand">{{$vac->company}}</p>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i> {{$vac->location}}</span>
                            <span><i class="lni-user"></i>John Smith</span>
                        </div>
                        @if($vac->type == 1)
                        <span class="part-time">{{__('app.Part_time')}}</span>
                        @elseif($vac->type == 3)
                        <span class="full-time">{{__('app.Remote')}}</span>
                        @elseif($vac->type == 0)
                        <span class="full-time">{{__('app.Intern')}}</span>
                        @elseif($vac->type == 2)
                        <span class="full-time">{{__('app.Full_time')}}</span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4">
                <a href="/jobs" class="btn btn-common">Browse All Jobs</a>
            </div>
        </div>
    </div>
</section>

<section class="featured-lis section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Top Hiring Companies</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                <br> metus effici turac fringilla lorem facilisis.</p>
        </div>
        <div class=" wow fadeIn" data-wow-delay="0.5s">
            <div id="new-products" class="owl-carousel">
                <div class="item">
                    <div class="product-item">
                        <div class="icon-thumb">
                            <img src="assets/img/product/img1.png" alt="">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><a href="#">AmazeTech</a></h3>
                            <div class="tags">
                                <span><i class="lni-briefcase"></i> Software Company</span>
                                <span><i class="lni-map-marker"></i> New York</span>
                            </div>
                            <a href="#" class="btn btn-common">5 Open Job</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <div class="icon-thumb">
                            <img src="assets/img/product/img2.png" alt="">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><a href="#">MagNews</a></h3>
                            <div class="tags">
                                <span><i class="lni-briefcase"></i> Software Company</span>
                                <span><i class="lni-map-marker"></i> New York</span>
                            </div>
                            <a href="#" class="btn btn-common">5 Open Job</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <div class="icon-thumb">
                            <img src="assets/img/product/img3.png" alt="">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><a href="#">Facebook</a></h3>
                            <div class="tags">
                                <span><i class="lni-briefcase"></i> Software Company</span>
                                <span><i class="lni-map-marker"></i> New York</span>
                            </div>
                            <a href="#" class="btn btn-common">5 Open Job</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <div class="icon-thumb">
                            <img src="assets/img/product/img1.png" alt="">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><a href="#">Play Store</a></h3>
                            <div class="tags">
                                <span><i class="lni-briefcase"></i> Software Company</span>
                                <span><i class="lni-map-marker"></i> New York</span>
                            </div>
                            <a href="#" class="btn btn-common">5 Open Job</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="product-item">
                        <div class="icon-thumb">
                            <img src="assets/img/product/img2.png" alt="">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><a href="#">MagNews</a></h3>
                            <div class="tags">
                                <span><i class="lni-briefcase"></i> Software Company</span>
                                <span><i class="lni-map-marker"></i> New York</span>
                            </div>
                            <a href="#" class="btn btn-common">5 Open Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="job-listings" class="section bg-cyan">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Recent Job Post</h2>
            <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries</p>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <a class="job-listings" href="job-details.html">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="job-company-logo">
                                <img src="assets/img/features/img1.png" alt="">
                            </div>
                            <div class="job-details">
                                <h3>App Developer</h3>
                                <span class="company-neme">
AmazeSoft
</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-center">
                            <span class="btn-open">
7 Open Jobs
</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <div class="location">
                                <i class="lni-map-marker"></i> New Yourk, US
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-full-time">Full Time</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-apply">Apply Now</span>
                        </div>
                    </div>
                </a>
                <a class="job-listings" href="job-details.html">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="job-company-logo">
                                <img src="assets/img/features/img2.png" alt="">
                            </div>
                            <div class="job-details">
                                <h3>App Developer</h3>
                                <span class="company-neme">
AmazeSoft
</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-center">
                            <span class="btn-open">
7 Open Jobs
</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <div class="location">
                                <i class="lni-map-marker"></i> New Yourk, US
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-full-time">Full Time</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-apply">Apply Now</span>
                        </div>
                    </div>
                </a>
                <a class="job-listings" href="job-details.html">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="job-company-logo">
                                <img src="assets/img/features/img3.png" alt="">
                            </div>
                            <div class="job-details">
                                <h3>App Developer</h3>
                                <span class="company-neme">
AmazeSoft
</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-center">
                            <span class="btn-open">
7 Open Jobs
</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <div class="location">
                                <i class="lni-map-marker"></i> New Yourk, US
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-full-time">Full Time</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-apply">Apply Now</span>
                        </div>
                    </div>
                </a>
                <a class="job-listings" href="job-details.html">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="job-company-logo">
                                <img src="assets/img/features/img4.png" alt="">
                            </div>
                            <div class="job-details">
                                <h3>App Developer</h3>
                                <span class="company-neme">
AmazeSoft
</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-center">
                            <span class="btn-open">
7 Open Jobs
</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <div class="location">
                                <i class="lni-map-marker"></i> New Yourk, US
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-full-time">Full Time</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-apply">Apply Now</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-common">Load more listing</a>
            </div>
        </div>
    </div>
</section>

<section class="how-it-works section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">How It Works?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                <br> metus effici turac fringilla lorem facilisis.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                <div class="work-process">
                    <span class="process-icon">
<i class="lni-user"></i>
</span>
                    <h4>Create an Account</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-2">
                    <span class="process-icon">
<i class="lni-search"></i>
</span>
                    <h4>Search Jobs</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-3">
                    <span class="process-icon">
<i class="lni-cup"></i>
</span>
                    <h4>Apply</h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="apply">
    <div class="container-fulid">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12 no-padding">
                <div class="recruiter item-box">
                    <div class="content-inner">
                        <h5>I'm</h5>
                        <h3>Recruiter</h3>
                        <p>Post a job to tell us about your project. We'll quickly match you with
                            <br> the right freelancers find place best.</p>
                        <a href="#" class="btn btn-border-filled">Post a Job</a>
                    </div>
                    <div class="img-thumb">
                        <i class="lni-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12 no-padding">
                <div class="jobseeker item-box">
                    <div class="content-inner">
                        <h5>I'm</h5>
                        <h3>Jobseeker!</h3>
                        <p>Post a job to tell us about your project. We'll quickly match you with
                            <br> the right freelancers find place best.</p>
                        <a href="#" class="btn btn-border-filled">Browser Jobs</a>
                    </div>
                    <div class="img-thumb">
                        <i class="lni-leaf"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="counter" class="section bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-home"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">{{App\Vacancy::all()->count()}}</span></h3>
                        <p>Jobs Posted</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-briefcase"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">80</span></h3>
                        <p>All Companies</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-pencil-alt"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">{{App\Resume::all()->count()}}</span></h3>
                        <p>Resumes</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-save"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">1200</span></h3>
                        <p>Applications</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
