@extends('layouts.admin')

@section('title', 'Contect | Admin ')

@section('title-page-cat' , 'Countect Supplier Page')

@section('content')
    <div class="conatiner">
        <div class="d-flex justify-content-center ">
            <form action="{{ url('send-email')}}"  method="POST">
                @csrf
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('erroe') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="row ">
                        <div class="col-md-6">
                            <label>First Name</label>
                            <input type="text"  class="form-control  @error('fname') is-invalid @enderror"  value="{{ $suppliers->fname}}" name="fname">
                            @error('fname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Last Name</label>
                            <input type="text"  class="form-control  @error('lname') is-invalid @enderror" value="{{ $suppliers->lname}}" name="lname">
                            @error('lname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email_addr">Email address</label>
                            <input type="email"  class="form-control  @error('email') is-invalid @enderror"  value="{{ $suppliers->email}}" name="email" placeholder="name@example.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone_input">Phone</label>
                            <input type="tel"  class="form-control  @error('Phone') is-invalid @enderror" value="{{ $suppliers->phone}}" name="Phone" placeholder="Phone">
                            @error('Phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="phone_input">Subject</label>
                            <input type="tel"  class="form-control  @error('subject') is-invalid @enderror" value="{{ old('subject') }}" name="subject" placeholder="subject">
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="message">Message</label>
                            <textarea class="form-control  @error('message') is-invalid @enderror" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr class="my-3">
                        <button type="submit" class="btn btn-outline-dark px-4 btn-lg">Send Email</button>
                </div>
            </form>
        </div>
    </div>
@endsection
