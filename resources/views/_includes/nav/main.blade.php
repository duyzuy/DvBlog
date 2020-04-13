<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('home') }}">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-tab">Home</a>
                <a class="navbar-item is-tab">Documentation</a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link is-tab">More</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">About</a>
                        <a class="navbar-item">Jobs</a>
                        <a class="navbar-item">Contact</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">Report an issue</a>
                    </div>
                </div>
            </div>
    
            <div class="navbar-end">
                    @guest
                            <a class="navbar-item is-tab" href="{{ route('login') }}">{{ __('Login') }}</a>

                            @if (Route::has('register'))
                            
                                <a class="navbar-item is-tab" href="{{ route('register') }}">{{ __('Joint with us') }}</a>
                        
                            @endif
                    @else
                        <button class="nav-item dropdown is-aligned-right is-tab">
                           {{ Auth::user()->name }} <span class="icon"><i class="fa fa-caret-down"></i></span>

                            <ul class="dropdown-menu">
                                <li><a href=""><i class="fas fa-user m-r-5"></i>Profile</a></li>
                                <li><a href=""><i class="fas fa-bell m-r-5"></i>Notifications</a></li>
                                <li><a href="{{ route('manage.dashboard') }}"><i class="fas fa-cog m-r-5"></i>Manage</a></li>
                                <hr class="navbar-divider">
                                <li>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt m-r-5"></i>{{ __('Logout') }}</a>
                                </li>
                                

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </button>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>