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
                                        <div class="col-md-12">
                                            <div style="border-left: 5px solid red; " class="alert alert-secondary   ">
                                                <b>Note:</b>
                                                To secure your products, please pay 20% of the total transaction price.
                                                Thank you very much for putting your faith in us. You are always welcome in our store.
                                            </div>
                                            <div style="border-left: 5px solid rgb(20, 20, 20); " class="alert alert-light   ">
                                                <div style="background: #eee; width: 350px; border-radius: 10px;" class="py-1 my-1">
                                                    <img src="{{ asset('assets/Frontend/icon/baridmob.png')}}" class="mx-3 " width="80px" alt="logo baridmob">
                                                    <b>RIP: </b> <span id="rip">007 99999 002444973573</span>
                                                    <span style="cursor: pointer; font-size: 18px" id="copy-btn-rip" class="bg-dark text-white rounded mx-3 p-1">
                                                        <i class="bi bi-clipboard"></i>
                                                    </span>
                                                </div>
                                                <div style="background: #eee;  border-radius: 10px;" class="row py-1 mt-3">
                                                    <div class="col-sm-2 col-md-2">
                                                        <img src="{{ asset('assets/Frontend/icon/logo-round.png')}}" width="80px" alt="Logo Algeria poste">
                                                    </div>
                                                    <div class="col-sm-8 col-md-8">
                                                        <b>CCP: </b><span id="ccp"> 0024449735</span>
                                                        <span style="cursor: pointer" id="copy-btn-ccp" class="bg-dark text-white rounded mx-3 p-1">
                                                            <i class="bi bi-clipboard"></i>
                                                        </span>
                                                        <b>Cle: </b><span id="cle"> 73</span>
                                                        <span style="cursor: pointer" id="copy-btn-cle" class="bg-dark text-white rounded mx-3 p-1">
                                                            <i class="bi bi-clipboard"></i>
                                                        </span>
                                                        <br>
                                                        <b>Compane: </b><span id="compane"> TechShop Dz</span>
                                                        <span style="cursor: pointer" id="copy-btn-compane" class="bg-dark text-white rounded mx-3 p-1">
                                                            <i class="bi bi-clipboard"></i>
                                                        </span>
                                                        <br>
                                                        <b>Address: </b><span id="address"> N15 RUE DE LA MOSQUE AIN MERANE</span>
                                                        <span style="cursor: pointer" id="copy-btn-address" class="bg-dark text-white rounded mx-3 p-1">
                                                            <i class="bi bi-clipboard"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="image-upload-wrap">
                                                    <input type="file" name="image" class="form-contro file-upload-inputl @error('image') is-invalid @enderror" onchange="readURL(this);" accept="image/*" placeholder="Please Choose">
                                                    @error('image')
                                                    <div class="invalid-feedback fs-5">Please Enter your photo receipt of the operation.</div>
                                                @enderror
                                                </div>
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" width="600px" height="300px" src="#" alt="your image" />
                                                    <div class="image-title-wrap">
                                                        <button type="button" onclick="removeUpload()" class="btn btn-outline-danger  remove-image mt-3">Remove <span class="image-title">Uploaded Image</span></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <hr class="my-4"> --}}
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
                                    <button type="submit" class="btn btn-dark btn-block btn-lg "  >Register | CCP </button>
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
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
        $('.image-upload-wrap').hide();

        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();

        $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
    }

    function removeUpload()
    {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
    });

    // Buttons Copys
    // button copy RIP
    var copybtnrip  = document.getElementById("copy-btn-rip");
    var rip         = document.getElementById("rip");

    copybtnrip.onclick = function (){
        navigator.clipboard.writeText(rip.innerHTML);
        copybtnrip.innerHTML = '<i class="bi bi-clipboard-check"></i>'
        setTimeout(() => {
            copybtnrip.innerHTML = '<i class="bi bi-check-all"></i>'
        }, 2000);
    }
    // button copy CCp
    var copybtnccp = document.getElementById("copy-btn-ccp");
    var ccp = document.getElementById("ccp");

    copybtnccp.onclick = function ()
    {
        navigator.clipboard.writeText(ccp.innerHTML);
        copybtnccp.innerHTML = '<i class="bi bi-clipboard-check"></i>'
        setTimeout(() => {
            copybtnccp.innerHTML = '<i class="bi bi-check-all"></i>'
        }, 2000);
    }

    // button copy Cle
    var copybtncle = document.getElementById("copy-btn-cle");
    var cle = document.getElementById("cle");

    copybtncle.onclick = function ()
    {
        navigator.clipboard.writeText(cle.innerHTML);
        copybtncle.innerHTML = '<i class="bi bi-clipboard-check"></i>'
        setTimeout(() => {
            copybtncle.innerHTML = '<i class="bi bi-check-all"></i>'
        }, 2000);
    }
    // button copy Compane
    var copybtncompane = document.getElementById("copy-btn-compane");
    var compane = document.getElementById("compane");

    copybtncompane.onclick = function ()
    {
        navigator.clipboard.writeText(compane.innerHTML);
        copybtncompane.innerHTML = '<i class="bi bi-clipboard-check"></i>'
        setTimeout(() => {
            copybtncompane.innerHTML = '<i class="bi bi-check-all"></i>'
        }, 2000);
    }
    // button copy address
    var copybtnaddress = document.getElementById("copy-btn-address");
    var address = document.getElementById("address");

    copybtnaddress.onclick = function ()
    {
        navigator.clipboard.writeText(address.innerHTML);
        copybtnaddress.innerHTML = '<i class="bi bi-clipboard-check"></i>'
        setTimeout(() => {
            copybtnaddress.innerHTML = '<i class="bi bi-check-all"></i>'
        }, 2000);
    }


</script>
@endsection
