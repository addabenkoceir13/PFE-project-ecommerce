@extends('layouts.admin')

@section('title', 'Map ')

@section('title-page-cat' , 'Map Page')

@section('content')
{{-- Google map html --}}

    <div id="map" style="height: 80vh;"></div>



@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha384-dQWfNvQ5ENfvuoLMg+7X9YrknHHv7xktI+UbxVn8uH6oqP7+I2gNWfV6X9R6JZAc" crossorigin="anonymous"></script>
    <script>

        var map = L.map('map', {
            center: [36.16026353417697, 0.9732902261488297],
            zoom: 12,
            language: 'ar' // set the language to Arabic
        });

        L.tileLayer('https://api.maptiler.com/maps/openstreetmap/256/{z}/{x}/{y}.jpg?key=Vbo0sEIzZ0MsPpzinVMr', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            maxZoom: 20,
        }).addTo(map);

        var suppliers = @JSON($suppliers);
            console.log(suppliers);

        for (var i = 0; i < suppliers.length; i++) {
            var supplier = suppliers[i];
            var marker = L.marker([supplier.let, supplier.lng]).addTo(map);
            var popupContent = `
                <div>
                    <h3>${supplier.fname} ${supplier.lname}</h3>
                    <h5>${supplier.email} </h5>
                    <h5>${supplier.phone} </h5>
                    <h5>${supplier.address} </h5>
                    <p class="fs-3" >Rating: ${generateRatingStars(supplier.rating)}</p>
                </div>
            `;
            marker.bindPopup(popupContent);

            // Helper function to generate rating stars
            function generateRatingStars(rating) {
                var starsHtml = '';
                for (var i = 0; i < 5; i++) {
                    if (i < Math.floor(rating))
                    {
                        starsHtml += '<i class="fa fa-star text-warning"></i>'; // Full star
                    }
                    else if (i == Math.floor(rating) && rating % 1 >= 0.5)
                    {
                        starsHtml += '<i class="bi bi-star-half text-warning"></i>'; // Half star
                    }
                    else
                    {
                        starsHtml += ' <i class="bi bi-star text-secondary"></i>'; // Empty star
                    }
                }
                return '<span class="rating-stars">' + starsHtml + '</span>';
            }

        }

    </script>
@endsection

