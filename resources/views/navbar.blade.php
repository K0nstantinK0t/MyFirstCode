<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #E4E4E4">
    <div class="container-fluid">
        <a class="navbar-brand ms-2" href="{{url('/')}}">MySite</a>
            <ul class="navbar-nav justify-content-end">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}">Log out</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('registration')}}">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('authorization')}}">Authorization</a>
                    </li>
                @endif
            </ul>
    </div>
</nav>
