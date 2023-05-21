@extends('layouts.indexFront')

@section('title', 'Categorys | TechShop')

@section('content')
    {{-- Start show products phones --}}
    <h2>Featured Phones And Computeurs</h2>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($category as $cate)
                    <div class="item ">
                        <a href="{{ url('view-category/'.$cate->name_cate)}}">
                            <div class="card h-100">
                                <div class="d-flex justify-content-between p-3">
                                    <p class="lead mb-0 text-dark">Today's Combo Offer</p>
                                    <div
                                        class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                                        style="width: 35px; height: 35px;">
                                        <p class="text-white mb-0 small">New</p>
                                    </div>
                                </div>
                                <img src="{{asset('assets/uploads/category/'.$cate->image)}}" height="280px" class="card-img-top" alt="Laptop" />
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="small"><a href="#!" class="text-muted">{{ $cate->name_cate}}</a></p>
                                        <p class="small text-danger"><s></s></p>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{ $cate->name_cate}}</h5>
                                        <h5 class="text-dark mb-0"></h5>
                                    </div>

                                    <p class="card-text">
                                        {{ $cate->description}}
                                    </p>
                                    <div class="d-flex justify-content-between mb-2">
                                        <p class="text-muted mb-0">Available: <span class="fw-bold"> Yes</span></p>
                                        <div class="ms-auto text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                            <i class="bi bi-star"></i>
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
            items:2
        }
    }
})
</script>

@endsection
