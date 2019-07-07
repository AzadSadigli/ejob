<!DOCTYPE html>
<html>
<head>
  <style media="screen">
    body{
      margin: auto;
      width: 50%;
      color: #444343;
    }
    img{
      width: 100%;
    }
    .main{
      margin-top: 20px;
      /* border: 0.5px solid #1cc4f7;
      -webkit-box-shadow: 0px 0px 5px 0px rgba(28,196,247,0.5);
      -moz-box-shadow: 0px 0px 5px 0px rgba(28,196,247,0.5);
      box-shadow: 0px 0px 5px 0px rgba(28,196,247,0.5); */
    }
    .main p{
      padding: 10px;
    }
    .body{

    }
    footer{
      float: right;
      margin-top: 10px;
      color: #1cc4f7;
    }
    .list-section{
      font-style: italic;
    }
    .list-section b{
      color: black;
    }
  </style>
</head>
<body>
<div class="main">
  <div class="body">
    <p>{{$data['message']}}</p>
  </div>
  <div class="list-section">
    @if(!empty($data['company']))
    <p><b>{{__('app.Company')}}:</b> {{$data['company']}} </p>
    @endif
    <p><b>{{__('app.Job_title')}}:</b> {{$data['title']}}</p>
    @if(!empty($data['contact_number']))
    <p><b>{{__('app.Contact_number')}}:</b> {{$data['contact_number']}}</p>
    @endif
    @if(!empty($data['website']))
    <p><b>{{__('app.Company_website')}}:</b> {{$data['website']}}</p>
    @endif
    <p><b>{{__('app.Job_url')}}:</b> {{$data['job_url']}}</p>
  </div>
</div>
<footer>
  {{__('app.Copyright_website')}}
</footer>
</body>
</html>
