@extends('layouts.admin')

@section('title', 'Suppliers | Admin ')

@section('title-page-cat' , 'Products Suppliers Page')

@section('content')
    <div class="card border-0">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Suppliers</th>
                        <th scope="col">Name Products</th>
                        <th scope="col">Brand Products</th>
                        <th scope="col">Quantity Products</th>
                        <th scope="col">Rating Products</th>
                        <th scope="col">Reviews Products</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prod_suppliers as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        @php
                            $spplierexits = App\Models\Suppliers::where('id', $item->id_supp)->exists();
                        @endphp
                        @if ($spplierexits)
                            <td>{{ $item->fournisseur->fname}} <br> {{$item->fournisseur->lname}}</td>
                        @else
                            <td>No Suppliers</td>
                        @endif
                        <td>{{ $item->name_prod }}</td>
                        <td>{{ $item->mark_prod }}</td>
                        <td>{{ $item->qte_stock }}</td>
                        @php
                            $ratings_check  = App\Models\Notation::where('id_prod', $item->id)->exists();


                            if ($ratings_check)
                            {
                                $ratings        = App\Models\Notation::where('id_prod', $item->id)->get();
                                $rating_sum     = App\Models\Notation::where('id_prod', $item->id)->sum('stars_rated');
                                if ($ratings->count() > 0)
                                {
                                    $rating_value = $rating_sum/$ratings->count();
                                }
                                else
                                {
                                    $rating_value = 0;
                                }
                            }
                            else
                            {
                                $rating_value = 0;
                            }
                            $rating_val = number_format( $rating_value );
                        @endphp
                        <td>
                            @if ($rating_val > 0)
                                @for ($i = 1; $i <= $rating_val ; $i++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor
                                @for ($j = $rating_val+1; $j <= 5; $j++)
                                    <i class="bi bi-star text-secondary"></i>
                                @endfor
                            @else
                                @for ($i = 0; $i < 5 ; $i++)
                                    <span><i class="bi bi-star text-secondary"></i></span>
                                @endfor
                            @endif
                            @if (count($ratings) > 0)
                                <span class="list-inline-item text-dark">{{ $ratings->count() }} Rating</span>
                            @else
                                <span class="list-inline-item text-dark">No Rating  </span>
                            @endif
                        </td>
                        @php
                            $reviews = App\Models\Review::where('id_prod', $item->id)->count();
                        @endphp
                        <td>{{ $reviews }} Reviews</td>
                        <td><img src="{{asset('assets/uploads/products/'.$item->image)}}" width="80px" alt="{{ $item->image}}"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
