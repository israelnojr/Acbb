<!-- Left Panel -->

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default" id="app">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{('/')}}">ACBB Admin</a>
                <a class="navbar-brand hidden" href="{{('/')}}">A</a>
            </div>
            <div id="main-menu"  class="main-menu collapse navbar-collapse">
            <!-- <route-vue></route-vue> -->
             <profile-form></profile-form>
            <ul class="nav navbar-nav">
                @can('dashboardPermission')
                    <li class="">
                        <a href="{{route('admin.dashboard')}}"> 
                        <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>                 
                @endcan
                <li class="menu-item-has-children dropdown active">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <i class="menu-icon fa fa-users"></i>Manage Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        @can('edit-user')
                        <li><i class="fa fa-puzzle-piece"></i><a href="{{route('admin.users.index')}}">All Users</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="{{route('admin.admins')}}">Admin Users</a></li>
                        @endcan
                        @can('dashboardPermission')
                        <li><i class="fa fa-user"></i><a href="{{route('admin.managers')}}">Zoner Managers</a></li>
                        @endcan
                        <li><i class="fa fa-cog"></i><a href="{{ route('user.profile.edit', Auth::user()->profile->id) }}">Update Info</a></li> 
                        <li><i class="fa fa-users"></i><a href="{{route('admin.zone.index')}}">Referrals</a></li>       
                    </ul>
                </li>

                <li class="menu-item-has-children dropdown active">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                    <i class="menu-icon fa fa-list-alt"></i>Manage Categories</a>
                    <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-list-alt"></i><a href="{{route('admin.create.category')}}">Create Category</a></li>
                        @can('edit-user')
                        <li><i class="fa fa-list-alt"></i><a href="{{route('admin.index.category')}}">All Categories</a></li>
                        @endcan
                        @can('dashboardPermission')
                        <li><i class="fa fa-list-alt"></i><a href="{{route('admin.mycategory.category')}}">My Categories</a></li>
                        @endcan
                    </ul>
                </li>  
                    
                <li class="">
                    <a href=""> 
                    <i class="menu-icon fa fa-dashbard"></i> <span class="label bedge-danger"></span></a>
                </li> 
            </ul>
            </div><!-- /.navbar-collapse -->

            <div class="navbar-header">  
                <a class="navbar-brand  btn-" data-toggle="modal" 
                data-target="#updateProfile" style="cursor: pointer;">Know Your Ward</a>
                <a class="navbar-brand hidden" 
                data-toggle="modal" data-target="#updateProfile" style="cursor: pointer;">K</a>
            </div>
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->