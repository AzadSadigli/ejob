@if(session('primary'))
<div class="alert alert-dismissible alert-primary" role="alert">
  {{Session::get('primary')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('secondary'))
<div class="alert alert-dismissible alert-secondary" role="alert">
  {{Session::get('secondary')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('success'))
<div class="alert alert-dismissible alert-success" role="alert">
  {{Session::get('success')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('danger'))
<div class="alert alert-dismissible alert-danger" role="alert">
  {{Session::get('danger')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('warning'))
<div class="alert alert-dismissible alert-warning" role="alert">
  {{Session::get('warning')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('info'))
<div class="alert alert-dismissible alert-info" role="alert">
  {{Session::get('info')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('light'))
<div class="alert alert-dismissible alert-light" role="alert">
  {{Session::get('light')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(session('dark'))
<div class="alert alert-dismissible alert-dark" role="alert">
  This is a dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
