@extends('layouts.master')
@section('head')
<title>@if(Request::is('/all-resumes')) {{__('app.All_my_resumes')}} @else
  {{trans('app.My_resume_section',['name' => Auth::user()->name])}} @endif</title>
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
                    <h3>@if(Request::is('/all-resumes')) {{__('app.All_my_resumes')}} @else {{trans('app.My_resume_section',['name' => Auth::user()->name])}} @endif</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            @include('layouts.prof-nav')
            @if(Request::is('all-resumes'))
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="job-alerts-item candidates">
                    <h3 class="alerts-title">{{__('app.Manage_Resumes')}}</h3>
                    @include('layouts.alerts')
                    @foreach($resumes as $resume)
                    <div class="manager-resumes-item">
                        <div class="manager-content">
                            <a href="/my-resume/{{$resume->id}}"><img class="resume-thumb" src="/img/default.png" alt="{{$resume->full_name}}"></a>
                            <div class="manager-info">
                                <div class="manager-name">
                                    <h4><a href="/my-resume/{{$resume->id}}">{{$resume->full_name}}</a> </h4>
                                    <h5>{{$resume->title}}</h5>
                                </div>
                                <div class="manager-meta">
                                    <span class="location"><i class="lni-map-marker"></i> {{$resume->location}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="update-date">
                            <p class="status">
                                {!! trans('app.Updated_on_resume',['date' => $resume->updated_at->format('M d, Y')]) !!}
                            </p>
                            <div class="action-btn" id="resume_act{{$resume->id}}">
                                @if($resume->status == 1)
                                <a class="btn btn-xs btn-gray" onclick="hide_my_res({{$resume->id}})"><span id="loading{{$resume->id}}"></span> {{__('app.Hide')}}</a>
                                @else
                                <a class="btn btn-xs btn-gray" onclick="show_my_res({{$resume->id}})"><span id="loading{{$resume->id}}"></span> {{__('app.Show')}}</a>
                                @endif
                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteresume{{$resume->id}}">{{__('app.Delete')}}</a>
                            </div>
                        </div>
                    </div>
                    <div id="deleteresume{{$resume->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5>{{__('app.Delete_resume')}}</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <form action="/delete/resume/{{$resume->id}}" method="POST">
                            @csrf
                            <div class="modal-body">
                              <p>{{__('app.Are_you_sure_to_delete')}}</p>
                              <div class="form-group">
                                  <label class="control-label">{{__('app.Password')}}</label>
                                  <input type="password" class="form-control" name="password" placeholder="{{__('app.Password')}}..." required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                              <button type="submit" class="btn btn-primary">{{__('app.Delete')}}</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <a class="btn btn-common btn-sm" href="/start/resume/personal-information">{{__('app.Add_resume')}}</a>
                </div>
            </div>
            @elseif(Request::is('my-resume/*'))
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="inner-box my-resume">
                  @include('layouts.alerts')
                    <div class="author-resume" id="myResCh">
                        <div class="thumb">
                            <img src="/img/default.png" alt="{{$res->full_name}}">
                        </div>
                        <div class="author-info">
                            <h3>{{$res->full_name}} <small style="text-transform:lowercase;"> ({{$res->email}}) </small> <span class="float-right"><a class="btn btn-common" href="/r/{{$res->username}}" title="{{__('app.Preview')}}"><i class="fa fa-eye"></i> </a>
                              <a class="btn btn-common" data-toggle="modal" data-target="#edit_res"><i class="fa fa-edit"></i></a></span></h3>
                            <p class="sub-title">{{$res->title}}</p>
                            <p><span class="address"><i class="lni-map-marker"></i>{{$res->location}}</span> <span><i class="ti-phone"></i>{{$res->phone_number}}</span></p>
                            <div class="social-link" id="social_link">
                                @foreach($sns = App\Socnet::where('res_id',$res->id)->get() as $sn)
                                <span class="dropdown">
                                  <a class="dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="{{$sn->icon}}"></i></a>
                                  <div class="dropdown-menu dropdown-primary">
                                    <a class="dropdown-item" href="{{$sn->link}}" target="_blank">{{__('app.View')}}</a>
                                    <a class="dropdown-item" href="#">{{__('app.Edit')}}</a>
                                    <a class="dropdown-item" onclick="deletesocnet({{$sn->id}})">{{__('app.Delete')}}</a>
                                  </div>
                                </span>
                                @endforeach
                                <a onclick="add_new_sn()" id="add_new_id" class="add-sn-btn"><i class="fa fa-plus"></i></a>
                                <a onclick="add_new_sn_close()" id="add_new_id_close" class="add-sn-btn" style="display:none;"><i class="fa fa-times"></i></a>
                                <img id='loading-image' src='https://www.motorcoachjobs.com/Images/LoaderGIF/blue-original-loading-animation-large.gif' style='height:15px;display:none;'>
                            </div>
                        </div>
                        <div class="input-group addsn" id="add_sn"></div>
                    <div class="about-me item">
                        <h3>{{__('app.About')}}</h3>
                        <p>{{$res->about_me}} </p>
                    </div>
                    <div class="skills item">
                        <h3>{{__('app.Skills')}} <a class="add" data-toggle="modal" data-target="#addskillpop" title="{{__('app.Add_skill')}}" onclick="skilladdfunc()"><i class="fa fa-plus"></i> </a></h3>
                        <div class="skills-list" id="mySkilllist">
                        @foreach($skills = App\Skill::where('res_id',$res->id)->get() as $skill)
                          <div class="skill-item">
                            <h4>{{$skill->skill}}  <a class="float-right rmv-section" data-toggle="modal" data-target="#deleteskillpop" onclick="getskilldelete({{$skill->id}})"> <i class="fa fa-trash"></i></a>
                              <a class="float-right edit-section" data-toggle="modal" data-target="#editskillpop" onclick="skilleditfunc({{$skill->id}})"> <i class="fa fa-edit"></i>  </a> </h4>
                          </div>
                        @endforeach
                      </div>
                      <div id="editskillpop" class="modal fade" role="dialog"></div>
                      <div id="addskillpop" class="modal fade" role="dialog"></div>
                      <div id="deleteskillpop" class="modal fade" role="dialog"></div>
                    <div class="work-experence item">
                        <h3>{{__('app.Work_Experience')}}</h3>
                        <div id="myExplist">
                          @foreach($exps = App\Exp::where('res_id',$res->id)->get() as $exp)
                            <div class="myexp_child">
                              <h4>{{$exp->position}} <a class="float-right rmv-section" onclick="getexperiencedelete({{$exp->id}})" data-toggle="modal" data-target="#deleteexp"> <i class="fa fa-trash"></i>  </a>
                                <a class="float-right edit-section" > <i class="fa fa-edit"></i>  </a> </h4>
                              <h5>{{$exp->company}}</h5>
                              @php($year = ((\Carbon\Carbon::parse($exp->end_date)->format('Y') - \Carbon\Carbon::parse($exp->start_date)->format('Y')) * 12) + (\Carbon\Carbon::parse($exp->end_date)->format('m') - \Carbon\Carbon::parse($exp->start_date)->format('m'))/12)
                              <span class="date">{{\Carbon\Carbon::parse($exp->start_date)->format('M Y')}}-{{\Carbon\Carbon::parse($exp->end_date)->format('M Y')}} ({{$year}})</span>
                              <p>{{$exp->description}}</p>
                            </div>
                          @endforeach
                        </div>
                        <div id="deleteexp" class="modal fade" role="dialog"></div>
                        <hr>
                        <div class="add-post-btn">
                            <div class="float-right">
                                <a class="extra-btn" data-toggle="modal" data-target="#addexp"> {{__('app.Add_experience')}} </a>
                            </div>
                        </div>
                        <div id="addexp" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5>{{__('app.Work_Experience')}}</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">{{__('app.Company')}}</label>
                                    <input type="text" class="form-control" id="company" placeholder="{{__('app.Company')}}...">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('app.Position')}}</label>
                                    <input type="text" class="form-control" id="position" placeholder="{{__('app.Position')}}...">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">{{__('app.Date_From')}}</label>
                                            <input type="month" class="form-control" id="date_from" min="1970-01">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{__('app.Date_To')}}</label>
                                            <input type="month" class="form-control" id="date_to" min="1970-01">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('app.Description')}}</label>
                                    <textarea name="name" class="form-control" id="job_description" placeholder="{{__('app.Description')}}..." rows="3"></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                                <button type="button" class="btn btn-primary" id="addnewexp">{{__('app.Add')}}</button>
                              </div>
                            </div>

                          </div>
                        </div>
                    </div>
                    <input type="hidden" id="res_id" value="{{$res->id}}">
                    <div class="education item">
                        <h3>{{__('app.Education')}}</h3>
                        <div id="myEdulist">
                          @foreach($edus = App\Edu::where('res_id',$res->id)->get() as $edu)
                            <div class="myedu_child">
                              <h4>{{$edu->school}}  <a class="float-right rmv-section" data-toggle="modal" data-target="#deleteedupop" onclick="getedudelete({{$edu->id}})"> <i class="fa fa-trash"></i></a>
                                <a class="float-right edit-section"> <i class="fa fa-edit"></i>  </a> </h4>
                              <p>{{$edu->degree}} / {{$edu->field}}</p>
                              <span class="date">{{\Carbon\Carbon::parse($edu->start_date)->format('Y')}}-{{\Carbon\Carbon::parse($edu->end_date)->format('Y')}}</span>
                            </div>
                          @endforeach
                        </div>
                        <div id="deleteedupop" class="modal fade" role="dialog"></div>
                        <hr>
                        <div class="add-post-btn">
                            <div class="float-right">
                                <a class="extra-btn" data-toggle="modal" data-target="#addedu"> {{__('app.Add_education')}} </a>
                            </div>
                        </div>
                        <div id="addedu" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5>{{__('app.Add_education')}}</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label">{{__('app.Degree')}}</label>
                                    <input type="text" id="degree" class="form-control" placeholder="{{__('app.Degree')}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('app.Field_of_Study')}}</label>
                                    <input type="text" id="field" class="form-control" placeholder="{{__('app.Field_of_Study')}}...">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('app.School')}}</label>
                                    <input type="text" id="school" class="form-control" placeholder="{{__('app.School')}}...">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">{{__('app.From')}}</label>
                                            <input type="month" id="from" class="form-control" min="1960-01">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{__('app.To')}}</label>
                                            <input type="month" id="to" class="form-control" min="1960-01">
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                                <button type="button" class="btn btn-primary" id="addnewedu">{{__('app.Add')}}</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit_res" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>{{__('app.Edit_resume')}}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                    <div class="modal-body" id="res_modal_div">
                          <div class="form-group">
                              <label class="control-label">{{__('app.Name')}}</label>
                              <input type="text" class="form-control" id="full_name" value="{{$res->full_name}}" placeholder="{{__('app.Name')}}..." required>
                          </div>
                          <div class="form-group">
                              <label class="control-label"></label>
                              <label class="control-label">{{__('app.Email')}}</label>
                              <input type="text" class="form-control" id="official_email" value="{{$res->email}}" placeholder="{{__('app.Email')}}..." required>
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Profession_title')}}</label>
                              <input type="text" class="form-control" id="title" value="{{$res->title}}" placeholder="{{__('app.Profession_title')}}..." required>
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
                              <label class="control-label">{{__('app.Personal_website')}} ({{__('app.optional')}})</label>
                              <input type="text" class="form-control" id="website" value="{{$res->website}}" placeholder="{{__('app.Personal_website')}}...">
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Username')}}</label>
                              <input type="text" class="form-control" id="username" value="{{$res->username}}" placeholder="{{__('app.Username')}}...">
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Contact_number')}}</label>
                              <input type="text" class="form-control" id="phone_number" value="{{$res->phone_number}}" placeholder="{{__('app.Contact_number')}}...">
                          </div>
                          <div class="form-group">
                            <label class="control-label">{{__('app.Location')}}</label>
                              <div class="search-category-container">
                                <label class="styled-select">
                                  <select class="dropdown-product selectpicker" id="status">
                                    <option value="0">{{__('app.Not_active')}}</option>
                                    <option value="1">{{__('app.Active')}}</option>
                                  </select>
                                </label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.About_me')}}</label>
                              <textarea id="about_me" rows="8" class="form-control" placeholder="{{__('app.About_me')}}..." required>{{$res->about_me}}</textarea>
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Age')}}</label>
                              <input type="text" class="form-control" value="{{\Carbon\Carbon::parse(Auth::user()->birthdate)->age}}" disabled>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                            <button type="button" class="btn btn-common" onclick="editres_f()">{{__('app.Update')}}</button>
                          </div>
                </div>
              </div>
            </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('foot')
