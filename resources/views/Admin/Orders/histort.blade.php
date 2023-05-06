@extends('layouts.admin')

@section('title', 'Orders History | Admin ')

@section('title-page-cat' , 'Orders Page')

@section('content')

<div class="container">
    <div class="card border-0">
        <div class="header-body row">
            <div class="col-md-10">
                <h1> Orders History</h1>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">Tracking Number</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Received  </th>
                        <th scope="col"> Status </th>
                        <th scope="col">Action  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $item)
                        <tr>
                            <td scope="row">{{ $item->id}}</td>
                            <td>{{ $item->created_at}}</td>
                            <td>{{ $item->tracking_no}}</td>
                            <td>{{ $item->price_total}}</td>
                            <td> <img src="{{ asset('assets/uploads/ccp/'. $item->image)}}" width="120px" alt=""></td>
                            <td>{{ $item->status == '1' ? 'Completed' : 'Pending'}}</td>
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
