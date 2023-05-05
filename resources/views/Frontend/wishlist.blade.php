@extends('layouts.indexFront')

@section('title', 'My Cart | TechShop')

@section('content')
    <div class="py-3 my-4 shadow-sm borfer-top bg-secondary p-2 text-dark bg-opacity-25">
        <div class="container">
            <h5 class="mb-0">
                <a href="{{ url('/') }}"> Home </a> /
                <a href="{{ url('wishlist/') }} "> wishlist  </a>

            </h5>
        </div>
    </div>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">My Wishlist</h3>
                    </div>
                    @if ($wishlist->count() > 0  )
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded rounded-3">
                            <div class="card-body p-4 wishlistitems">
                            @foreach ($wishlist as $item)
                                <div class="row product_date d-flex justify-content-between align-items-center ">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('assets/uploads/products/'.$item->products->image)}}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $item->products->name_prod}}</p>
                                        <p><span class="text-muted">Size: </span>256 GB <span class="text-muted">Color: </span>Grey {{  $item->products->id }}</p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <input type="hidden" class="id_product" value="{{  $item->products->id }}">
                                        @if ( $item->products->qte_stock > $item->qte_prod)
                                            <button class="btn btn-link px-2"onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input id="form1" min="1" max="20" value="1"   type="number" class="form-control text-center form-control-sm qty-input" />
                                            <button class="btn btn-link px-2 "onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        @else
                                        <div class="col-md col-lg col-xl">
                                            <p class="lead fw-normal mb-2 text-danger"> Out In Stock </p>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        @if ($item->products->selling_price > 0)
                                            <h5 class="h5 mb-0">{{ $item->products->selling_price }} DZ </h5>
                                        @else
                                            <h5 class="h5 mb-0">{{ $item->products->original_price }} DZ </h5>
                                        @endif
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-xl-21 text-end">
                                        @if ( $item->products->qte_stock > $item->qte_prod)
                                            <a href="" class="btn btn-outline-success  addToCartBtn  "><i class="bi bi-cart-plus"></i></a>
                                            <a href="" class="btn btn-outline-danger  remove-wishlist-item "><i class="fas fa-trash fa-lg"></i></a>
                                        @else
                                            <a href="" class="btn btn-outline-danger  remove-wishlist-item "><i class="fas fa-trash fa-lg"></i></a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    @else
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded rounded-3">
                            <div class="card-body d-grid gap-2 ">
                                <h1 class="h1 fs-1 fw-bolder text-center">There are no products in your wishlist <i class="bi bi-bag-heart"></i></h1>
                                <a href="{{ url('categorys')}}" class="btn btn-dark  btn-lg mt-5">Continue Shoping <i class="bi bi-cart-check"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
