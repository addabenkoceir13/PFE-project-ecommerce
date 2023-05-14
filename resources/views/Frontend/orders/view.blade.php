@extends('layouts.indexFront')

@section('title', 'My Orders | TechShop')

@section('content')
    <section class="h-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center my-4">
            <div class="col-sm-12 col-md-7">
                <div class="card mb-4 ">
                <div class="card-header py-3 bg-primary text-white">
                    <h5 class="">Order View
                        <a href="{{ url('my-orders') }}" class="btn btn-dark float-end">Back</a>
                    </h5>
                </div>
                <div class="card-body bg-light">
                    <div class="d-flex justify-content-between">
                        <h4>Shipping Details</h4>
                        <p class="">{{ $orders->tracking_no }}</p>
                    </div>
                    <hr class="my-4">
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name </label>
                                <input class="form-control" value="{{ Auth::user()->fname }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" value="{{ Auth::user()->lname }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input class="form-control" value="{{ Auth::user()->email }}" disabled >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input  class="form-control" value="{{ Auth::user()->phone }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                <input  class="form-control" value="{{ Auth::user()->address2 }}" disabled>

                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Zip</label>
                                <input  class="form-control" value="{{ Auth::user()->pincode }}" disabled>
                            </div>
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-12 col-md-5">
                <div class="card mb-4">
                <div class="card-header text-white bg-primary py-3">
                    <h5 class="mb-0">Order Details</h5>
                </div>
                <div class="card-body bg-light">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>Name </th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->ordersitems as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->products->name_prod }}</td>
                                <td>{{ $item->qty_prod }}</td>
                                @if ($item->products->selling_price > 0)
                                    <td>{{ $item->products->selling_price }} DZ</td>
                                @else
                                    <td>{{ $item->products->original_price }} DZ</td>
                                @endif
                                <td>
                                    <img src="{{ asset('assets/uploads/products/'. $item->products->image) }}" width="80px" alt="{{ 'image'.$item->products->image}}">
                                </td>
                                <td>
                                    <button  type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"  data-target="#confirmDeleteModal">
                                        <i class="bi bi-bag-x"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- Start delete modal --}}
                            <div class="modal fade" id="exampleModal{{$item->id}}" id="confirmDeleteModal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this Order {{$item->products->name_prod }}?
                                        </div>
                                        <div class="modal-footer orders-data">
                                            <form  method="POST">
                                                @csrf
                                                <input type="text" class="id_invoices" value="{{$item->id}}">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger deleted-order-item">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- end delete modal --}}
                        @endforeach
                        </tbody>
                    </table>
                    <hr class="my-2">
                    <h4 class="px-2">Grand Total: <span class="float-end">{{ $orders->price_total }} DZ</span> </h4>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>

@endsection
