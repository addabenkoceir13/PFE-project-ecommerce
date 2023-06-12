@extends('layouts.indexFront')

@section('title', ' Home | TechShop')

@section('content')
    @include('layouts.includes.Frontend.slider')
    {{--  --}}
    <section>
        <div class="row iphone-14 text-white mb-sm-5">
            <div class="col col-ms-12 col-md-6 col-xl-6 d-flex jestify-content-center align-items-center">
                <div class="text-iphone px-sm-2">
                    <h1>The iPhone 14 Pro </h1>
                    <p >
                        Experience the ultimate smartphone with iPhone 14 Pro.
                        With Dynamic Island and ProMotion technology,
                        you'll enjoy unbeatable graphics and interactivity.
                        Upgrade now and get guaranteed satisfaction with every purchase.
                    </p>
                </div>
            </div>
            <div class="col-ms-12 col-md-6 col-xl-6 d-flex jestify-content-center align-items-center">

                {{-- <spline-viewer url="https://prod.spline.design/dD2apikp00wYMKen/scene.splinecode"></spline-viewer> --}}
                <iframe src='https://my.spline.design/iphone14procopy-f30bb7ad0bd1a8047011c763c00260b5/' frameborder='0' width='100%' height='100%'></iframe>
                {{-- <img class="w-100" src="{{ asset('assets/Frontend/home/mockrocket-export.gif')}}"  alt=""> --}}
            </div>
        </div>
    </section>
    {{--  --}}

    {{--  --}}
    <section class="laptop">
        <div class="row ">
            <div class="col-ms-12 col-md-6 col-xl-6 d-flex justify-content-center align-items-center">
                <iframe src='https://my.spline.design/macbookprocopy-e961740adfc2a47aa2586c66df390430/' frameborder='0' width='100%' height='100%'></iframe>
            </div>
            <div class="col col-ms-12 col-md-6 col-xl-6 d-flex justify-content-center align-items-center">
                <div class="text-iphone px-sm-2">
                    <h1>The MacBook Pro M1 Max </h1>
                    <p >
                        With the MacBook Pro M1 Max, you can unleash unbounded creativity and unrivaled power,
                        transforming the way you work, create, and succeed in a world where possibilities know no bounds.
                        </p>
                </div>
            </div>
        </div>
    </section>
    {{--  --}}

    {{-- Start show products phones --}}
    <section class="my-5">
        <h2>Featured Product </h2>
        <p class="text-center">
            The best-selling and top-rated goods on our website and in our shop, don't lose out on the chance to go and buy what best suits you.
        </p>
    </section>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            @if (count($top_products) > 0)
                @foreach ($top_products as $product_id => $rating)
                @php
                    $products = App\Models\Products::where('id', $product_id)->get();
                @endphp
                @foreach ($products as $prod)
                <div class="col-md-12 col-lg-4 mb-4 mb-lg-3">
                    <div class="card h-100 ">
                    <a href="{{ url('category/'.$prod->category->name_cate.'/'.$prod->name_prod)}}">
                    <div class="d-flex justify-content-between p-3">
                        <p class="lead mb-0">Today's Combo Offer</p>
                        <div class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong" style="width: 35px; height: 35px;">
                            {{-- <p class="text-white mb-0 small">x4</p> --}}
                        </div>
                    </div>
                        <img src="{{asset('assets/uploads/products/'.$prod->image)}}" height="250px" class="card-img-top" alt="Laptop" />
                    <div class="card-body">
                        @if ($prod->selling_price)
                            <div class="d-flex justify-content-between">
                                <p class="small float-start"><a href="#!" class="text-muted">{{ $prod->category->name_cate }} </a></p>
                                <p class="small text-danger"><s>{{ $prod->original_price }}</s></p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $prod->name_prod}}</h5>
                                <h5 class="text-dark mb-0">{{ $prod->selling_price}}</h5>
                            </div>
                        @else
                            <div class="d-flex justify-content-between">
                                <p class="small float-start"><a href="#!" class="text-muted">{{ $prod->category->name_cate }} </a></p>
                                <p class="small text-danger"><s>{{ $prod->original_price }}</s></p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $prod->name_prod}}</h5>
                                <h5 class="text-dark mb-0">{{ $prod->original_price}}</h5>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <p>
                                @for ($i = 1; $i <= $rating ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                                @for ($j = $rating+1; $j <= 5; $j++)
                                    <i class="bi bi-star text-secondary"></i>
                                @endfor
                                @if ($rating > 0)
                                    @php
                                        $rating1 = sprintf("%.1f", $rating);
                                    @endphp
                                    <span class="list-inline-item text-dark">{{ $rating1 }} Rating </span>
                                @else
                                    <span class="list-inline-item text-dark">No Rating  </span>
                                @endif
                            </p>
                            @php
                                $reviews = App\Models\Review::where('id_prod',$prod->id)->count();
                            @endphp
                            <p class="text-muted">
                                Reviews ( {{$reviews}} )
                            </p>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="mb-0"></h5>
                            <h5 class="text-dark mb-0"></h5>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="text-muted mb-0">Available: <span class="fw-bold">{{ $prod->qte_stock}}</span></p>

                        </div>
                    </div>
                        </a>
                    </div>
                </div>

                @endforeach
            @endforeach
            @else
                <p>Sorry</p>
            @endif

        </div>
    </div>
</section>




@endsection

@section('scripts')
<script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.339/build/spline-viewer.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
</script>

@endsection


{{-- <section>
    <div class="container">
        @foreach ($top_products as $product_id => $rating)
            @php
                $products = App\Models\Products::where('id', $product_id)->get();
            @endphp
        <div>
            <h3>Product ID: {{ $product_id }}</h3>
            <p>Average rating: {{ $rating }}</p>
        </div>
        @endforeach
    </div>
</section> --}}
 {{-- Start show products Computeurs --}}
{{-- <h2>Featured Computeurs </h2>
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($featured_products_compt as $prod)
                <div class="item ">
                    <a href="{{ url('view-category/'. $prod->category->name_cate) }}">
                        <div class="card h-100">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0 text-dark">Today's Combo Offer</p>
                                <div
                                    class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                    style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">New</p>
                                </div>
                            </div>
                            <img src="{{asset('assets/uploads/products/'.$prod->image)}}" height="280px" class="card-img-top" alt="Laptop" />
                            <div class="card-body">
                                @if ($prod->selling_price)
                                    <div class="d-flex justify-content-between">
                                        <p class="small float-start"><a href="#!" class="text-muted">{{ $prod->category->name_cate }} </a></p>
                                        <p class="small text-danger"><s>{{ $prod->original_price }}</s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $prod->name_prod}}</h5>
                                        <h5 class="text-dark mb-0">{{ $prod->selling_price}}</h5>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between">
                                        <p class="small float-start"><a href="#!" class="text-muted">{{ $prod->category->name_cate }} </a></p>
                                        <p class="small text-danger"><s>{{ $prod->original_price }}</s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $prod->name_prod}}</h5>
                                        <h5 class="text-dark mb-0">{{ $prod->original_price}}</h5>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    @php
                                        $ratings = App\Models\Notation::where('id_prod',$prod->id)->get();
                                        $rating_sum = App\Models\Notation::where('id_prod',$prod->id)->sum('stars_rated');
                                        $user_rating   = App\Models\Notation::where('id_prod',$prod->id)->first();

                                        $reviews = App\Models\Review::where('id_prod',$prod->id)->count();

                                        if ($ratings->count() > 0)
                                        {
                                            $rating_value = $rating_sum/$ratings->count();
                                        }
                                        else
                                        {
                                            $rating_value = 0;
                                        }
                                        $ratenum = number_format( $rating_value )
                                    @endphp
                                    <p>
                                        @for ($i = 1; $i <= $ratenum ; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                        @endfor
                                        @for ($j = $ratenum+1; $j <= 5; $j++)
                                            <i class="bi bi-star text-secondary"></i>
                                        @endfor
                                        @if ($ratings->count() > 0)
                                            <span class="list-inline-item text-dark">{{ $ratings->count() }} Rating</span>
                                        @else
                                            <span class="list-inline-item text-dark">No Rating  </span>
                                        @endif
                                    </p>
                                    <p class="text-muted">
                                        Reviews ( {{$reviews}} )
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">Available: <span class="fw-bold">{{ $prod->qte_stock}}</span></p>
                                    <div class="ms-auto text-warning">
                                        {{-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                        <i class="bi bi-star"></i> --
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}
{{-- End show products Computeurs --}}

{{-- <section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($featured_products_phone as $prod)
                <div class="item">
                    <a href="{{ url('view-category/'. $prod->category->name_cate) }}">
                        <div class="card h-100">
                            <div class="d-flex justify-content-between p-3">
                                <p class="lead mb-0 text-dark ">Today's Combo Offer</p>
                                <div
                                    class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                    style="width: 35px; height: 35px;">
                                    <p class="text-white mb-0 small">New</p>
                                </div>
                            </div>
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" height="280px" class="card-img-top" alt="Laptop" />
                            <div class="card-body">
                                @if ($prod->selling_price)
                                    <div class="d-flex justify-content-between">
                                        <p class="small float-start"><a href="#!" class="float-start text-muted">{{ $prod->category->name_cate }} </a></p>
                                        <p class="small text-danger float-end"><s>{{ $prod->original_price }}</s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $prod->name_prod }}</h5>
                                        <h5 class="text-dark mb-0">{{ $prod->selling_price }}</h5>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between">
                                        <p class="small"><a href="#!" class="text-muted">{{ $prod->category->name_cate }}</a></p>
                                        <p class="small text-danger"><s></s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $prod->name_prod }}</h5>
                                        <h5 class="text-dark mb-0">{{ $prod->original_price }}</h5>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    @php
                                        $ratings = App\Models\Notation::where('id_prod',$prod->id)->get();
                                        $rating_sum = App\Models\Notation::where('id_prod',$prod->id)->sum('stars_rated');
                                        $user_rating   = App\Models\Notation::where('id_prod',$prod->id)->first();

                                        $reviews = App\Models\Review::where('id_prod',$prod->id)->count();

                                        if ($ratings->count() > 0)
                                        {
                                            $rating_value = $rating_sum/$ratings->count();
                                        }
                                        else
                                        {
                                            $rating_value = 0;
                                        }
                                        $ratenum = number_format( $rating_value )
                                    @endphp
                                    <p>
                                        @for ($i = 1; $i <= $ratenum ; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                        @endfor
                                        @for ($j = $ratenum+1; $j <= 5; $j++)
                                            <i class="bi bi-star text-secondary"></i>
                                        @endfor
                                        @if ($ratings->count() > 0)
                                            <span class="list-inline-item text-dark">{{ $ratings->count() }} Rating  </span>
                                        @else
                                            <span class="list-inline-item text-dark"> No Rating   </span>
                                        @endif
                                    </p>
                                    <p class="text-muted">
                                        Reviews ( {{$reviews}} )
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <p class="text-muted mb-0">Available: <span class="fw-bold">{{ $prod->qte_stock }}</span></p>

                                </div>
                            </div>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section> --}}
{{-- End show products phones --}}
