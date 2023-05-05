@extends('layouts.indexFront')

@section('title',   'Review | TechShop' )

@section('content')
<div class="container p-3 mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 bg-light bg-gradient">
            <div class="card shadow-sm borfer-top bg-opacity-25">
                <div class="card-body">
                    @if ($verified_purchase->count() > 0)
                        <h5>You are writing a revew for {{ $product->name_prod }}</h5>
                        <form action="{{ url('add-review')}}" method="POSt" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_prod" value="{{ $product->id }}">
                            <textarea name="user_review" class="form-control"  rows="5" placeholder="Write a review"></textarea>
                            <button type="submit" class="btn btn-outline-dark my-3 float-end my-3">Submit Review</button>
                        </form>
                    @else
                        <div class="alert alert-danger">
                            <h5>You are not eligible to review this product</h5>
                            <p>
                                For the trusthiness of the reviews, only customers who purchased
                                the product can write a review about the product.
                            </p>
                            <a href="{{ url('/')}}" class="btn btn-outline-dark  my-3">Go to home</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
