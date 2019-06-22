@extends('layouts.master')
@section('head')
<meta name="keywords" content="">
<meta name="description" content="">
<title>{{__('app.Add_vacancy')}} - E-Job</title>
<style media="screen">
   .input-group select{
      border: 1px solid #ececec;
      width: 100px;
      -webkit-appearance: none;
      padding-left: 15px;
   }
   .input-group .type{
     border-top-left-radius: 19px;
     border-bottom-left-radius: 19px;
     border-top-right-radius: 0;
     border-bottom-right-radius: 0;
   }
   .input-group .curr{
     border-top-left-radius: 0;
     border-bottom-left-radius: 0;
     border-top-right-radius: 19px;
     border-bottom-right-radius: 19px;
   }
   .input-group select:hover{
      border: 1px solid #ececec;
   }
   .form-group input[type=radio]{
     margin-right: 15px;
   }
</style>
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
                    <h3>Post A Job</h3>
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
                    <h3 class="job-title">{{__('app.Add_vacancy')}}</h3>
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
                              <select class="dropdown-product selectpicker" name="location">
                                <option value="1">Ağcabədi</option>
                                <option value="2">Ağdam</option>
                                <option value="3">Ağdaş</option>
                                <option value="4">Ağstafa</option>
                                <option value="5">Ağsu</option>
                                <option value="6">Astara</option>
                                <option value="7">Bakı</option>
                                <option value="8">Balakən</option>
                                <option value="9">Beyləqan</option>
                                <option value="10">Bərdə</option>
                                <option value="11">Biləsuvar</option>
                                <option value="12">Cəbrayıl</option>
                                <option value="13">Cəlilabad</option>
                                <option value="14">Daşkəsən</option>
                                <option value="15">Dəliməmmədli</option>
                                <option value="16">Füzuli</option>
                                <option value="17">Gədəbəy</option>
                                <option value="18">Gəncə</option>
                                <option value="19">Goranboy</option>
                                <option value="20">Göyçay</option>
                                <option value="21">Göygöl</option>
                                <option value="22">Hacıqabul</option>
                                <option value="23">Horadiz</option>
                                <option value="24">İmişli</option>
                                <option value="25">İsmayıllı</option>
                                <option value="26">Kəlbəcər</option>
                                <option value="27">Kürdəmir</option>
                                <option value="28">Lerik</option>
                                <option value="29">Lənkəran</option>
                                <option value="30">Masallı</option>
                                <option value="31">Mingəçevir</option>
                                <option value="32">Naftalan</option>
                                <option value="33">Naxçıvan</option>
                                <option value="34">Neftçala</option>
                                <option value="35">Oğuz</option>
                                <option value="36">Ordubad</option>
                                <option value="37">Qax</option>
                                <option value="38">Qazax</option>
                                <option value="39">Qəbələ</option>
                                <option value="40">Qobustan</option>
                                <option value="41">Quba</option>
                                <option value="42">Qusar</option>
                                <option value="43">Saatlı</option>
                                <option value="44">Sabirabad</option>
                                <option value="45">Şabran</option>
                                <option value="46">Salyan</option>
                                <option value="47">Şamaxı</option>
                                <option value="48">Samux</option>
                                <option value="72">Şəki</option>
                                <option value="49">Şəmkir</option>
                                <option value="50">Şərur</option>
                                <option value="51">Şirvan</option>
                                <option value="52">Siyəzən</option>
                                <option value="53">Sumqayıt</option>
                                <option value="54">Şuşa</option>
                                <option value="55">Tərtər</option>
                                <option value="56">Tovuz</option>
                                <option value="57">Ucar</option>
                                <option value="58">Xaçmaz</option>
                                <option value="59">Xırdalan</option>
                                <option value="60">Xızı</option>
                                <option value="61">Xudat</option>
                                <option value="62">Yardımlı</option>
                                <option value="63">Yevlax</option>
                                <option value="64">Zaqatala</option>
                                <option value="65">Zərdab</option>
                              </select>
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
                            <label class="control-label">{{__('app.Contact_type')}}</label> <br>
                            <input type="radio" name="contact_type" value="0" checked> <span>{{__('app.By_portal')}}</span>
                            <input type="radio" name="contact_type" value="1"> <span>{{__('app.By_phone')}}</span>
                            <input type="radio" name="contact_type" value="2"> <span>{{__('app.By_email')}}</span>
                            <input type="radio" name="contact_type" value="3"> <span>{{__('app.By_website')}}</span>
                            <input type="radio" name="contact_type" value="4"> <span>{{__('app.By_any')}}</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">{{__('app.Website')}} <span>({{__('app.optional')}})</span></label>
                            <input type="text" name="website" class="form-control" placeholder="http://">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Job Tags <span>({{__('app.optional')}})</span></label>
                            <input type="text" class="form-control" placeholder="e.g.PHP,Social Media,Management">
                            <p class="note">Comma separate tags, such as required skills or technologies, for this job.</p>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="image" id="validatedCustomFile">
                            <label class="custom-file-label form-control" for="validatedCustomFile">{{__('app.Choose_image')}}...</label>
                        </div>
                        <center><button type="submit" class="btn btn-common">{{__('app.Add_vacancy')}}</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
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
