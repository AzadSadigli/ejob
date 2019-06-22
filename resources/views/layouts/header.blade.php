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
                <a href="/" class="navbar-brand"><img src="/assets/img/logo.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="/">{{__('app.Home')}} </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="about.html">About</a></li>
                            <li><a class="dropdown-item" href="job-page.html">Job Page</a></li>
                            <li><a class="dropdown-item" href="job-details.html">Job Details</a></li>
                            <li><a class="dropdown-item" href="resume.html">Resume Page</a></li>
                            <li><a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                            <li><a class="dropdown-item" href="pricing.html">Pricing Tables</a></li>
                            <li><a class="dropdown-item" href="contact.html">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Candidates</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="browse-jobs.html">Browse Jobs</a></li>
                            <li><a class="dropdown-item" href="browse-categories.html">Browse Categories</a></li>
                            <li><a class="dropdown-item" href="add-resume.html">Add Resume</a></li>
                            <li><a class="dropdown-item" href="manage-resumes.html">Manage Resumes</a></li>
                            <li><a class="dropdown-item" href="job-alerts.html">Job Alerts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Employers</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="post-job.html">Add Job</a></li>
                            <li><a class="dropdown-item" href="manage-jobs.html">Manage Jobs</a></li>
                            <li><a class="dropdown-item" href="manage-applications.html">Manage Applications</a></li>
                            <li><a class="dropdown-item" href="browse-resumes.html">Browse Resumes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="blog.html">Blog - Right Sidebar</a></li>
                            <li><a class="dropdown-item" href="blog-left-sidebar.html">Blog - Left Sidebar</a></li>
                            <li><a class="dropdown-item" href="blog-full-width.html"> Blog full width</a></li>
                            <li><a class="dropdown-item" href="single-post.html">Blog Single Post</a></li>
                        </ul>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/home">Profile</a></li>
                          <li><a class="dropdown-item" href="/add-vacancy">Add vacancy</a></li>
                          <li><a class="dropdown-item" href="/create-resume">Add resume</a></li>
                          <li><a class="dropdown-item" href="/user/resumes">My resumes</a></li>
                          <li><a class="dropdown-item" href="/user/settings">Account settings</a></li>
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
    <div class="mobile-menu" data-logo="/assets/img/logo-mobile.png"></div>
</nav>
