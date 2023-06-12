@extends('layouts.admin')

@section('title', 'Supplier Revise | Admin ')

@section('title-page-cat' , 'Suppliers Page')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <form action="{{ url('update-supplier/'.$supplier->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    {{-- @method('PUT') --}}
    <div class="row " style="background: #edeeee">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="position-relative">
                    @if ($supplier->image > 0)
                        <div class="file-upload-content">
                            <img  class="file-upload-image rounded-circle mt-5" width="150px" height="150px" src="{{ asset('assets/uploads/suppliers/'.$supplier->image)}}">
                        </div>
                    @else
                        <div class="file-upload-content">
                            <img class="file-upload-image rounded-circle mt-5" width="150px" height="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                        </div>
                    @endif
                    <div style="bottom:-10%; left:25%" class="position-absolute">
                        <button type="button" onclick="$('.file-upload-input').trigger( 'click' )" class="file-upload-btn btn btn-light"><span class="badge bg-light text-dark">Edit Photo</span></button>
                    </div>
                </div>
                <div class="mt-3">
                    @php
                        $name = $supplier->fname.' '.$supplier->lname;
                    @endphp
                    <span class="font-weight-bold">{{  $name }}</span>
                    <span class="text-black-50">{{ $supplier->email }}</span>
                </div>
                <div class="image-upload-wrap invisible">
                    <input class="file-upload-input" type='file' name="image" value="{{ old('image') }}" onchange="readURL(this);" accept="image/*" />
                </div>
            </div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels form-label">firs Name</label>
                        <input type="text" class="form-control  @error('fname') is-invalid @enderror" placeholder="first name" name="fname" value="{{ $supplier->fname }}">
                        @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels form-label">Last Name</label>
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $supplier->lname }}" placeholder="surname">
                        @error('lname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels form-label">Mobile Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="enter phone number" name="phone" value="{{ $supplier->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels form-label mt-2">Email ID</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="enter email id" name="email" value="{{ $supplier->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels form-label mt-2">Address Line 1</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="enter address line 1" name="address" value="{{ $supplier->address }}">
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels form-label mt-2">Address Location</label>
                        <input type="text" class="form-control @error('location_name') is-invalid @enderror" placeholder="enter your location" id="location-input" name="location_name" value="{{ $supplier->location }}">
                        @error('location_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels form-label mt-2">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"   rows="3">{{ $supplier->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                {{-- Start star rating --}}
                <div class="col-md-12 d-flex justify-content-center my-4">
                {{-- Start button model rating --}}
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            @php $ratenum = $supplier->ratings->rating; @endphp
                            @for ($i = 1; $i <= $ratenum ; $i++)
                                <i class="fa fa-star text-warning"></i>
                            @endfor
                            @for ($j = $ratenum+1; $j <= 5; $j++)
                                <i class="bi bi-star text-secondary"></i>
                            @endfor
                            @if ($ratenum > 0)
                                <span class="list-inline-item ">{{ $ratenum }} Rating</span>
                            @else
                                <span class="list-inline-item ">No Rating  </span>
                            @endif

                    </button>
                {{-- end button model rating --}}
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-outline-dark profile-button" type="submit">Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
{{-- start model rating --}}
<form action="{{ url('rating-suppliers')}}"   method="post">
    @csrf
        <input type="hidden" name="id_supp"  value="{{ $supplier->id }}">
        <input type="hidden" name="id_admin" value="{{ Auth::user()->id }}">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate  </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon">
                                @if($supplier->ratings->rating)
                                    @for ($i = 1; $i <= $supplier->ratings->rating ; $i++)
                                        <input type="radio" value="{{$i}}" name="suppliers_rating" checked id="rating{{$i}}">
                                        <label for="rating{{$i}}" class="fa fa-star"></label>
                                    @endfor
                                    @for ($j = $supplier->ratings->rating+1; $j <= 5; $j++)
                                        <input type="radio" value="{{$j}}" name="suppliers_rating"  id="rating{{$j}}">
                                        <label for="rating{{$j}}" class="fa fa-star "></label>
                                    @endfor
                                @else
                                    <input type="radio" value="1" name="suppliers_rating" checked  id="rating1">
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="suppliers_rating" id="rating2">
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="suppliers_rating" id="rating3">
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="suppliers_rating" id="rating4">
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="suppliers_rating" id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark rating-now">Rating now</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
{{-- end model rating --}}
@endsection

@section('scripts')
    <script>
         // Location Name
    $(document).ready(function()
    {
        // Location input field
        var locationInput = $("#location-input");

        // Autocomplete functionality
        locationInput.autocomplete({
            source: function(request, response)
            {
            // Nominatim API endpoint URL
            var url = "https://nominatim.openstreetmap.org/search";

            // Nominatim API query parameters
            var params = {
                q: request.term,
                format: "json"
            };

            // Send GET request to Nominatim API
            $.get(url, params)
                .done(function(data)
                {
                // Map Nominatim API response to an array of location names
                var locations = data.map(function(location) {
                    return location.display_name;
                });

                // Call the response function with the location names array
                response(locations);
                })
                .fail(function(error)
                {
                console.log("Error:", error);
                });
            },
            minLength: 3 // Minimum number of characters before autocomplete suggestions appear
        });
    });


    // Change photo profile
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

    function removeUpload() {
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
    </script>
@endsection
