<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('backend/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('backend/images/logo2.png')}}" alt="Logo"></a>
            </div>
        <div id="app"  class="main-menu collapse navbar-collapse">
        <!-- <route-vue></route-vue> -->
      
            @can('dashboardPermission')
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="{{route('admin.dashboard')}}"> 
                        <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown active">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <i class="menu-icon fa fa-users"></i>Manage Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            @can('edit-user')
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.users.index')}}">All Users</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{route('admin.admins')}}">Admin Users</a></li>
                            @endcan
                            <li><i class="fa fa-user"></i><a href="{{route('admin.managers')}}">Zoner Managers</a></li>
                            <li><i class="fa fa-user"></i><a href="{{route('admin.zone.index')}}">Referrals</a></li>       
                        </ul>
                    </li>                  
            @endcan
                
                <li>
                    <a  href=""> <i class="menu-icon fa fa-"></i>
                        <button type="button" class="btn btn-primary mb-1">
                            Know Your Ward
                        </button> 
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->