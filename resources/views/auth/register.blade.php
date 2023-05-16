@extends('layouts.app')

@section('title', 'Register')

@section('content')
{{--  --}}
<div class="form-v10">
    <div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" method="POST" action="{{ route('register') }}" id="myform">
                @csrf
				<div class="form-left">
					<h2>General Infomation</h2>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="fname" class="@error('fname') is-invalid @enderror" value="{{ old('fname') }}" class="input-text" placeholder="First Name" pattern="[A-Za-z]+\s[A-Za-z]+*" title="Only alphabets allowed" required>
							<span class="error-message">Please enter only alphabets and spaces.</span>
                            @error('fname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="lname" class="@error('lname') is-invalid @enderror" value="{{ old('lname') }}"  class="input-text" placeholder="Last Name" pattern="[A-Za-z]+\s[A-Za-z]+*" title="Only alphabets allowed" required>
							<span class="error-message"> Please enter only alphabets and spaces.</span>
                            @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						</div>
					</div>
					<div class="form-row">
						<input type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="example" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="form-row">
						<input type="password" name="password" class=" @error('password') is-invalid @enderror" id="showpass" value="{{ old('password') }}" id="password" placeholder="Enter Password"  pattern=".{6,}" title="Password must be at least 6 characters long" required>
                        <span class="error-message">Password must be at least 6 characters long.</span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-row">
						<input type="password" name="password_confirmation" class=" @error('password_confirmation') is-invalid @enderror" id="showpasscon" value="{{ old('password_confirmation') }}"  placeholder="Confirm Password"  pattern=".{8,}" title="Password must be at least 6 characters long" required>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-checkbox">
						<label class="container"><p class="text-dark">Show password.</p>
								<input type="checkbox" name="checkbox" onclick="showpassword()">
								<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<div class="form-right">
					<h2>Contact Details</h2>
					<div class="form-row">
						<input type="text" name="address1"  class="@error('address1') is-invalid @enderror" value="{{ old('address1') }}" placeholder="Address  1" pattern="[A-Za-z0-9\s]+.*" title="Please enter a valid address" required>
                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="form-row">
						<input type="text" name="address2"  class="@error('address2') is-invalid @enderror" value="{{ old('address2') }}" placeholder="Address  2" pattern="[A-Za-z0-9\s]+.*" title="Please enter a valid address" required>
                        @error('address2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" min="0"  class="@error('code') is-invalid @enderror" value="213"  placeholder="Code +" pattern="[0-9]{3}" title="Code number must be 3 digits" required>
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="form-row form-row-2">
							<input type="tel" name="phone" min="0"  class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}"  placeholder="Phone Number" pattern="[0-9]{10}" title="Phone number must be 10 digits" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>

					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="number" name="zip" class="@error('zip') is-invalid @enderror" value="{{ old('zip') }}" placeholder="Zip Code" pattern="[0-9]{5}" title="Phone number must be 5 digits" required>
                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="form-row form-row-2">
							<input type="text" name="city"  class="@error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="City" pattern="[A-Za-z]+*" required>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="state" class="@error('state') is-invalid @enderror" value="{{ old('state') }}" placeholder="State" pattern="[A-Za-z]*+" required>
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
						<div class="form-row form-row-2">
							<input type="text" name="country"  class="@error('country') is-invalid @enderror" value="{{ old('country') }}" placeholder="Country" pattern="[A-Za-z]+*" required>
                            @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="form-checkbox">
						<label class="container"><p>I do accept the <a href="#" class="text">Terms and Conditions</a> of your site.</p>
								<input type="checkbox" name="checkbox">
								<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" value="Register Now">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
{{--  --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('scripts')
    <script>
        const inputPassword = document.getElementById('showpass');
        const inputPasswordConfirmation = document.getElementById('showpasscon');

        function showpassword()
        {
            if (inputPassword.type == "password" || inputPasswordConfirmation.type == "password" )
            {
                inputPassword.type = "text";
                inputPasswordConfirmation.type = "text";
            }
            else
            {
                inputPassword.type = "password";
                inputPasswordConfirmation.type = "password";
            }
        }
    </script>
@endsection
