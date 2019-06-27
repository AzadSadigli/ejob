@extends('layouts.master')
@section('head')
<title>{{trans('app.My_profile_section',['name' => Auth::user()->name])}}</title>
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
                    <h3>{{trans('app.My_profile_section',['name' => Auth::user()->name])}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            @include('layouts.prof-nav')
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="job-alerts-item candidates">
                    <h4 class="alerts-title">{{trans('app.My_profile_section',['name' => Auth::user()->name])}}</h4><hr>
                    <a class="btn btn-common btn-sm" href="add-resume.html">Add new resume</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
