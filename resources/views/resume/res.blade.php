<!doctype html>
<html lang="en">
<head>
<title>{{$res->full_name}}</title>
<meta charset="UTF-8">
<meta name="description" content="{{$res->full_name}}: {{$res->about_me}}">
<meta name="keywords" content="personal, vcard, portfolio">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/x-icon" href="http://chittagongit.com/download/328250">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="/css/res.css">
<style media="screen">
  .scnet{
    display: inline;
    width: 100px;
    height: 100px;
    padding: 5px;
  }
</style>
</head>
<body>
<div id="preloader"><div class="spinner"></div></div>
<div class="wrapper top_60 container">
<div class="row">
<div class="col-lg-3 col-md-4">
    <div class="profile">
        <div class="profile-name">
            <span class="name">{{$res->full_name}}</span><br>
            <span class="job">{{$res->title}}</span>
        </div>
        <figure class="profile-image">
            <img src="/img/default.png" alt="{{$res->full_name}}">
        </figure>
        <ul class="profile-information">
            <li></li>
            <li><p><span>{{__('app.Name')}}:</span> {{$res->full_name}}</p></li>
            <li><p><span>{{__('app.Birthday')}}:</span> @php($user = App\User::find($res->user_id)) {{\Carbon\Carbon::parse($user->birthdate)->format('d M Y')}}</p></li>
            <li><p><span>{{__('app.Current_Job')}}:</span> {{__('app.None')}}</p></li>
            <li><p><span>{{__('app.Email')}}:</span> {{$res->email}}</p></li>
            <li>
              @foreach($sns = App\Socnet::where('res_id',$res->id)->get() as $sn)
                <a class="scnet" href="{{$sn->link}}" target="_blank"><i class="{{$sn->icon}}" aria-hidden="true"></i></a>
              @endforeach
            </li>
        </ul>
        @if(!empty($res->resume))
        <div class="col-md-12">
            <button class="site-btn icon">{{__('app.Download_Cv')}}<i class="fa fa-download" aria-hidden="true"></i></button>
        </div>
        @endif
    </div>