<script type="text/javascript">
jQuery(document).ready(function(){
  jQuery('#addnewedu').click(function(e){
    e.preventDefault();
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    jQuery.ajax({
      url: "/create-resume-education",
      method: 'POST',
      data: {
        degree: jQuery('#degree').val(),
        res_id: jQuery('#res_id').val(),
        field: jQuery('#field').val(),
        school: jQuery('#school').val(),
        // from: $("input[name='commenter_rating']:checked").val(),
        start_date: jQuery('#from').val(),
        end_date: jQuery('#to').val(),
      },
        error: function(result){
          if (!$('#degree').val()) {jQuery('#degree').css('border','1px solid red');}
          if(!$('#field').val()) {jQuery('#field').css('border','1px solid red');}
          if(!$('#school').val()){jQuery('#school').css('border','1px solid red');}
          if(!$('#from').val()){jQuery('#from').css('border','1px solid red');}
          if(!$('#to').val()){jQuery('#to').css('border','1px solid red');}
      },
      success: function(result){
          jQuery('#degree').css('border','1px solid #ccc').val("");
          jQuery('#field').css('border','1px solid #ccc').val("");
          jQuery('#school').css('border','1px solid #ccc').val("");
          jQuery('#from').css('border','1px solid #ccc').val("");
          jQuery('#to').css('border','1px solid #ccc').val("");
          $('#addedu').modal('toggle');
          $("#myEdulist").load(location.href+" #myEdulist>*","");
    }});
  });
  jQuery('#addnewexp').click(function(e){
    e.preventDefault();
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    if ($('#company').val() != '' && $('#position').val() != '' && $('#date_from').val() != '' && $('#date_to').val() != '' && $('#job_description').val() !='' ) {
      jQuery.ajax({
        url: "/create-resume-experience",
        method: 'POST',
        data: {
          company: jQuery('#company').val(),
          position: jQuery('#position').val(),
          // from: $("input[name='commenter_rating']:checked").val(),
          start_date: jQuery('#date_from').val(),
          end_date: jQuery('#date_to').val(),
          description: jQuery('#job_description').val(),
          res_id: jQuery('#res_id').val(),
        },
        error: function(result){
            console.log('error');
        },
        success: function(result){
            jQuery('#company').css('border','1px solid #ccc').val("");
            jQuery('#position').css('border','1px solid #ccc').val("");
            jQuery('#date_from').css('border','1px solid #ccc').val("");
            jQuery('#date_to').css('border','1px solid #ccc').val("");
            jQuery('#job_description').css('border','1px solid #ccc').val("");
            $('#addexp').modal('toggle');
            $("#myExplist").load(location.href+" #myExplist>*","");
            console.log('success');
      }});
    }else{
      if (!$('#company').val()) {jQuery('#company').css('border','1px solid red');}
      if(!$('#position').val()) {jQuery('#position').css('border','1px solid red');}
      if(!$('#date_from').val()){jQuery('#date_from').css('border','1px solid red');}
      if(!$('#date_to').val()){jQuery('#date_to').css('border','1px solid red');}
      if(!$('#job_description').val()){jQuery('#job_description').css('border','1px solid red');}
    }
  });
  jQuery('#editres').click(function(e){
  });
});
function editres_f(){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  $('#loading-image').show();
  var id = jQuery('#res_id').val();
  jQuery.ajax({
    url: "/edit-resume/"+id,
    method: 'POST',
    data: {
      full_name: jQuery('#full_name').val(),
      official_email: jQuery('#official_email').val(),
      title: jQuery('#title').val(),
      website: jQuery('#website').val(),
      username: jQuery('#username').val(),
      status: jQuery('#status').val(),
      about: jQuery('#about_me').val(),
      phone_number: jQuery('#phone_number').val(),
      location: jQuery('#location').val(),
    },
      error: function(result){
        if(!$('#full_name').val()) {$('#full_name').css('border','1px solid red');}
        if(!$('#official_email').val()){$('#official_email').css('border','1px solid red');}
        if(!$('#title').val()){$('#title').css('border','1px solid red');}
        if(!$('#username').val()){$('#username').css('border','1px solid red');}
        if(!$('#about_me').val()){$('#about_me').css('border','1px solid red');}
        if(!$('#location').val()){$('#location').css('border','1px solid red');}
    },
    success: function(result){
        $('#full_name').css('border','1px solid #ccc').val("");
        $('#official_email').css('border','1px solid #ccc').val("");
        $('#title').css('border','1px solid #ccc').val("");
        $('#username').css('border','1px solid #ccc').val("");
        $('#about_me').css('border','1px solid #ccc').val("");
        $('#location').css('border','1px solid #ccc').val("");

        $('#edit_res').modal('toggle');
        $("#myResCh").load(location.href+" #myResCh>*","");
        $("#res_modal_div").load(location.href+" #res_modal_div>*","");
    },
    complete: function(){
      $('#loading-image').hide();
    }
  });
}
function deleteedu_function(id){
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
        url: "/education/delete/"+id,
        type: 'GET',
        dataType: "JSON",
        data: {"id": id },
        success: function (response){
            $('#deleteedupop').modal('toggle');
            $("#myEdulist").load(location.href+" #myEdulist>*","");
        },
    });
}
function deletesocnet(id){
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  $('#loading-image').show();
    $.ajax({
        url: "/socnet/delete/"+id,
        type: 'GET',
        dataType: "JSON",
        data: {"id": id },
        success: function (response){
            $("#social_link").load(location.href+" #social_link>*","");
        },
        complete: function(){
          $('#loading-image').hide();
        }
    });
}
function deleteexp_function(id){
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
        url: "/experience/delete/"+id,
        type: 'GET',
        dataType: "JSON",
        data: {"id": id },
        success: function (response){
            $('#deleteexp').modal('toggle');
            $("#myExplist").load(location.href+" #myExplist>*","");
            // console.log(response);
        },
       //  error: function(xhr) {
       //   console.log('failed ' + id);
       // }
    });
}
function geteduedit(id){console.log(id);}
function getedudelete(e_id){
  document.getElementById('deleteedupop').innerHTML = "<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Delete_education')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'><p>{{__('app.Are_you_sure_to_delete')}}</p></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.No')}}</button><a class='btn btn-primary' onclick='deleteedu_function("+e_id+")'>{{__('app.Yes')}}</a></div></div></div>";
  console.log(e_id);
}
function getexperiencedelete(e_id){
  document.getElementById('deleteexp').innerHTML = "<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Delete_experience')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'><p>{{__('app.Are_you_sure_to_delete')}}</p></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.No')}}</button><button type='button' class='btn btn-primary' onclick='deleteexp_function("+e_id+")'>{{__('app.Yes')}}</button></div></div></div>";
  console.log(e_id);
}
function add_skill_func(){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  if ($('#skill').val() != '') {
    jQuery.ajax({
      url: "/add-new-skill",
      method: 'POST',
      data: {
        skill: $('#skill').val(),
        res_id: $('#res_id').val(),
      },
      error: function(result){
      },
      success: function(result){
          $('#skill').css('border','1px solid #ccc').val("");
          $('#addskillpop').modal('toggle');
          $("#mySkilllist").load(location.href+" #mySkilllist>*","");
    }});
  }else{$('#skill').css('border','1px solid red');}
}
function add_new_socnet(){
    if (jQuery('#socnet_site').val() != "" & jQuery('#socnet_url').val() != "" & jQuery('#res_id').val() != "") {
      $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      $('#loading-image').show();
      jQuery.ajax({
        url: "/add-social-network",
        method: 'POST',
        data: {
          site: jQuery('#socnet_site').val(),
          link: jQuery('#socnet_url').val(),
          res_id: jQuery('#res_id').val(),
        },
        error: function(result){
            if(!$('#socnet_url').val()){jQuery('#socnet_url').css('border','1px solid red');}
            console.log('error');
        },
        success: function(result){
            jQuery('#socnet_url').css('border','1px solid #ccc').val("");
            document.getElementById("add_sn").innerHTML = "";
            $("#social_link").load(location.href+" #social_link>*","");
            console.log('success');
        },
        complete: function(){
          $('#loading-image').hide();
        }
      });
    }
}
function deleteexp_function(id){
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
        url: "/experience/delete/"+id,
        type: 'GET',
        dataType: "JSON",
        data: {"id": id },
        success: function (response){
            $('#deleteexp').modal('toggle');
            $("#myExplist").load(location.href+" #myExplist>*","");
            // console.log(response);
        },
       //  error: function(xhr) {
       //   console.log('failed ' + id);
       // }
    });
}
function deleteskill_function(id){
  $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    $.ajax({
        url: "/skill/delete/"+id,
        type: 'GET',
        dataType: "JSON",
        data: {"id": id },
        success: function (response){
            $('#deleteskillpop').modal('toggle');
            $("#mySkilllist").load(location.href+" #mySkilllist>*","");
            // console.log(response);
        },
       //  error: function(xhr) {
       //   console.log('failed ' + id);
       // }
    });
}
function skilladdfunc(){
  document.getElementById("addskillpop").innerHTML = "<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Add_skill')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'> <div class='form-group'><label class='control-label'>{{__('app.Skill')}}</label><input type='text' maxlength='50' id='skill' class='form-control' placeholder='{{__('app.Skill')}}...'></div></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button><a class='btn btn-primary' onclick='add_skill_func()'>{{__('app.Add')}}</a></div></div></div>";
}
function skilleditfunc(id){
  document.getElementById("editskillpop").innerHTML = "<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Delete_skill')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'> <div class='form-group'><label class='control-label'>{{__('app.Skill')}}</label><input type='text' id='skill' class='form-control' placeholder='{{__('app.Skill')}}...'></div></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button><a class='btn btn-primary' onclick='add_skill_func()'>{{__('app.Add')}}</a></div></div></div>";
}
function getskilldelete(e_id){
  document.getElementById("deleteskillpop").innerHTML = "<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Delete_skill')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'><p>{{__('app.Are_you_sure_to_delete')}}</p></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.No')}}</button><a class='btn btn-primary' onclick='deleteskill_function("+e_id+")'>{{__('app.Yes')}}</a></div></div></div>";
  console.log(e_id);
}
function add_new_sn(){
  document.getElementById("add_sn").innerHTML = "<div class='input-group-prepend'><select class='type' id='socnet_site'><option value='facebook'>Facebook</option><option value='instagram'>Instagram</option><option value='linkedin'>LinkedIn</option><option value='google-plus'>Google Plus</option><option value='twitter'>Twitter</option></select></div><input type='text' class='form-control' id='socnet_url' placeholder='URL...'><button type='button' onclick='add_new_socnet()'>{{__('app.Add')}}</button>";
  document.getElementById("add_new_id").style.display = "none";
  document.getElementById("add_new_id_close").style.display = "";
}
function add_new_sn_close(){
  document.getElementById("add_sn").innerHTML = "";
  document.getElementById("add_new_id").style.display = "";
  document.getElementById("add_new_id_close").style.display = "none";
}
function hide_my_res(id){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    document.getElementById("loading"+id).innerHTML = "<img id='loading-image' src='https://www.motorcoachjobs.com/Images/LoaderGIF/blue-original-loading-animation-large.gif' style='height:15px;display:none;'>"
    $('#loading-image').show();
    jQuery.ajax({
      url: "/hide-resume/"+id,
      method: 'POST',
        error: function(result){console.log("error");
      },
      success: function(result){
        $("#resume_act"+id).load(location.href+" #resume_act"+id+">*","");
      },
      complete: function(){
        $('#loading-image').hide();
        document.getElementById("loading"+id).innerHTML = ""
      }
    });
}
function show_my_res(id){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  document.getElementById("loading"+id).innerHTML = "<img id='loading-image' src='https://www.motorcoachjobs.com/Images/LoaderGIF/blue-original-loading-animation-large.gif' style='height:15px;display:none;'>"
  $('#loading-image').show();
  jQuery.ajax({
    url: "/show-resume/"+id,
    method: 'POST',
      error: function(result){console.log("error");
    },
    success: function(result){
      $("#resume_act"+id).load(location.href+" #resume_act"+id+">*","");
    },
    complete: function(){
      $('#loading-image').hide();
      document.getElementById("loading"+id).innerHTML = ""
    }
  });
}
</script>
@endsection
