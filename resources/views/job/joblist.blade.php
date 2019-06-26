@extends('layouts.master')
@section('head')
<meta name="keywords" content="">
<meta name="description" content="">
<title>E-Job</title>
@endsection
@section('body')
<header id="home" class="hero-area">
    @include('layouts.header')
</header>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>Browse Job</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="job-browse section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="wrap-search-filter row">
                    <div class="col-lg-5 col-md-5 col-xs-12">
                        <input type="text" class="form-control" placeholder="Keyword: Name, Tag">
                    </div>
                    <div class="col-lg-5 col-md-5 col-xs-12">
                        <input type="text" class="form-control" placeholder="Location: City, State, Zip">
                    </div>
                    <div class="col-lg-2 col-md-2 col-xs-12">
                        <button type="submit" class="btn btn-common float-right">Filter</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
                @foreach($vacs as $vac)
                <a class="job-listings" href="/job/{{$vac->id}}" title="{{$vac->title}}">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-xs-12">
                            <div class="job-company-logo"><img src="/img/features/img4.png" alt="{{$vac->title}}"></div>
                            <div class="job-details">
                                <h3>{{$vac->title}}</h3>
                                <span class="company-neme">{{$vac->company}}</span>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-center">
                            <span class="btn-open">7 Open Jobs</span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <div class="location">
                                <i class="lni-map-marker"></i> {{$vac->location}}
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            @if($vac->type == 1)
                            <span class="btn-full-time">{{__('app.Part_time')}}</span>
                            @elseif($vac->type == 3)
                            <span class="btn-full-time">{{__('app.Remote')}}</span>
                            @elseif($vac->type == 0)
                            <span class="btn-full-time">{{__('app.Intern')}}</span>
                            @elseif($vac->type == 2)
                            <span class="btn-full-time">{{__('app.Full_time')}}</span>
                            @endif
                        </div>
                        <div class="col-lg-2 col-md-2 col-xs-12 text-right">
                            <span class="btn-apply">Apply Now</span>
                        </div>
                    </div>
                </a>
                @endforeach
                {{$vacs->links()}}
                <ul class="pagination">
                    <li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>
                </ul>

            </div>
        </div>
    </div>
</section>

@endsection
