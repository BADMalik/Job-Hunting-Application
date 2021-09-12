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
                    <a class="nav-link" href="{{ route('employer.home') }}">
                         {{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.dashboard') }}">
                         {{ __('DashBoard') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.schedule') }}">
                         {{ __('Open Your Calender') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employer.company.create') }}">
                         {{ __('Create Company') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('employer.createjob')}}" >

                        <span class="nav-link-text">{{ __('Create Job') }}</span>
                    </a>
                    <a class="nav-link " href="{{route('employer.companies')}}" >

                        <span class="nav-link-text">{{ __('View Your Companies') }}</span>
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employer.profile.edit') }}">
                            {{ __('User profile') }}
                        </a>
                    </li>
                </li>

            </ul>
        </div>
    </div>
</nav>
