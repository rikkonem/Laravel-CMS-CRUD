

<a href="{{url('/')}}" class="logo">Home</a>

    @auth
        <a class="user-name" tabindex="0" href="#" >{{Auth::user()->username}}</a>

        <nav id="nav"  class="navigation">
            <li class="nav-item"><a href="{{url('/posts/create')}}" class="nav-item-link">Create post</a></li>
            @if(Auth::user()->isAdmin())
            <li class="nav-item"><a href="{{url('/add-user')}}" class="nav-item-link">Add User</a></li>
            @endif
            <li class="nav-item"><a href="{{url('/settings/passwordChange')}}" class="nav-item-link">Change Password</a></li>
            <li class="nav-item"><a href="{{url('/settings/emailChange')}}" class="nav-item-link">Change Email</a></li>
            <li class="nav-item"><a href="{{url('/logout')}}" class="nav-item-link">Logout</a></li>
        </nav>
    @endauth


