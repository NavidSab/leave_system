<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <img
            src="assets/img/bootstraper-logo.png"
            alt="bootraper logo"
            class="app-logo"></div>
        <ul class="list-unstyled components text-secondary">
            <li>
                <a href="{{url('/')}}">
                    <i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="{{route('filemanager')}}">
                    <i class="fas fa-file-alt"></i>
                    FileManager</a>
            </li>
            <li>
                <a href="{{route('user')}}">
                    <i class="fas fa-user"></i>
                    User</a>
            </li>
            <li>
                <a href="{{route('role')}}">
                    <i class="fas fa-users"></i>
                    Role</a>
            </li>
            <li>
                <a href="{{route('permission')}}">
                    <i class="fas fa-users"></i>
                    Permission</a>
            </li>
            <li>
                <a href="{{route('menu')}}">
                    <i class="fas fa-list"></i>
                    Menu</a>
            </li>
        </ul>
        <?php  $public_menu = Menu::getByName('test'); ?>
        @if($public_menu)
        <ul class="nav navbar-nav side-nav">
            @foreach($public_menu as $menu)
            @if(Auth::user()->hasRole($menu['role_id']))
            @if( $menu['child'] )
            <li>
                <a href="#"  data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> {{ $menu['label'] }} <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                <ul id="submenu-1" class="collapse">
                    @foreach( $menu['child'] as $child )
                    @if(Auth::user()->hasRole($child['role_id']))
                    <li><a href="{{ $child['link'] }}"><i class="fa fa-angle-double-right"></i> {{ $child['label'] }}</a></li>                   
                    @endif
                    @endforeach
                </ul>
            </li>
            @else
            <li>
                <a href="{{ $menu['label'] }}" ><i class="fa fa-fw fa-user-plus"></i> {{ $menu['label'] }}</a>
            </li>
            @endif
            @endif
            @endforeach
        </ul>
        @endif
    </nav>
    <style>
        .collapse {list-style-type:none;}
        .side-nav { color:black;}
    </style>

