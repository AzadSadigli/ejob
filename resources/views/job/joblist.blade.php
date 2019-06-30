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
            <!-- <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries</p> -->
        </div>
          @if(Request::is('jobs'))
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
                                <option value="0">{{__('app.All_regions')}}</option>
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
          </div>
          @endif
          <div class="row" id="job_list">
            @foreach($vacs as $vac)
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
                            <span class="vac-owner"><i class="lni-user"></i>
                              @if($vac->user_id == 0)
                              {{$vac->user_name}}
                              @else
                              <a href="/user/{{App\User::find($vac->user_id)->username}}/vacancies">{{App\User::find($vac->user_id)->name}} {{App\User::find($vac->user_id)->surname}}</a>
                              @endif                            </span>
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
                        @if(App\Jobreq::where('vac_id',$vac->id)->count() == 0)
                        <a class="apply-btn" onclick="apply_job({{$vac->id}})" data-toggle="modal" data-target="#apply_popup">Apply Now</a>
                        @else
                        <a class="applied-btn" disabled>{{__('app.Applied')}} <i class="fa fa-check"></i> </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 text-center mt-4">
                <a href="#" class="btn btn-common">{{__('app.Load_more')}}</a>
            </div>
          </div>
          <div id="apply_popup" class="modal fade" role="dialog" success="{{__('app.Applied')}}"></div>
        </div>
    </div>
</section>
@endsection
@section('foot')
<script type="text/javascript">
function apply_job(id){
  $("#apply_popup").html("<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Apply')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'> <span id='loading'></span> <div class='form-group'><label class='control-label'>{{__('app.My_resume')}}</label><div class='search-category-container' id='res_id_for_apply'><label class='styled-select'><select class='dropdown-product selectpicker' id='disp_m_res' name='vac_id' required></select></label></div></div> <div class='form-group' id='hide-apply'><label class='control-label'>{{__('app.Description')}}</label><textarea maxlength='500' id='apply_description' class='form-control' placeholder='{{__('app.Description')}}...'></textarea></div></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button><a class='btn btn-primary' onclick='apply_for_job("+id+")'>{{__('app.Apply')}}</a></div></div></div>");
  var op = "<option value='0' selected disabled>{{__('app.Choose_resume')}}</option>";
  $.ajax({
    type:'GET',
    url:'/myresumes-list',
    cache: false,
    success:function(data){
        for(var i=0; i < data.length; i++){
          op +='<option value="'+data[i].id+'"> R'+(i+1)+': '+data[i].title+'</option>';
        }
        $("#disp_m_res").append(op);
    },
    error:function(data){console.log("error");}
  });
}
</script>
@endsection
