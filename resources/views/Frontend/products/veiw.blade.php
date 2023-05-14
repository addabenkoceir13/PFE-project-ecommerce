@extends('layouts.indexFront')

@section('title',   $products->name_prod .' | TechShop ')

@section('content')
<div class="py-3 my-4 shadow-sm borfer-top bg-secondary p-2 text-white bg-opacity-25">
    <div class="container">
        <h5 class="mb-0">
            <a class="link-light" href="{{ url('categorys') }}"> Collections </a> /
            <a class="link-light" href="{{ url('view-category/'. $products->category->name_cate) }}"> {{ $products->category->name_cate }} </a> /
            {{ $products->mark_prod }} /
            {{ $products->name_prod }} </a>

        </h5>
    </div>
</div>
{{-- Start show products phones --}}
<form action="{{ url('add-rating')}}" method="POST">
@csrf
    <input type="hidden" name="id_prod" value="{{ $products->id }}">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rate {{$products->name_prod}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="rating-css">
                    <div class="star-icon">
                        @if ($user_rating)
                            @for ($i = 1; $i <= $user_rating->stars_rated ; $i++)
                                <input type="radio" value="{{$i}}" name="product_rating" checked id="rating{{$i}}">
                                <label for="rating{{$i}}" class="fa fa-star"></label>
                            @endfor
                            @for ($j = $user_rating->stars_rated+1; $j <= 5; $j++)
                                <input type="radio" value="{{$j}}" name="product_rating"  id="rating{{$j}}">
                                <label for="rating{{$j}}" class="fa bi-star "></label>
                            @endfor
                        @else
                            <input type="radio" value="1" name="product_rating" checked  id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Rating</button>
            </div>
            </div>
        </div>
    </div>
</form>
<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset('assets/uploads/products/'. $products->image) }}" alt="Card image cap" id="product-detail">
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card border-0 product_date">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h1 class="h2">{{ $products->name_prod }}</h1>
                            @if ($products->status != 0)
                                <button class="btn btn-dark">Trending</button>
                            @endif
                        </div>
                        <h3 class="h3 text-secondary">{{ $products->mark_prod }}</h3>
                        @if ($products->selling_price)
                        <div class="d-flex justify-content-start mb-3">
                            <p class="h5 py-2 mt-1">original Price: <s> {{ $products->original_price }} DZ</s></p>
                            <p class="h3 tw-bold py-2 mx-4">Selling Price: {{ $products->selling_price }} DZ</p>
                        </div>
                        @else
                        <div class="d-flex justify-content-start mb-3">
                            <p class="h5 py-2 mt-1">original Price:  {{ $products->original_price }} DZ</p>
                        </div>
                        @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-light mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <p class="">
                                @php $ratenum = number_format( $rating_value ) @endphp
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
                        </button>

                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{ $products->mark_prod }}</strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>{{ $products->description }}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            @php
                                $storage = json_decode($products->storages, true);
                                $color   = json_decode($products->colors);
                            @endphp
                            <li class="list-inline-item">
                                @foreach ($color as $item)
                                    <div class="d-inline-block mx-1 border border-secondary" style=" width:25px; height: 20px; background: {{ $item }}; " ></div>
                                @endforeach
                                {{-- <p class="text-muted"><strong>{{ $colors }}</strong></p> --}}
                            </li>
                        </ul>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Stokage :</h6>
                            </li>
                            <li class="list-inline-item">
                                @foreach ($storage as $item)
                                    <div class="d-inline-block mx-1  px-1" style="background: #eee; " >{{ $item }}</div>
                                @endforeach
                                {{-- <p class="text-muted"><strong>{{ $colors }}</strong></p> --}}
                            </li>
                        </ul>
                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            {{ $products->small_descripton}}
                        </ul>
                        <div class="my-3">
                            @if ($products->qte_stock > 0)
                            <button class="btn btn-success">In Stock</button>
                            @else
                                <button class="btn btn-danger">Out of Stock</button>
                            @endif
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="id_product"  >
                                <label class="form-label" for="Quantity">Quantity:</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text btn btn-dark btn-minus">-</button>
                                    <input type="text"  class="form-control text-center qty-input" min="1" value="1">
                                    <button class="input-group-text btn btn-dark btn-plus">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-3">
                            @if ($products->qte_stock > 0)
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-lg btn-outline-dark addToCartBtn">Add To Cart <i class="bi bi-cart-plus"></i></button>
                                </div>
                            @else
                                <div class="col d-grid">
                                    <button type="button" class="btn btn-lg btn-outline-dark disabled">Add To Cart <i class="bi bi-cart-plus"></i></button>
                                </div>
                            @endif

                            <div class="col d-grid">
                                <button type="button" class="btn btn-lg btn-outline-dark addToWishlist">Add to Wishlist <i class="bi bi-bag-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  Parte 2--}}
    <div class="container-fluid">
    <div class="row my-3">
        <div class="col-md-6">
            <div class="card p-3">
                <div class="card-body">
                    <!-- Reviews -->
                <div class="mb-3">
                    <h3 class="mb-4">How students rated this courses</h3>
                    <div class="row align-items-center">
                    <div class="col-auto text-center">
                        @php
                            $rating_value1 = sprintf("%.2f", $rating_value);
                        @endphp
                        <h3 class="display-2 fw-bold">{{$rating_value1}}</h3>
                        <i class="fa fa-star me-n1 text-warning"></i>
                        <i class="fa fa-star me-n1 text-warning"></i>
                        <i class="fa fa-star me-n1 text-warning"></i>
                        <i class="fa fa-star me-n1 text-warning"></i>
                        <i class="fa fa-star me-n1-half text-warning"></i>
                        <p class="mb-0 fs-6">(Based on <b>{{ $reviews->count() }}</b> reviews)</p>
                    </div>
                    @php
                        $rating1 = App\Models\Notation::where('id_prod',$products->id)->where('stars_rated','1')->count();
                        $rating2 = App\Models\Notation::where('id_prod',$products->id)->where('stars_rated','2')->count();
                        $rating3 = App\Models\Notation::where('id_prod',$products->id)->where('stars_rated','3')->count();
                        $rating4 = App\Models\Notation::where('id_prod',$products->id)->where('stars_rated','4')->count();
                        $rating5 = App\Models\Notation::where('id_prod',$products->id)->where('stars_rated','5')->count();

                        $p1 = ( $rating1 * 100) / 5;
                        $p2 = ( $rating2 * 100) / 5;
                        $p3 = ( $rating3 * 100) / 5;
                        $p4 = ( $rating4 * 100) / 5;
                        $p5 = ( $rating5 * 100) / 5;
                    @endphp
                    <!-- Progress Bar -->
                    <div class="col pt-3 order-3 order-md-2">
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $p5 }}%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $p4 }}%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $p3 }}%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress mb-3" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $p2 }}%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress mb-0" style="height: 6px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $p1 }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-auto col-6 order-2 order-md-3">
                        <!-- Rating -->
                        <div>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <span class="ms-1">{{$p5}}%</span>
                        </div>
                        <div>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <span class="ms-1">{{$p4}}%</span>
                        </div>
                        <div>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <span class="ms-1">{{$p3}}%</span>
                        </div>
                        <div>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <span class="ms-1">{{$p2}}%</span>
                        </div>
                        <div>
                            <i class="fa fa-star me-n1 text-warning"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <i class="fa fa-star me-n1 text-light"></i>
                            <span class="ms-1">{{$p1}}%</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header d-lg-flex align-items-center justify-content-between">
                    <div class="mb-3 mb-lg-0">
                        <h3 class="mb-0">Reviews</h3>
                        <span>You have full control to manage your own account
                            setting.</span>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                @foreach ($reviews as $item)
                    <!-- List Group -->
                    <ul class="list-group list-group-flush border-top">
                        <!-- List Group Item -->
                        <li class="list-group-item px-0 py-4">
                            <div class="d-flex">
                                @if ($item->users->image )
                                <img src="{{asset('assets/Frontend/Users/'.$item->users->image)}}" alt="{{ $item->users->image }}" width="80" height="80" class="rounded-circle " />
                                @else
                                <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" alt="" width="50" height="50" class="rounded-circle " />
                                @endif

                                <div class="ms-3 mt-2">
                                    <div
                                        class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h4 class="mb-0">{{ $item->users->name}}</h4>
                                            <span class="text-muted fs-6">2 hour ago</span>
                                        </div>
                                        <div>
                                            <a href="#" data-bs-toggle="tooltip"data-placement="top"title="Report Abuse"><i class="fe fe-flag"></i></a>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        @php
                                            $rating = App\Models\Notation::where('id_prod',$products->id)->where('id_user',$item->users->id)->first();
                                        @endphp
                                        @if ($rating)
                                            @php
                                                $user_rated = $rating->stars_rated ;
                                            @endphp
                                            @for ($i = 1; $i <= $user_rated ; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                            @endfor
                                            @for ($j = $user_rated+1; $j <= 5; $j++)
                                            <i class="bi bi-star text-secondary"></i>
                                            @endfor
                                            @else
                                            <i class="bi bi-star text-secondary"></i>
                                            <i class="bi bi-star text-secondary"></i>
                                            <i class="bi bi-star text-secondary"></i>
                                            <i class="bi bi-star text-secondary"></i>
                                            <i class="bi bi-star text-secondary"></i>
                                            No Rating
                                        @endif
                                        <span class="me-1">for</span>
                                        <span class="h6">Reviewed on {{ $item->created_at->format('d M Y')}}</span>
                                        <p class="mt-2">
                                            {{ $item->user_review}}
                                        </p>
                                        @if ($item->id_user == Auth::id())
                                            <a href="{{ url('edit-review/'.$products->name_prod.'/userreview')}}" class="btn btn-outline-secondary btn-sm">Edit</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
                <div class="product_date">
                    <input type="hidden" class="id_product" value="{{ $products->id }}">
                    <input type="hidden" class="name_prod"  value="{{ $products->name_prod }}">
                    <input type="hidden" class="" value="">
                    <div class="form-floating">
                        <textarea class="form-control user_review" placeholder="Leave a comment here" style="height: 100px; padding-bottom: 10px" required></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                    <div class="text-danger fs-5 mx-4" id="comments_error"></div>
                    <div class="float-end mt-4">
                        <button type="button" class="btn btn-outline-secondary add-review">Write a review</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- Close Content -->
@endsection

@section('scripts')
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
@endsection
