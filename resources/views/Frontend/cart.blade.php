@extends('layouts.indexFront')

@section('title', 'My Cart | TechShop')

@section('content')
    <div class="py-3 my-4 shadow-sm borfer-top bg-secondary p-2 text-dark bg-opacity-25">
        <div class="container">
            <h5 class="mb-0">
                <a href="{{ url('/') }}"> Home </a> /
                <a href="{{ url('cart/') }} "> Cart  </a>

            </h5>
        </div>
    </div>
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100 ">
                <div class="col-12 cartitme">
                    @if ($cartitme->count() > 0)
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                            <div>
                            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                                    class="fas fa-angle-down mt-1"></i></a></p>
                            </div>
                        </div>
                        @php
                            $total = 0;
                            $total1 =  $total11 = 0;
                            $total2 =  $total22 = 0;
                        @endphp
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded rounded-3 ">
                            <div class="card-body p-4">
                                @foreach ($cartitme as $item)
                                <div class="row d-flex justify-content-between align-items-center  product_date">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('assets/uploads/products/'.$item->products->image)}}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal mb-2">{{ $item->products->name_prod}}</p>
                                        <p><span class="text-muted">Size: </span>256 GB <span class="text-muted">Color: </span>Grey</p>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        @if ( $item->products->qte_stock > $item->qty_prod)
                                            <input type="hidden" value="{{ $item->products->id }}" class="id_product"  >
                                            <button class="btn btn-link px-2 changeQuantity"onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input id="form1" min="1"  value="{{ $item->qty_prod}}" type="number" class="form-control text-center form-control-sm qty-input" />
                                            <button class="btn btn-link px-2 changeQuantity"onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        @else
                                        <div class="col-md col-lg col-xl">
                                            <p class="lead fw-normal mb-2 text-danger"> Out In Stock </p>
                                            <p class="text-muted">Your Quantity: {{ $item->qty_prod}}</p></div>
                                        @endif
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        @if ($item->products->selling_price > 0)
                                            @php
                                                $total1 = $item->products->selling_price * $item->qty_prod ;
                                                $total11 += $total1;
                                            @endphp
                                            <p class="fw-light mb-0"> {{ $item->products->selling_price }} DZ * {{ $item->qty_prod }} </p>
                                            <h5 class="h5 mb-0">{{ $total1 }} DZ </h5>
                                        @else
                                            @php
                                                $total2 = $item->products->original_price * $item->qty_prod ;
                                                $total22 += $total2;
                                            @endphp
                                                <p class="fw-light mb-0"> {{ $item->products->original_price }} DZ * {{ $item->qty_prod }} </p>
                                                <h5 class="h5 mb-0">{{ $total2 }} DZ </h5>

                                        @endif
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="" class="text-danger delete-cart-item"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                                @php
                                    $total = $total11 + $total22 ;
                                @endphp
                                @endforeach
                            </div>
                        </div>
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded rounded-3">
                            <div class="card-body p-4">
                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Order total:</span> <span
                                        class="lead fw-normal">{{$total }} DZ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded rounded-3">
                            <div class="card-body d-grid gap-2">
                                <a href="{{ url('checkout')}}" class="btn btn-outline-dark btn-block btn-lg">Proceed to Checkout <i class="bi bi-cart-check"></i></a>
                            </div>
                        </div>
                    @else
                        <div class="card shadow-lg p-3 mb-5 bg-body rounded rounded-3">
                            <div class="card-body d-grid gap-2 ">
                                <h1 class="h1 fs-1 fw-bolder text-center">Your <i class="bi bi-cart"></i>  Cart is empty</h1>
                                <a href="{{ url('categorys')}}" class="btn btn-dark  btn-lg mt-5">Continue Shoping <i class="bi bi-cart-check"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection


