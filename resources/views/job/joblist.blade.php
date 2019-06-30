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

<section id="featured" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{__('app.Latest_vacancies')}} <span id="loading"></span></h2>
            <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries</p>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-xs-12">
              <div class="wrap-search-filter row">
                  <div class="col-lg-5 col-md-5 col-xs-12">
                      <input type="text" class="form-control" id="word" placeholder="Keyword: Name, Tag">
                  </div>
                  <div class="col-lg-5 col-md-5 col-xs-12">
                        <div class="search-category-container">
                          <label class="styled-select">
                            <select class="dropdown-product selectpicker" id="location">
                              @foreach(App\Locations::all() as $loc)
                              <option value="{{$loc->id}}">{{$loc->location_az}}</option>
                              @endforeach
                            </select>
                          </label>
                        </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-xs-12">
                      <button class="btn btn-common float-right" onclick="filter_jobs()">Filter</button>
                  </div>
              </div>
          </div>
          <div class="row" id="filtered_jobs">
            @foreach($vacs as $vac)
            @for($i=0;$i<10;$i++)
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="job-featured">
                    <div class="icon">
                        <img src="/img/dc.png" alt="">
                    </div>
                    <div class="content">
                        <h3><a href="/job/{{$vac->vac_id}}">{{$vac->title}}</a></h3>
                        <p class="brand">{{$vac->company}}</p>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i> <a href="/location/{{App\Locations::find($vac->location)->id}}">{{App\Locations::find($vac->location)->location_az}}</a> </span>
                            <span class="vac-owner"><i class="lni-user"></i><a href="/user/{{App\User::find($vac->user_id)->username}}/vacancies">{{App\User::find($vac->user_id)->name}} {{App\User::find($vac->user_id)->surname}}</a> </span>
                        </div>
                        @if($vac->type == 1)
                        <a href="/job-type/part-time" class="job-type pt">{{__('app.Part_time')}}</a>
                        @elseif($vac->type == 3)
                        <a href="/job-type/remote" class="job-type rmt">{{__('app.Remote')}}</a>
                        @elseif($vac->type == 0)
                        <a href="/job-type/intern" class="job-type intr">{{__('app.Intern')}}</a>
                        @elseif($vac->type == 2)
                        <a href="/job-type/full-time" class="job-type ftm">{{__('app.Full_time')}}</a>
                        @endif
                        <!-- <div class="col-lg-2 col-md-2 col-xs-12 text-right"> -->
                            <a class="apply-btn">Apply Now</a>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
            @endfor
            @endforeach
            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-common">{{__('app.Load_more')}}</a>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
@section('foot')
<script type="text/javascript">
function filter_jobs(){
    // if ($('#word').val() != "" & $('#location').val() != "") {
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      document.getElementById("loading").innerHTML = "<img id='loading-image' src='https://www.motorcoachjobs.com/Images/LoaderGIF/blue-original-loading-animation-large.gif' style='height:20px;display:none;'>"
      $('#loading-image').show();
      jQuery.ajax({
        url: "/filter-jobs",
        method: 'POST',
        data: {
          word: jQuery('#word').val(),
          location: jQuery('#location').val(),
        },
        error: function(result){
            if(!$('#word').val()){jQuery('#word').css('border','1px solid red');}
            console.log("error");
        },
        success: function(result){
            $("#filtered_jobs").load(location.href+" #filtered_jobs>*","");
            console.log(result.success);
        },
        complete: function(){
          $('#loading-image').hide();
          document.getElementById("loading").innerHTML = "";
        }
      });
    // }else{$('#word').css('border','1px solid #ccc').val("");}
}
</script>
@endsection
