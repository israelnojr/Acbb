 <!--============================= HEADER =============================-->
 <div class="nav-menu">
    <div class="bg transition">
        <div class="container-fluid fixed">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand logo wrapper" href="{{ ('/')}}"><img style=" width: 23%;" src="{{asset('logo/acbb_logo.png')}}" alt="">
                         <span class="logo_text">Anambra Can Be Better With Ezeemo </span>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" 
                        data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" 
                        aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                @guest
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" 
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                        <span class="icon-arrow-down"></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('user.profile.show', Auth::user()->id) }}">{{ __('Profile') }}</a>
                                        @can('dashboardPermission')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>                                           
                                        @endcan
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </li>
                                @endguest
                                <li><a href="{{route('user.create.post')}}" class="btn btn-outline-light top-btn"><span class="ti-plus"></span> {{ __('Submit Post') }}</a></li>
                            </ul>
                        </div>
                    </nav>
                    @include('layouts.frontend.partial.message')
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .logo_text{
        top: 19px;
        position: relative;
        font-size: 8px;
        right: 138px;
    }
</style>
 
 