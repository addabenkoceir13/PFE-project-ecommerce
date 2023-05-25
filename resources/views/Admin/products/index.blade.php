@extends('layouts.admin')

@section('title', 'Products ')

@section('title-page-cat' , 'Prosucts Page')

@section('content')
    <div class="card border-0">
        <div class="header-body row">
            <div class="d-flex justify-content-between">
                <div >
                    <h3 class="text-card">Products</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <form action="">
                        <div class="search">
                            <input   type="search"  id="search_products" class="search-input" placeholder="Search products...">
                            <a href="#" class="search-icon"> <i class="fa fa-search"></i> </a>
                        </div>
                    </form>
                </div>
                <div >
                    <a href="{{ url('add-products') }}" class="btn btn-dark">Create A New </a>
                </div>
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
                <tbody id="products-list">
                </tbody>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td scope="row">{{ $item->id}}</td>
                            <td>{{ $item->category->name_cate}}</td>
                            @php
                                $spplierexits = App\Models\Suppliers::where('id', $item->id_supp)->exists();
                            @endphp
                            @if ( $spplierexits)
                                <td>{{ $item->fournisseur->fname}} <br> {{$item->fournisseur->lname}}</td>
                            @else
                                <td>No Suppliers</td>
                            @endif
                            <td>{{ $item->name_prod}}</td>
                            <td>{{ $item->mark_prod}}</td>
                            <td>{{ $item->original_price}} DZ</td>
                            <td>{{ $item->selling_price}} DZ</td>
                            <td>{{ $item->qte_stock}}</td>
                            @php
                                $storage = json_decode($item->storages, true);
                                $color   = json_decode($item->colors);
                            @endphp
                                @if ($storage > 0)
                                <td>
                                    @foreach($storage as $items)
                                        <div class="p-1 m-1 text-center" style="background: #e6d6d6;">{{ $items }}</div>
                                    @endforeach
                                </td>
                                @else
                                    <td>No Storages</td>
                                @endif
                                @if ($storage > 0)
                                <td>
                                    @foreach($color as $items)
                                        <div class="d-block m-1" style="background: {{$items}}; width: 32px; height: 32px; border-radius: 8px; cursor: pointer;"></div>
                                    @endforeach
                                </td>
                                @else
                                    <td>No Colors</td>
                                @endif


                            {{-- <td>{{ $storage }}</td> --}}
                            {{-- <td>{{ $colors}}</td> --}}

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
