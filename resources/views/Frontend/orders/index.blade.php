@extends('layouts.indexFront')

@section('title', 'My Orders | TechShop')

@section('content')
<section >
    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-header">
                        <h4>My Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>Order ID</th> --}}
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Date</th>
                                    <th>Confirmation</th>
                                    <th>Date Of Confirmation </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $item->id }}</td> --}}
                                        <td>{{$item->tracking_no }}</td>
                                        <td>{{$item->price_total }} DZ</td>
                                        <td>{{ $item->created_at }}</td>
                                        @if ($item->status == 1)
                                            <td>The request has been approved.</td>
                                            <td>{{$item->updated_at }}</td>
                                        @else
                                            <td>in the process</td>
                                            <td> \\ </td>
                                        @endif
                                        <td>
                                            @if ($item->status == 1)
                                                <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
                                                <button disabled type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"  data-target="#confirmDeleteModal">
                                                    <i class="bi bi-bag-x"></i>
                                                </button>
                                            @else
                                                <a href="{{ url('view-order/'.$item->id) }}" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
                                                <button  type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}"  data-target="#confirmDeleteModal">
                                                    <i class="bi bi-bag-x"></i>
                                                </button>
                                            @endif

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
                                                        Are you sure you want to delete this Order {{$item->tracking_no }}?
                                                    </div>
                                                    <div class="modal-footer orde-data">
                                                        <form action="" method="POST">
                                                            @csrf
                                                            <input type="hidden" class="id_order" value="{{$item->id}}">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger deleted-order">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- end delete modal --}}

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
