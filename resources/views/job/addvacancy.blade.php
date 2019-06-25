@extends('layouts.master')
@section('head')
<meta name="keywords" content="">
<meta name="description" content="">
<title>{{__('app.Add_vacancy')}} - E-Job</title>
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
                    <h3>{{__('app.Add_vacancy')}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="post-job box">
                    <div class="cont-head">
                      <h3 class="job-title">{{__('app.Add_vacancy')}}</h3>
                    </div>
                    @include('layouts.alerts')
                    <form class="form-ad" method="POST" action="/add-new-vacancy">
                      @csrf
                        <div class="form-group">
                            <label class="control-label">{{__('app.Company')}}</label>
                            <input type="text" class="form-control" name="company" placeholder="Write company name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Category')}}</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker" name="category">
                                        <!-- <option value="0">{{__('app.All_categories')}}</option> -->
                                        <option value="1">{{__('app.Finance')}}</option>
                                        <option value="2">{{__('app.IT_and_Engineering')}}</option>
                                        <option value="3">{{__('app.Education_or_Training')}}</option>
                                        <option value="4">{{__('app.Art_or_Design')}}</option>
                                        <option value="5">{{__('app.Sale_Markting')}}</option>
                                        <option value="6">{{__('app.Healthcare')}}</option>
                                        <option value="7">{{__('app.Science')}}</option>
                                        <option value="8">{{__('app.Food_Services')}}</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Job_title')}}</label>
                            <input type="text" name="title" class="form-control" placeholder="Write job title">
                        </div>
                        <div class="form-group">
                          <label class="control-label">{{__('app.Location')}}</label>
                            <div class="search-category-container">
                              <label class="styled-select">
                              @include('layouts.az_districts')
                              </label>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label" for="salary">{{__('app.Salary')}}</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <select class="type" name="salary_type">
                                <option value="1">{{__('app.Hourly')}}</option>
                                <option value="2">{{__('app.Daily')}}</option>
                                <option value="3">{{__('app.Weekly')}}</option>
                                <option value="4">{{__('app.Monthly')}}</option>
                                <option value="5">{{__('app.Annual')}}</option>
                              </select>
                            </div>
                            <input type="number" class="form-control" name="salary" min="0" placeholder="{{__('app.Salary')}}...">
                            <div class="input-group-prepend">
                              <select class="curr" name="salary_currency">
                                <option value="1">AZN</option>
                                <option value="2">USD</option>
                                <option value="3">EURO</option>
                                <option value="4">RUBL</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Job_type')}}</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                    <select class="dropdown-product selectpicker" name="type">
                                        <option value="2">{{__('app.Full_time')}}</option>
                                        <option value="1">{{__('app.Part_time')}}</option>
                                        <option value="3">{{__('app.Remote')}}</option>
                                        <option value="0">{{__('app.Intern')}}</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Description')}}</label>
                            <textarea name="description" class="form-control" placeholder="Enter describtion"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Requirements')}}</label>
                            <textarea name="requirements" rows="6" class="form-control" placeholder="Enter requirements"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.End_date')}}</label>
                            <input type="date" class="form-control" min="{{date('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Email')}}</label>
                            <input type="email" class="form-control"  name="contact_email" placeholder="Email...">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Contact_number')}}</label>
                            <input type="number" class="form-control" placeholder="{{__('app.Contact_number')}}...." name="contact_number">
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Contact_type')}}</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                  <select class="dropdown-product selectpicker" name="contact_type">
                                    <option value="0" selected> {{__('app.By_portal')}}</option>
                                    <option value="1"> {{__('app.By_phone')}}</option>
                                    <option value="2"> {{__('app.By_email')}}</option>
                                    <option value="3"> {{__('app.By_website')}}</option>
                                    <option value="4"> {{__('app.By_any')}}</option>
                                  </select>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Website')}} <span>({{__('app.optional')}})</span></label>
                            <input type="text" name="website" class="form-control" placeholder="http://">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Job Tags <span>({{__('app.optional')}})</span></label>
                            <input type="text" class="form-control" placeholder="e.g.PHP,Social Media,Management">
                        </div>
                        @if(Auth::check())
                        @else
                        <div class="form-group">
                          <label class="control-label">{{__('app.Company_logo')}} <span>({{__('app.Allowed_images_formats')}})</span></label>
                          <div class="custom-file mb-3">
                              <input type="file" class="custom-file-input" name="image" id="validatedCustomFile">
                              <label class="custom-file-label form-control" for="validatedCustomFile">{{__('app.Choose_image')}}...</label>
                          </div>
                        </div>
                        @endif
                        <center><button type="submit" class="btn btn-common">{{__('app.Add_vacancy')}}</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('foot')
<script type="text/javascript">
$('form').on('focus', 'input[type=number]', function (e) {
  $(this).on('mousewheel.disableScroll', function (e) {
    e.preventDefault()
  })
})
$('form').on('blur', 'input[type=number]', function (e) {
  $(this).off('mousewheel.disableScroll')
})
</script>
@endsection
