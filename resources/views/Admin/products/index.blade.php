@extends('layouts.admin')

@section('title', 'Products ')

@section('title-page-cat' , 'Prosucts Page')

@section('content')
    <div class="card border-0">
        <div class="header-body row">
            <div class="col-md-10">
                <h1>Products</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ url('add-products') }}" class="btn btn-dark">Create A New </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Suppliers</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mark  Product</th>
                        <th scope="col">Original Price</th>
                        <th scope="col">Selling  Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Storages</th>
                        <th scope="col">Colors</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td scope="row">{{ $item->id}}</td>
                            <td>{{ $item->category->name_cate}}</td>
                            <td>{{ $item->fournisseur->fname}} <br> {{$item->fournisseur->lname}}</td>
                            <td>{{ $item->name_prod}}</td>
                            <td>{{ $item->mark_prod}}</td>
                            <td>{{ $item->original_price}}</td>
                            <td>{{ $item->selling_price}}</td>
                            <td>{{ $item->qte_stock}}</td>
                            <td>{{ $item->storage}}</td>
                            <td>{{ $item->color}}</td>
                            {{-- <td>
                                {{-- @foreach ($totalc as  $varcolor) --}}
                                    {{-- <span style="display: inline-block;
                                                width: 20px;
                                                height: 20px;
                                                margin: 6px;
                                                background-color: {{ $item->color}}">
                                    </span> --}}
                                {{-- @endforeach --
                            </td> --}}
                            {{-- <td>{{ $item->description}}</td> --}}

                            <td> <img src="{{ asset('assets/uploads/products/'.$item->image)}}" width="200px" alt="{{$item->image }}"></td>
                            <td>
                                <a href="{{ url('edit-products/'.$item->id)}}" type="button" class="btn btn-outline-success mb-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('deleted-products/'.$item->id)}}" type="button" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
