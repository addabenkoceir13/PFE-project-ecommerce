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
                                <label  class="form-label">First Name</label>
                                <input type="text" class="form-control"  value="" name="fname" placeholder="First Name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Last Name</label>
                                <input type="text" class="form-control"  value="" name="lname" placeholder="Last Name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Email</label>
                                <input type="email" class="form-control"  value="" name="email" placeholder="Enter your Email" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Phone</label>
                                <input type="tel"  class="form-control"  value="" name="phone" pattern="[0-9]{2}[0-9]{8}" placeholder="Enter your Phone" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Fax</label>
                                <input type="tel" class="form-control"  value="" name="fax" pattern="[0-9]{5}[0-9]{4}" placeholder="Enter your fax" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Address</label>
                                <input type="text" class="form-control pac-input" id=""   value="" name="address" placeholder="" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-4">
                                <label  class="form-label">Location Name:</label>
                                <input type="text" class="form-control pac-input" id="location-input"   value="" name="location_name" placeholder="" required>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Description</label>
                                <textarea name="descripition" class="form-control" rows="2"></textarea>
                                <div class="invalid-feedback"></div>
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

        {{-- View Total information --}}
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Fax  </th>
                        <th scope="col">Address  </th>
                        <th scope="col">Action  </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->fname .' '.$item->lname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->fax }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <a href="{{ url('admin/view-order/'.$item->id)}}" type="button" class="btn btn-outline-success mb-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('admin/view-order/'.$item->id)}}" type="button" class="btn btn-outline-danger mb-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    $(document).ready(function() {
        // Location input field
        var locationInput = $("#location-input");

        // Autocomplete functionality
        locationInput.autocomplete({
            source: function(request, response) {
            // Nominatim API endpoint URL
            var url = "https://nominatim.openstreetmap.org/search";

            // Nominatim API query parameters
            var params = {
                q: request.term,
                format: "json"
            };

            // Send GET request to Nominatim API
            $.get(url, params)
                .done(function(data) {
                // Map Nominatim API response to an array of location names
                var locations = data.map(function(location) {
                    return location.display_name;
                });

                // Call the response function with the location names array
                response(locations);
                })
                .fail(function(error) {
                console.log("Error:", error);
                });
            },
            minLength: 3 // Minimum number of characters before autocomplete suggestions appear
        });
        });
    </script>
@endsection

