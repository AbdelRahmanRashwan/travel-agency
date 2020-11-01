<header class="mb-5">
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 offset-md-1 py-4">
                    <ul class="list-unstyled">
                        @auth
                            <li>
                                <a href="{{ url('/home') }}" class="text-white nav-item text-sm text-gray-700 underline">Profile</a>
                            </li>
                            <li>
                                <a href="{{ url('/trip/user') }}" class="text-white nav-item text-sm text-gray-700 underline">My Trios</a>
                            </li>
                        @if (Auth::user()->type == 'admin')
                            <li>
                                <a href="{{ url('/trip/create') }}" class="text-white nav-item text-sm text-gray-700 underline">Create Trip</a>
                            </li>
                        @endif
                            <li>
                                <form method="post" action="/logout" class="d-inline">
                                    @csrf
                                    <input type="submit" value="Sign Out" style="background: none;border: none;" class="text-white nav-item">
                                </form>
                            </li>
                            <a class="nav-link dropdown-toggle d-inline" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="badge badge-danger ml-2">{{sizeof(Auth::user()->unreadNotifications)}}</span>
                                <i class="fas fa-bell"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-5">
                                @foreach (Auth::user()->unreadNotifications as $notification)
                                    <a class="dropdown-item waves-effect waves-light" href="{{$notification->data['action_url']}}">
                                        {{$notification->data['title']}}
                                    </a>
                                @endforeach
                                <a href="/notification/mark-as-read">mark as read</a>
                            </div>
                        @else
                            <li class="text-white">
                                <a href="{{ route('login') }}" class="text-white nav-item text-sm text-gray-700 underline">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a  href="{{ route('register') }}" class="text-white nav-item ml-4 text-sm text-gray-700 underline">Register</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Travel Agency</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
