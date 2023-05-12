@extends('layouts.admin')

@section('title', 'Supplier Revise | Admin ')

@section('title-page-cat' , 'Suppliers Page')

@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <form action="{{ url('edit-profile-admin')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row " style="background: #edeeee">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <div class="position-relative">
                    @if ($admin->image > 0)
                        <div class="file-upload-content">
                            <img  class="file-upload-image rounded-circle mt-5" width="150px" height="150px" src="{{ asset('assets/Frontend/Users/'.$admin->image)}}">
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
                    <span class="font-weight-bold">{{ $admin->name }}</span>
                    <span class="text-black-50">{{ $admin->email }}</span>
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
                        <label class="labels">firs Name</label>
                        <input type="text" class="form-control  @error('fname') is-invalid @enderror" placeholder="first name" name="fname" value="{{ $admin->fname }}">
                        @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Last Name</label>
                        <input type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ $admin->lname }}" placeholder="surname">
                        @error('lname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="enter phone number" name="phone" value="{{ $admin->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email ID</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="enter email id" name="email" value="{{ $admin->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address Line 1</label>
                        <input type="text" class="form-control @error('address1') is-invalid @enderror" placeholder="enter address line 1" name="address1" value="{{ $admin->address1 }}">
                        @error('address1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address Line 2</label>
                        <input type="text" class="form-control @error('address2') is-invalid @enderror" placeholder="enter address line 2" name="address2" value="{{ $admin->address2 }}">
                        @error('address2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="enter address line 2" name="city" value="{{ $admin->city }}">
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels">State/Region</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $admin->state }}" placeholder="state">
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Country</label>
                        <input type="text" class="form-control @error('country') is-invalid @enderror" placeholder="country" name="country" value="{{ $admin->country }}">
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="labels">Postcode</label>
                        <input type="text" class="form-control @error('pincode') is-invalid @enderror" placeholder="enter address line 2" name="pincode" value="{{ $admin->pincode }}">
                        @error('pincode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-outline-dark profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
@endsection

@section('scripts')
    <script>
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
