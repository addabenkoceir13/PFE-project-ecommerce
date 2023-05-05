@extends('layouts.indexFront')

@section('title' , 'Checkout | TechShop')
@php $total =0;  $total1 = $total11 = 0; $total2 = $total22 = 0; @endphp
@section('content')
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
            <form action="{{ url('place-order')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="card card-registration card-registration-2 shadow-lg p-3 mb-5 bg-body  " style="border-radius: 15px;">
                    <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                </div>
                                <hr class="my-4">
                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">First Name </label>
                                            <input type="text" class="fname form-control @error('fname') is-invalid @enderror" value="{{ Auth::user()->fname }}" name="fname" placeholder="First Name">
                                            <span id="fname_error"  class="text-danger"></span>
                                            @error('fname')
                                                <div class="invalid-feedback">Please Enter your First Name.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="lname form-control @error('lname') is-invalid @enderror" value="{{ Auth::user()->lname }}" name="lname" placeholder="Last Name">
                                            <span id="lname_error"  class="text-danger"></span>
                                            @error('lname')
                                                <div class="invalid-feedback">Please Enter your Last Name.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="email form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" name="email" placeholder="Email your email">
                                            <span id="email_error"  class="text-danger"></span>
                                            @error('email')
                                                <div class="invalid-feedback">Please Enter your Email.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Phone Number</label>
                                            <input type="tel"  class="phone form-control @error('phone') is-invalid @enderror" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                            <span id="phone_error"  class="text-danger"></span>
                                            @error('phone')
                                                <div class="invalid-feedback">Please Enter your Phone.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="address1 form-control @error('address1') is-invalid @enderror" value="{{ Auth::user()->address1 }}"  name="address1" placeholder="1234 Main St">
                                            <span id="address1_error"  class="text-danger"></span>
                                            @error('address1')
                                                <div class="invalid-feedback">Please Enter your Address. </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputAddress2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                            <input type="text" class="address2 form-control @error('address2') is-invalid @enderror" value="{{ Auth::user()->address2 }}"  name="address2" placeholder="Apartment, studio, or floor">
                                            <span id="address2_error"  class="text-danger"></span>
                                            @error('address2')
                                                <div class="invalid-feedback">Please Enter your Address.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">City</label>
                                            <input type="text" class="city form-control @error('city') is-invalid @enderror" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City" >
                                            <span id="city_error"  class="text-danger"></span>
                                            @error('city')
                                                <div class="invalid-feedback">Please Enter your City.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">State</label>
                                            <input type="text" class="state form-control @error('state') is-invalid @enderror" value="{{ Auth::user()->state }}" name="state" placeholder="Enter City" >
                                            <span id="state_error"  class="text-danger"></span>
                                            @error('state')
                                                <div class="invalid-feedback">Please Enter your City.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">Country</label>
                                            <input type="text" class="country form-control @error('country') is-invalid @enderror" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                            <span id="country_error"  class="text-danger"></span>
                                            @error('country')
                                                <div class="invalid-feedback">Please Enter your ountry.</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">Zip</label>
                                            <input type="text" class="pincode form-control @error('pincode') is-invalid @enderror" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                            <span id="pincode_error"  class="text-danger"></span>
                                            @error('pincode')
                                                <div class="invalid-feedback">Please Enter your Code Zip.</div>
                                            @enderror
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                </div>
                                <hr class="my-4">
                            </div>
                        </div>
                        <div class="col-lg-4 bg-grey" style="background-color: #eae8e8;">
                            <div class="p-5">
                                <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                <h5 class="text-uppercase mb-3">Shipping</h5>
                                <hr class="my-4">
                                <table class="table">
                                    <thead>
                                        <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Price </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Cartsitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name_prod }}</td>
                                            <td>{{ $item->qty_prod }}</td>
                                            @if ($item->products->selling_price > 0)
                                                @php
                                                    $total1 = $item->products->selling_price * $item->qty_prod ;
                                                    $total11 += $total1;
                                                @endphp
                                                <td class="h5 mb-0">{{ $total1 }} DZ </td>
                                            @else
                                                @php
                                                    $total2 = $item->products->original_price * $item->qty_prod ;
                                                    $total22 += $total2;
                                                @endphp
                                                    <td class="h5 mb-0">{{ $total2 }} DZ </td>
                                                @endif
                                        </tr>
                                        @php
                                            $total = $total11 + $total22 ;
                                        @endphp
                                        <input type="hidden" name="price_total" value="{{ $total }}">
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr class="my-4">
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="text-uppercase">items {{ $totalitems }}</h5>
                                    <input type="hidden" class="total_price" value="{{ $total }}">
                                    <h5>{{ $total }}</h5>
                                </div>
                                <hr class="my-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-block btn-lg "  >Register | COD</button>
                                    <button type="button" class="btn btn-dark btn-block btn-lg razorpay_btn"  >Pay With Razorpay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
