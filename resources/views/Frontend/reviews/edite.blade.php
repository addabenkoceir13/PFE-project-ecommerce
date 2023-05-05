@extends('layouts.indexFront')

@section('title',   'Edit Review | TechShop' )

@section('content')
<div class="container p-3 mt-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8  bg-light bg-gradient">
            <div class="card shadow-sm borfer-top bg-opacity-25">
                <div class="card-body">
                    <h5>You are writing a revew for {{ $review->products->name_prod }}</h5>
                    <form action="{{ url('edit-review')}}" method="POSt" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_review" value="{{ $review->id }}">
                        <textarea name="user_review" class="form-control"  rows="5" placeholder="Write a review">{{ $review->user_review }}</textarea>
                        <button type="submit" class="btn btn-outline-dark my-3 float-end">Update Review</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
