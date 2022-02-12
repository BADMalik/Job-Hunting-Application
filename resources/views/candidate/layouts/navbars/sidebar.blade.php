<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-12 collapse-close ">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('candidate.home') }}">
                         {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('candidate.dashboard') }}">
                         {{ __('DashBoard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('candidate.applications') }}">
                         {{ __('View Applications Statuses') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('getShortlistedJobs') }}">
                         {{ __('View Shortlisted Jobss') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
