@extends('layouts.admin')

@section('title', 'Suppliers | Admin ')

@section('title-page-cat' , 'Suppliers Page')

@section('content')

<div class="container">
    <div class="card border-0">
        <div class="header-body row">
            <div class="col-md-12 d-flex justify-content-between">
                <h3>New Suppliers </h3>
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Suppliers
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Suppliers </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="row g-3" action="{{ url('insert-supplier')}}" method="POST">
                        @csrf
                        <div class="modal-body row g-3">
                            <div class="col-md-4">
                                <label  class="form-label">Photo De Profile</label>
                                <input type="file" class="form-control  @error('image') is-invalid @enderror"  value="{{ old('image') }}" name="image"  placeholder="Enter your photo de profile" >
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">First Name</label>
                                <input type="text" class="form-control @error('fname') is-invalid @enderror"  value="{{ old('fname') }}" name="fname" placeholder="First Name" >
                                @error('fname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Last Name</label>
                                <input type="text" class="form-control @error('lname') is-invalid @enderror"  value="{{ old('lname') }}" name="lname" placeholder="Last Name" >
                                @error('lname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" name="email" placeholder="Enter your Email" >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Phone</label>
                                <input type="tel"  class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" name="phone" pattern="[0-9]{2}[0-9]{8}" placeholder="Enter your Phone" >
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror pac-input" id=""   value="{{ old('address') }}" name="address" placeholder="Enter your address" >
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Location Name:</label>
                                <input type="text" class="form-control @error('location_name') is-invalid @enderror pac-input" id="location-input"   value="{{ old('location_name') }}" name="location_name" placeholder="Enter Your location " >
                                @error('location_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Description</label>
                                <textarea name="descrpition" class="form-control @error('descrpition') is-invalid @enderror" rows="2" value="">{{ old('descripition') }}</textarea>
                                @error('descrpition')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Add New</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            {{-- End Modal --}}
        </div>
        @if ($suppliers->count() > 0)
            {{--Start Card Suppliers --}}
            <div class="row">
                @foreach ($suppliers as $item)
                    <div class="col-sm-12 col-md-6 col-xl-4 mt-2">
                        <div class="card p-1 h-100 remove-data" data-item="{{ $item }}" id="card-supplier">
                            <div class="card-body ">
                                <div class=" image d-flex flex-column justify-content-center align-items-center">
                                    @if ($item->image > 0 )
                                        <button class="btn  rounded-circle">
                                            <img src="{{ asset('assets/uploads/suppliers/'. $item->image)}}" class="rounded-circle" height="100" width="100" />
                                        </button>
                                    @else
                                        <button class="btn  rounded-circle">
                                            <img src="https://static.vecteezy.com/system/resources/previews/008/442/086/original/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg" class="rounded-circle" height="100" width="100" />
                                        </button>
                                    @endif
                                    <h5 class="name mt-3 font-weight-bold">{{ $item->fname .' '.$item->lname}}</h5>
                                    <span class="mx-2 text-primray">Supplier</span>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Email:</span>
                                    <span class="text-muted">{{ $item->email}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Phone:</span>
                                    <span class="text-muted">{{ $item->phone}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">Address:</span>
                                    <span class="text-muted">{{ $item->address}}</span>
                                </div>
                                <div class="d-flex justify-content-start align-items-center mt-3">
                                    <span class="mx-1 fw-bold text-dark">City:</span>
                                    <span class="text-muted">{{ $item->location}}</span>
                                </div>
                                <hr class="mt-5 ">
                                <div class="d-flex ">
                                    <p>
                                        @for ($i = 1; $i <= $item->rating ; $i++)
                                            <i class="fa fa-star text-warning"></i>
                                        @endfor
                                        @for ($j = $item->rating+1; $j <= 5; $j++)
                                            <i class="bi bi-star text-secondary"></i>
                                        @endfor
                                        @if ($item->rating > 0)
                                            <span class="text-muted"> {{ $item->rating }} Rating</span>
                                        @else
                                            <span class="text-muted"> 0 Rating</span>
                                        @endif

                                    </p>

                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="rounded  date ">
                                    <span class="join">Joined {{ $item->created_at->format('d M Y')}}</span>
                                </div>
                                <div>
                                    <a href="{{ url('send-email-suppliers/'.$item->id)}}" type="button" class="btn btn-outline-secondary "><i class="bi bi-envelope-plus"></i></a>
                                    <a href="{{ url('view-suppliers/'.$item->id)}}" type="button" class="btn btn-outline-success "><i class="bi bi-pencil-square"></i></a>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#confirmDeleteModal{{ $item->id }}">
                                        <i class="bi bi-person-dash-fill"></i>
                                    </button>
                                    {{-- Start Modal for deleted supplier --}}
                                    <div class="modal fade" id="confirmDeleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger" id="exampleModalLabel">Remove supplier {{ $item->fname.' '.$item->lname }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this Suppliers?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('supplier.deleted', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End modal for deleted supplier --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        {{--End  Card Suppliers --}}
        @else
            {{-- Start card no suppliers --}}
            <div class="card border-0">
                <div class="card-body">
                    <h1 class="card-title text-center"> <i class="bi bi-people mx-3"></i>No Suppliers Found</h1>
                </div>
            </div>
            {{-- end card no suppliers --}}
        @endif

    </div>
</div>
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

    </script>
@endsection



