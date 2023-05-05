@extends('layouts.indexFront')

@section('title', 'My Orders | TechShop')

@section('content')
<section >
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card bg-light">
                    <div class="card-header">
                        <h4>My Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{$item->tracking_no }}</td>
                                        <td>{{$item->price_total }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
