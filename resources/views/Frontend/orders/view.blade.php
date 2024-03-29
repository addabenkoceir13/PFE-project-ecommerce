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
                        {{-- <p class="">{{ $orders->tracking_no }}</p> --}}
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders->ordersitems as $item)
                            <tr>
                                <td>  {{$loop->iteration}}           </td>
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
                            </tr>
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
