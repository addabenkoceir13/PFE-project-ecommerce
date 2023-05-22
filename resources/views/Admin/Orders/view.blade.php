@extends('layouts.admin')

@section('title', 'Orders | Admin ')

@section('title-page-cat' , 'Orders Page')

@section('content')
<section class="h-100 gradient-custom">
    <div class="container py-1">
        <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
            <div class="card mb-4 ">
            <div class="card-header py-3 bg-primary text-white">
                <h5 class="">Order View
                    <a href="{{ url('orders') }}" class="btn btn-dark float-end">Order</a>
                </h5>
            </div>
            <div class="card-body bg-light">
                <h4>Shipping Details</h4>
                <hr class="my-4">
                <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name </label>
                            <input class="form-control" value="{{ $orders->fname }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input class="form-control" value="{{ $orders->lname }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input class="form-control" value="{{ $orders->email }}" disabled >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input  class="form-control" value="{{ $orders->phone }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input  class="form-control" value="{{ $orders->address2 }}" disabled>

                        </div>
                        <div class="col-md-6">
                            <label  class="form-label">Zip</label>
                            <input  class="form-control" value="{{ $orders->pincode }}" disabled>
                        </div>
                        <hr class="my-4">
                        <div class="text-center">
                            <img class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop" src="{{ asset('assets/uploads/ccp/'. $orders->image)}}" width="620px" alt="{{ $orders->image}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
            <div class="card-header text-white bg-primary py-3">
                <h5 class="mb-0">Order Details</h5>
            </div>
            <div class="card-body bg-light">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name </th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->ordersitems as $item)
                            <tr>
                                <td>{{ $item->products->name_prod }}</td>
                                <td>{{ $item->qty_prod }}</td>
                                @if ($item->products->selling_price > 0)
                                    <td>{{ $item->products->selling_price }}</td>
                                @else
                                    <td>{{ $item->products->original_price }}</td>
                                @endif
                                <td>
                                    <img src="{{ asset('assets/uploads/products/'. $item->products->image) }}" width="80px" alt="{{ 'image'.$item->products->image}}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr class="my-2">
                <h4 class="px-2">Grand Total: <span class="float-end">{{ $orders->price_total }}</span> </h4>
                <hr class="my-2">
                <form action="{{ url('update-order/'.$orders->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-3">
                        <label class="form-label">Order Status</label>
                        <select class="form-select" name="order_status">
                            <option {{ $orders->status == '0' ? 'selected': ''}} value="0">Pending</option>
                            <option {{ $orders->status == '1' ? 'selected': ''}} value="1">Completed</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label class="form-label">The sum paid</label>
                        <input type="tel" class="form-control" pattern="[0-9]\w{2,16}" name="sum_paid"  title="pleas enter your the sum paid number" placeholder="The sum paid" required>
                    </div>
                    <div class="d-grid grap-2 mt-3">
                        <button type="submit" class="btn btn-outline-dark">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal modal-dialog modal-xl" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Image:  {{$orders->image}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('assets/uploads/ccp/'. $orders->image)}}" width="100%" alt=" $orders->image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
@endsection
