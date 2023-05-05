@extends('layouts.indexFront')

@section('title',  $category->name_cate . ' | TechShop' )

@section('content')
{{-- Start show products phones --}}
<div class="py-3 my-4 shadow-sm borfer-top bg-secondary p-2 text-dark bg-opacity-25">
    <div class="container">
        <h5 class="mb-0">
            <a href="{{ url('categorys')}}"> Collections /</a>
            <a href="{{ url('view-category/'.$category->name_cate)}}">  {{ $category->name_cate }}</a>
        </h5>
    </div>
</div>
<section style="background-color: #eee;">
    <h2>{{$category->name_cate}}  </h2>
    <div class="container py-5">
        <div class="row">
                @foreach ($products as $prod)
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-4 product_date">
                        <input type="hidden" name="id_product" value="{{ $prod->id }}">
                    <a href="{{ url('category/'.$category->name_cate.'/'.$prod->name_prod) }}">
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
                                        <p class="small"><a href="#!" class="text-muted">{{ $prod->category->name_cate}}</a></p>
                                        <p class="small text-danger"><s>{{ $prod->original_price}}</s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $prod->name_prod}}</h5>
                                        <h5 class="text-dark mb-0">{{ $prod->selling_price}}</h5>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between">
                                        <p class="small"><a href="#!" class="text-muted">{{ $prod->category->name_cate}}</a></p>
                                        <p class="small text-danger"><s></s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $prod->name_prod}}</h5>
                                        <h5 class="text-dark mb-0">{{ $prod->original_price}}</h5>
                                    </div>
                                @endif
                                <div class="card-text">
                                    {{ $prod->description}}
                                </div>
                                <div class="d-flex justify-content-between mt-2">
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
                                    <p class="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                @endforeach
        </div>
    </div>
</section>
{{-- End show products phones --}}
@endsection

@section('scripts')
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
