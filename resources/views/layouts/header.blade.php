<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
    <div class="container">
        <div class="theme-header clearfix">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                </button>
                <a href="/" class="navbar-brand logo-nav"><span>eJob</span></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="/">{{__('app.Home')}} </a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->name}} {{Auth::user()->surname}} <img class="us_av-header" src="/img/profile/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}} {{Auth::user()->surname}}"></a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/home">Profile</a></li>
                          <li><a class="dropdown-item" href="/add-vacancy">Add vacancy</a></li>
                          <li><a class="dropdown-item" href="/start/resume/personal-information">Add resume</a></li>
                          <li><a class="dropdown-item" href="/all-resumes">My resumes</a></li>
                          <li><a class="dropdown-item" href="/account-settings">Account settings</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="login">Sign In</a>
                    </li>
                    @endif
                    @if(Auth::check() && Auth::user()->role_id != 2)
                    @else
                    <li class="button-group">
                        <a href="/add-vacancy" class="button btn btn-common">Post a Job</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu" data-logo="/img/logo-mobile.png"></div>
</nav>
