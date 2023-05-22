@extends('layouts.admin')

@section('title', 'Orders | Admin ')

@section('title-page-cat' , 'Orders Page')

@section('content')

<div class="container">
    <div class="card border-0">
        <div class="header-body row">
            <div class="col-md-12">
                <h4>New Orders
                    <a href="{{ url('order-history') }}" class="btn btn-dark float-end">Order History</a>
                </h4>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Tracking Number</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status  </th>
                        <th scope="col">Pay  </th>
                        <th scope="col">Action  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td scope="row">{{ $item->id}}</td>
                            <td>{{ $item->fname .' '. $item->lname}}</td>
                            <td>{{ $item->tracking_no}}</td>
                            <td>{{ $item->created_at->format('d M Y')}}</td>
                            <td>{{ $item->price_total}} DZ</td>
                            <td>{{ $item->status == '0' ? 'Pending' : 'Completed'}}</td>
                            <td> <img src="{{ asset('assets/uploads/ccp/'. $item->image)}}" width="120px" alt="{{ $item->image}}"></td>
                            <td>
                                <a href="{{ url('admin/view-order/'.$item->id)}}" type="button" class="btn btn-outline-success mb-1">View</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
