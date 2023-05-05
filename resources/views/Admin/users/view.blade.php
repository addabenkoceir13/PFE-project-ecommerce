@extends('layouts.admin')

@section('title', 'Users | Admin ')

@section('title-page-cat' , 'Users Page')

@section('content')
<div class="card border-0">
    <div class="header-body row">
        <h1 class="">Users Details
            <a href="{{ url('users') }}" class="btn btn-dark float-end">Users</a>
        </h1>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-10 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        @if ($user->image > 0)
                                            <img src="{{ asset('assets/Frontend/Users/'.$user->image)}}" class="rounded-circle" height="100" width="100" />
                                        @else
                                            <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" height="100" width="100" class="img-radius rounded-circle" alt="User-Profile-Image">
                                        @endif
                                    </div>
                                    <h6 class="f-w-600">{{ $user->fname }}</h6>
                                    <p>{{ $user->role_as == '0' ? 'User':'Admin' }}</p>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{ $user->email }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phone</p>
                                            <h6 class="text-muted f-w-400">{{ $user->phone }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Address 1</p>
                                            <h6 class="text-muted f-w-400">{{ $user->address1 }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Address 2</p>
                                            <h6 class="text-muted f-w-400">{{ $user->address2 }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">City</p>
                                            <h6 class="text-muted f-w-400">{{ $user->city }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">State</p>
                                            <h6 class="text-muted f-w-400">{{ $user->state }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Country</p>
                                            <h6 class="text-muted f-w-400">{{ $user->Country }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Code Zip</p>
                                            <h6 class="text-muted f-w-400">{{ $user->pincode }}</h6>
                                        </div>
                                    </div>
                                    {{-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Purchases</h6>
                                    <div class="row">
                                        @php
                                            $phones = App\Models\Orders::where('id_user', '1')->count();
                                        @endphp
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Phones</p>
                                            <h6 class="text-muted f-w-400">{{ $phones}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Computers</p>
                                            <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