</div>
<div id="ajax-tab-container" class="col-lg-9 col-md-8 tab-container">
<div class="row">
    <header class="col-md-12">
        <nav>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-4">
                    <ul class="tabs">
                        <li class="tab">
                            <a class="home-btn" href="#home"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li class="tab"><a href="#resume">{{__('app.Resume')}}</a></li>
                        <li class="tab"><a href="#portfolio">PORTFOLIO</a></li>
                        <li class="tab"><a href="#blog">BLOG</a></li>
                        <li class="tab"><a href="#contact">{{__('app.Contact')}}</a></li>
                        @if(Auth::check())
                          @if($res->user_id == Auth::user()->id)
                          @endif
                        @endif
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-8 dynamic">
                    <a href="mailto:{{$res->email}}?subject={{__('app.Hire_From_eJob')}}" class="pull-right site-btn hidden-xs">{{__('app.Hire_Me')}}</a>
                    <div class="hamburger pull-right hidden-lg hidden-md"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="col-md-12">
        <div id="content" class="panel-container">
            <div id="home">
                <div class="row">
                    <section class="about-me line col-md-12 padding_30 padbot_45">
                    <div class="section-title"><span></span><h2>{{__('app.About_me')}}</h2></div>
                    <p class="top_30">{{$res->about_me}}</p>
                </section>
                </div>
                <div class="row">
                    <section class="featured-properties graybg padding_50 padbot_50">
                        <div class="section-title bottom_45"><span></span><h2>Featured Properties</h2></div>
                        <div class="owl-carousel row" data-items="3" data-autoplay="3000" data-pagination="true">
                            <div class="col-md-12 item">
                                <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                    <figure>
                                        <div class="imgout">
                                            <span class="type">For Sale</span>
                                            <span class="price">$720,000</span>
                                            <img src="/images/works/work-05.jpg" alt="" >
                                        </div>
                                        <figcaption>
                                            <span class="title">Royale Uptown</span><br/>
                                            <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 6 bisshot Ave. Bronx, NY</span>
                                            <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                    <figure>
                                        <div class="imgout">
                                            <span class="type">For Rent</span>
                                            <span class="price">$900/mo</span>
                                            <img src="/images/works/work-06.jpg" alt="" >
                                        </div>
                                        <figcaption>
                                            <span class="title">Palladium Uptown</span><br/>
                                            <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 6 bisshot Ave. Bronx, NY</span>
                                            <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                    <figure>
                                        <div class="imgout">
                                            <span class="type">For Sale</span>
                                            <span class="price">$420,000</span>
                                            <img src="/images/works/work-02.jpg" alt="" >
                                        </div>
                                        <figcaption>
                                            <span class="title">Meridian Apartment</span><br/>
                                            <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 6 bisshot Ave. Bronx, NY</span>
                                            <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-md-12 item">
                                <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                    <figure>
                                        <div class="imgout">
                                            <span class="type">For Rent</span>
                                            <span class="price">$800/mo</span>
                                            <img src="/images/works/work-04.jpg" alt="" >
                                        </div>
                                        <figcaption>
                                            <span class="title">Starcity Apartment</span><br/>
                                            <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 77 Contry St. Panama City, FL</span>
                                            <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="row">
                    <section class="services line col-md-12 padding_50 padbot_50">
                    <div class="section-title bottom_45"><span></span><h2>My Services</h2></div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-038-house-6"></i>
                                </div>
                                <span class="title">Consultancy</span>
                                <p class="little-text">Gregor then turned to look out the window at the dull weather.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-035-contract-1"></i>
                                </div>
                                <span class="title">Contract</span>
                                <p class="little-text">A collection of textile samples lay spread out on the table.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-008-house-23"></i>
                                </div>
                                <span class="title">Detached House</span>
                                <p class="little-text">One morning, when Gregor Samsa woke from troubled dreams.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-015-building-2"></i>
                                </div>
                                <span class="title">Apartment</span>
                                <p class="little-text">His room, a proper human room although a little too small.</p>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
            </div>
            <div id="resume">
                <div class="row">
                    <section class="education">
                    <div class="section-title top_30"><span></span><h2>Resume</h2></div>
                        <div class="row">
                            <div class="working-history col-md-6 padding_15 padbot_30">
                                <ul class="timeline col-md-12 top_30">
                                    <li><i class="fa fa-suitcase" aria-hidden="true"></i><h2 class="timeline-title">{{__('app.Working_History')}}</h2></li>
                                    @foreach($exps = App\Exp::where('res_id',$res->id)->get() as $exp)
                                    <li><h3 class="line-title">{{$exp->position}} - {{$exp->company}}</h3>
                                        <span>{{$exp->start_date}} - {{$exp->end_date}}</span>
                                        <p class="little-text">{{$exp->description}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="education-history col-md-6 padding_15 padbot_30">
                                <ul class="timeline col-md-12 top_30">
                                    <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><h2 class="timeline-title">{{__('app.Education_History')}}</h2></li>
                                    @foreach($edus = App\Edu::where('res_id',$res->id)->get() as $edu)
                                    <li><h3 class="line-title">{{$edu->school}}</h3>
                                        <span>{{$edu->start_date}} - {{$edu->end_date}}</span>
                                        <p class="little-text">{{$res->description}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="row">
                    <section class="clients col-md-12 graybg padding_45 padbot_45">
                        <div class="section-title bottom_30"><span></span><h2>Clients</h2></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="client">
                                    <img src="/images/client-01.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="client">
                                    <img src="/images/client-02.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="client">
                                    <img src="/images/client-03.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="client">
                                    <img src="/images/client-04.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="row">
                    <section class="testimonials bottom_30">
                        <div class="section-title top_60 bottom_30"><span></span><h2>Testimonials</h2></div>
                        <div class="owl-carousel row" data-items="3" data-autoplay="3000" data-pagination="true">
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-1.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">Jack Garratt</span>
                                            <span class="job">Freelancer</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Great designer! he finished our work wonderfully and just in time. thanks for everything.</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-2.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">April M. Griffin</span>
                                            <span class="job">Founder</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Our logo and business card design look great. Thanks Henry</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-3.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">Larry M. Johnson</span>
                                            <span class="job">Freelancer</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Henry is a very creative and talented designer. I do not hesitate to work again.</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-1.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">Jack Garratt</span>
                                            <span class="job">Freelancer</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Great designer! he finished our work wonderfully and just in time. thanks for everything.</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-2.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">April M. Griffin</span>
                                            <span class="job">Founder</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Our logo and business card design look great. Thanks Henry</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-3.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">Larry M. Johnson</span>
                                            <span class="job">Freelancer</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Henry is a very creative and talented designer. I do not hesitate to work again.</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-1.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">Jack Garratt</span>
                                            <span class="job">Freelancer</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Great designer! he finished our work wonderfully and just in time. thanks for everything.</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-2.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">April M. Griffin</span>
                                            <span class="job">Founder</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Our logo and business card design look great. Thanks Henry</p>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <div class="comment">
                                    <div class="top-section">
                                        <figure>
                                            <img src="/images/testimonial-3.jpg" alt="">
                                        </figure>
                                        <div class="name-info">
                                            <span class="name">Larry M. Johnson</span>
                                            <span class="job">Freelancer</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <p>Henry is a very creative and talented designer. I do not hesitate to work again.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div id="portfolio" class="row bottom_45">
                <section class="col-md-12">
                    <div class="col-md-12 content-header bottom_15">
                        <div class="section-title top_30 bottom_30"><span></span><h2>Portfolio</h2></div>
                        <div id="filters-container">
                            <div data-filter="*" class="cbp-filter-item cbp-filter-item-active">All</div>
                            <div data-filter=".sale" class="cbp-filter-item">For Sale</div>
                            <div data-filter=".rent" class="cbp-filter-item">For Rent</div>
                        </div>
                    </div>
                    <div id="grid-container" class="top_60">
                        <div class="cbp-item rent">
                            <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                <figure>
                                    <div class="imgout">
                                        <span class="type">For Rent</span>
                                        <span class="price">$900/mo</span>
                                        <img src="/images/works/work-01.jpg" alt="" >
                                    </div>
                                    <figcaption>
                                        <span class="title">White Apartment</span><br/>
                                        <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 775 contry St. Bronx, NY</span>
                                        <div class="features"><span>Area:</span> 120 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="cbp-item sale">
                            <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                <figure>
                                    <div class="imgout">
                                        <span class="type">For Sale</span>
                                        <span class="price">$420,000</span>
                                        <img src="/images/works/work-02.jpg" alt="" >
                                    </div>
                                    <figcaption>
                                        <span class="title">Meridian Apartment</span><br/>
                                        <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 6 bisshot Ave. Bronx, NY</span>
                                        <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="cbp-item rent">
                            <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                <figure>
                                    <div class="imgout">
                                        <span class="type">For Rent</span>
                                        <span class="price">$600/mo</span>
                                        <img src="/images/works/work-03.jpg" alt="" >
                                    </div>
                                    <figcaption>
                                        <span class="title">Palladium Uptown</span><br/>
                                        <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 77 Contry St. Panama City, FL</span>
                                        <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="cbp-item rent">
                            <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                <figure>
                                    <div class="imgout">
                                        <span class="type">For Rent</span>
                                        <span class="price">$800/mo</span>
                                        <img src="/images/works/work-04.jpg" alt="" >
                                    </div>
                                    <figcaption>
                                        <span class="title">Starcity Apartment</span><br/>
                                        <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 77 Contry St. Panama City, FL</span>
                                        <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="cbp-item sale">
                            <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                <figure>
                                    <div class="imgout">
                                        <span class="type">For Sale</span>
                                        <span class="price">$720,000</span>
                                        <img src="/images/works/work-05.jpg" alt="" >
                                    </div>
                                    <figcaption>
                                        <span class="title">Royale Uptown</span><br/>
                                        <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 6 bisshot Ave. Bronx, NY</span>
                                        <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="cbp-item rent">
                            <a href="portfolio-detail/work-03.html" class="estate cbp-singlePage">
                                <figure>
                                    <div class="imgout">
                                        <span class="type">For Rent</span>
                                        <span class="price">$900/mo</span>
                                        <img src="/images/works/work-06.jpg" alt="" >
                                    </div>
                                    <figcaption>
                                        <span class="title">Palladium Uptown</span><br/>
                                        <span class="info"><i class="fa fa-map-marker" aria-hidden="true"></i> 6 bisshot Ave. Bronx, NY</span>
                                        <div class="features"><span>Area:</span> 140 m2 <span>Beds:</span> 2 <span>Baht:</span> 1</div>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                    <div id="js-loadMore-agency" class="cbp-l-loadMore-button top_30">
                        <a href="load-more/portfolio.html" class="cbp-l-loadMore-link site-btn" rel="nofollow">
                            <span class="cbp-l-loadMore-defaultText">Load More (<span class="cbp-l-loadMore-loadItems">3</span>)</span>
                            <span class="cbp-l-loadMore-loadingText">Loading...</span>
                            <span class="cbp-l-loadMore-noMoreLoading">No More Works</span>
                        </a>
                    </div>
                </section>
            </div>
            <div id="blog">
                <div class="row">
                    <section class="blog col-md-12 bottom_30">
                        <div class="col-md-12 content-header">
                            <div class="section-title top_30 bottom_15"><span></span><h2>Blog Posts</h2></div>
                        </div>
                        <div id="grid-blog" class="row">
                            <div class="cbp-item">
                                <a href="blog-posts/blog-1.html" class="blog-box">
                                    <div class="blog-img">
                                        <img src="/images/blogs/blog-6.jpg" alt="">
                                    </div>
                                    <div class="blog-box-info">
                                        <span class="category">General</span>
                                        <h2 class="title">See my current workspace</h2>
                                        <p class="little-text">The first thing to remember about success is that it is a process.</p>
                                        <span class="date">8 Nov 17</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item">
                                <a href="blog-posts/blog-video-version.html" class="blog-box">
                                    <div class="blog-img">
                                        <img src="/images/blogs/blog-2.jpg" alt="">
                                    </div>
                                    <div class="blog-box-info">
                                        <span class="category">Web Design</span>
                                        <h2 class="title">How to become a web designer?</h2>
                                        <p class="little-text">He must have tried it a hundred times, shut his eyes so that he wouldn't have to look at the floundering.</p>
                                        <span class="date">27 Oct 17</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item">
                                <a href="blog-posts/blog-music-version.html" class="blog-box">
                                    <div class="blog-img">
                                        <img src="/images/blogs/blog-3.jpg" alt="">
                                    </div>
                                    <div class="blog-box-info">
                                        <span class="category">User İnterface</span>
                                        <h2 class="title">Why is it better to work nights?</h2>
                                        <p class="little-text">Legs, and only stopped when he began to feel a mild, dull pain there that he had never felt.</p>
                                        <span class="date">19 Oct 17</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item">
                                <a href="blog-posts/blog-video-version.html" class="blog-box">
                                    <div class="blog-img">
                                        <img src="/images/blogs/blog-4.jpg" alt="">
                                    </div>
                                    <div class="blog-box-info">
                                        <span class="category">Photography</span>
                                        <h2 class="title">Can you work everywhere?</h2>
                                        <p class="little-text">Drops of rain could be heard hitting the pane, which made him feel quite sad..</p>
                                        <span class="date">28 Sep 17</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item">
                                <a href="blog-posts/blog-1.html" class="blog-box">
                                    <div class="blog-img">
                                        <img src="/images/blogs/blog-5.jpg" alt="">
                                    </div>
                                    <div class="blog-box-info">
                                        <span class="category">Other</span>
                                        <h2 class="title">How to connect your imac or macBook</h2>
                                        <p class="little-text">However hard he threw himself onto his right, he always rolled back to where he was.</p>
                                        <span class="date">19 Agu 17</span>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item">
                                <a href="blog-posts/blog-1.html" class="blog-box">
                                    <div class="blog-img">
                                        <img src="/images/blogs/blog-6.jpg" alt="">
                                    </div>
                                    <div class="blog-box-info">
                                        <span class="category">Work Space</span>
                                        <h2 class="title">I'm starting a new project</h2>
                                        <p class="little-text">The first thing to remember about success is that it is a process...</p>
                                        <span class="date">1 Jul 17</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div id="load-posts" class="cbp-l-loadMore-button top_60">
                            <a href="load-more/blog-posts.html" class="cbp-l-loadMore-link site-btn" rel="nofollow">
                                <span class="cbp-l-loadMore-defaultText">Load More (<span class="cbp-l-loadMore-loadItems">3</span>)</span>
                                <span class="cbp-l-loadMore-loadingText">Loading...</span>
                                <span class="cbp-l-loadMore-noMoreLoading">No More Works</span>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
            <div id="contact">
                <div class="row">
                    <section class="contact-form col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>Contact Form</h2></div>
                        <form class="site-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="site-input" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <input class="site-input" placeholder="E-mail">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="site-area" placeholder="Message"></textarea>
                                </div>
                                <div class="col-md-12 top_15 bottom_30">
                                    <button class="site-btn" type="submit">{{__('app.Send')}}</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <section class="contact-info col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>Contact Informations</h2></div>
                        <ul>
                            <li><span>{{__('app.Phone')}}:</span> {{$res->phone_number}}</li>
                            <li><span>{{__('app.Email')}}:</span> {{$res->email}}</li>
                            <li>
                                <div class="social-icons top_15">
                                  @foreach($sns = App\Socnet::where('res_id',$res->id)->get() as $sn)
                                    <a class="scnet" href="{{$sn->link}}" target="_blank"><i class="{{$sn->icon}}" aria-hidden="true"></i></a>
                                  @endforeach
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
     </div>
</div>
<footer>
    <div class="footer col-md-12 top_30 bottom_30">
        <div class="name col-md-4 hidden-md hidden-sm hidden-xs">{{__('app.Online_Resume')}}</div>
        <div class="copyright col-lg-8 col-md-12">© {{date('Y')}} <a href="/">eJob</a> </div>
    </div>
</footer>

</div>
</div>
</div>
<!-- <script src="/assets/res/js/jquery-2.1.4.min.js"></script>
<script src="/assets/res/js/jquery.cubeportfolio.min.js"></script>
<script src="/assets/res/js/bootstrap.min.js"></script>
<script src="/assets/res/js/jquery.easytabs.min.js"></script>
<script src="/assets/res/js/owl.carousel.min.js"></script>
<script src="/assets/res/js/main.js"></script>
<script src="/assets/res/js/jquery.cookie-1.4.1.min.js"></script>
<script src="/assets/res/js/Demo.js"></script> -->
<!-- <link rel="stylesheet" href="css/Demo.min.css" /> -->
<script src="/js/res.js"></script>
</body>
</html>
