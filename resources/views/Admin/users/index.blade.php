@extends('layouts.admin')

@section('title', 'Users | Admin ')

@section('title-page-cat' , 'Users Page')

@section('content')
<div class="card border-0">
    <div class="header-body row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title">Users List</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <form action="">
                        <div class="search">
                            <input   type="search" name="name_user" id="search_users" class="search-input" placeholder="Search User...">
                            <a href="#" class="search-icon"> <i class="fa fa-search"></i> </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card p-2">
            <table class="table">
                <tbody id="users-list">
                </tbody>
            </table>
        </div>
        {{-- start Continair --}}
        <div class="container">
            <div class="row">
                @foreach ($users as $item)
                    <div class="col-sm-12 col-md-6 col-xl-4 mt-2">
                        <div class="card p-1 h-100">
                            <div class="card-body ">
                                <div class=" image d-flex flex-column justify-content-center align-items-center">
                                    @if ($item->image )
                                        <button class="btn  rounded-circle">
                                            <img src="{{ asset('assets/Frontend/Users/'.$item->image)}}" class="rounded-circle" height="100" width="100" />
                                        </button>
                                    @else
                                        <button class="btn  rounded-circle">
                                            <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" class="rounded-circle" height="100" width="100" />
                                        </button>
                                    @endif

                                    <h5 class="name mt-3 font-weight-bold">{{ $item->fname .' '.$item->lname}}</h5>
                                    <span class="mx-2 text-primray">{{ $item->role_as == '0' ? 'User':'Admin' }}</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Email:</span>
                                    <span class="text-muted">{{ $item->email}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Phone:</span>
                                    <span class="text-muted">{{ $item->phone}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Address1:</span>
                                    <span class="text-muted">{{ $item->address1}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Address2:</span>
                                    <span class="text-muted">{{ $item->address2}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">City:</span>
                                    <span class="text-muted">{{ $item->city}}</span>
                                </div>
                                <div class="d-flex  mt-3">
                                    @php
                                        $orderitemuser = App\Models\Order::where('id_user', $item->id)->count();
                                    @endphp
                                    <span class="number">Purchased <b>{{ $orderitemuser}}</b>  items from our store </span>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="rounded  date ">
                                    <span class="join">Joined {{ $item->created_at->format('d M Y')}}</span>
                                </div>
                                <div>
                                    @if ($item->role_as == 1)
                                        <a href="{{ url('view-user/'.$item->id)}}" type="button" class="btn btn-outline-success "><i class="bi bi-person-fill-up"></i></a>
                                    @else
                                        <a href="{{ url('view-user/'.$item->id)}}" type="button" class="btn btn-outline-success "><i class="bi bi-person-fill-up"></i></a>
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $item->id }}">
                                            <i class="bi bi-person-dash-fill"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            {{-- Start Modal Delet user --}}
                            <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered users_date" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this user {{ $item->fname .' '.$item->lname }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST">
                                                <input type="hidden" class="id_user" name="id_user" value="{{ $item->id }}">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger daleted-users">Delete</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- end Modal Delet user --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
