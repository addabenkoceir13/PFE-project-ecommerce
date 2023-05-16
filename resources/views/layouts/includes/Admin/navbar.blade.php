<!-- Top navigation-->
<nav class="navbar position-static  navbar-expand-lg navbar-light bg-w border-bottom">
    <div class="container-fluid">
        <button class="btn btn-outline-primary" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link" ></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute  translate-middle badge rounded-pill bg-danger  order-count">
                            <span id="product-requests" class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @php
                            $orders = App\models\Order::where('status', '0')->get();
                        @endphp
                        @foreach ($orders as $item)
                            <li><a class="dropdown-item" href="{{ url('admin/view-order/'.$item->id)}}">{{ $item->tracking_no }}</a></li>
                        @endforeach
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ url('orders')}}">View All </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="d-flex align-items-center justify-content-center p-2 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <img class="mx-1 rounded-circle" src="{{ asset('assets/Frontend/users/'. Auth::user()->image)}}" alt="mdo" width="30" height="30" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('admin-profile')}}">My Profil</a>
                        <a class="dropdown-item" href="{{ url('admin')}} ">Admin </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Page content-->
