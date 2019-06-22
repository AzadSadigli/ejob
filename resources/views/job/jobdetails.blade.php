@extends('layouts.master')
@section('head')
<title>{{$vac->title}} </title>
@endsection
@section('body')
<header id="home" class="hero-area">
    @include('layouts.header')
</header>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-xs-12">
                <div class="breadcrumb-wrapper">
                    <div class="img-wrapper">
                        <img src="/img/about/company-logo.png" alt="">
                    </div>
                    <div class="content">
                        <h3 class="product-title">{{$vac->title}}</h3>
                        <p class="brand">{{$vac->company}}</p>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i> {{$vac->location}}</span>
                            <span><i class="lni-calendar"></i> {{trans('app.Posted_on',['date' => $vac->created_at->format('d M, Y')])}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="month-price">
                    <span class="year">@if($vac->salary_type == 1) {{__('app.Hourly')}}
                    @elseif($vac->salary_type == 2) {{__('app.Daily')}}
                    @elseif($vac->salary_type == 3) {{__('app.Weekly')}}
                    @elseif($vac->salary_type == 4) {{__('app.Monthly')}}
                    @else {{__('app.Annual')}}
                    @endif</span>
                    <div class="price">{{number_format($vac->salary)}}AZN</div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="job-detail section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="content-area">
                    <h4>{{__('app.Description')}}</h4>
                    {!! $vac->description !!}
                    <h4>{{__('app.Job_requirements')}}</h4>
                    {!! $vac->requirements !!}
                    <h5>How To Apply</h5>
                    <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
                    <a href="#" class="btn btn-common" data-toggle="modal" data-target="#myModal">{{__('app.Apply')}}</a>
                </div>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-common" name="button">{{__('app.Apply')}}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="sideber">
                    <div class="widghet">
                        <h3>Job Location</h3>
                        <ul>
                          <li><b>{{__('app.Vacancy_ID')}}:</b> {{$vac->vac_id}}</li>
                          <li><b>{{__('app.Category')}}:</b>
                            @if($vac->category == 1) <a href="#">{{__('app.Finance')}}</a>
                            @elseif($vac->category == 2) <a href="#">{{__('app.IT_and_Engineering')}}</a>
                            @elseif($vac->category == 3) <a href="#">{{__('app.Education_or_Training')}}</a>
                            @elseif($vac->category == 4) <a href="#">{{__('app.Art_or_Design')}}</a>
                            @elseif($vac->category == 5) <a href="#">{{__('app.Sale_Markting')}}</a>
                            @elseif($vac->category == 6) <a href="#">{{__('app.Healthcare')}}</a>
                            @elseif($vac->category == 7) <a href="#">{{__('app.Science')}}</a>
                            @elseif($vac->category == 8) <a href="#">{{__('app.Food_Services')}}</a> @endif
                          </li>
                          <li><b>{{__('app.Job_type')}}:</b>
                            @if($vac->type == 1) {{__('app.Part_time')}}
                              @elseif($vac->type == 3) {{__('app.Remote')}}
                              @elseif($vac->type == 0) {{__('app.Intern')}}
                              @elseif($vac->type == 2) {{__('app.Full_time')}}
                              @endif
                            </li>
                          <li><b>{{__('app.Website')}}:</b> <a href="{{$vac->website}}" target="_blank">{{$vac->website}}</a> </li>
                        </ul>
                    </div>
                    <div class="widghet">
                        <h3>Share This Job</h3>
                        <div class="share-job">
                            <center><img style="height:200px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG(Request::url(), 'QRCODE')}}" alt="barcode" /></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.similarjobs')
@endsection
