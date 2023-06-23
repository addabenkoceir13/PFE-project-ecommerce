<nav class="navbar sticky-top navbar-expand-lg navbar-light  bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/')}}">TechShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : ''; }}" aria-current="page" href="{{ url('/')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('categorys') ? 'active' : ''; }}" href="{{ url('categorys/')}}">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link position-relative {{ Request::is('cart') ? 'active' : ''; }}" href="{{ url('cart/')}}">Cart
                <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger  cart-count">

                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link position-relative {{ Request::is('wishlist') ? 'active' : ''; }}" href="{{ url('wishlist/')}}">wishlist
                <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger  wishlist-count">

                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
        </li>
        </ul>
        <div class="col-md-3 mx-3 ">
            <form action="{{ url('searchproduct')}}" method="POST">
                @csrf
                <div class="input-group ">
                    <input class="form-control border border-secondary bg-light text-white" name="name_prod" type="search"  placeholder="Search Products" id="search_product" required>
                    <button class="btn btn-outline-secondary bg-light border-start-0  border border-secondary ms-n5" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a href="{{ route('login')}}" class="btn btn-outline-success mx-2" >{{ __('Log In') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                            <a href="{{ route('register')}}" class="btn btn-success mx-2" >{{ __('Sign Up') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        {{ Auth::user()->name }}<img class="mx-2 rounded-circle" width="30px" height="28px" src="{{ asset('assets/Frontend/Users/'. Auth::user()->image)}}" alt="">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ url('my-profile')}}">My Profil</a></li>
                        <li><a class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a></li>
                        <li><a class="dropdown-item" href="#">Setting</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>


    </div>
    </div>
</nav>
