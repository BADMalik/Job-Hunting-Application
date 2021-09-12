@auth()
    @include('employer.layouts.navbars.navs.auth')
@endauth

@guest()
    @include('employer.layouts.navbars.navs.guest')
@endguest
