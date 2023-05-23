@extends('layouts.admin')

@section('title', 'Suppliers | Admin ')

@section('title-page-cat' , 'Suppliers Page')

@section('content')

<div class="container">
    <div class="card border-0">
        <div class="header-body row">
            <div class="col-md-12 d-flex justify-content-between">
                <h3>New Suppliers </h3>

            </div>
        </div>
        @if (count($topsuppliers) > 0 )
            {{--Start Card Suppliers --}}
            {{-- <div class="row">
                @foreach ($topsuppliers as $item)
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
                                    {{-- Start Modal for deleted supplier --}
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
                                    {{-- End modal for deleted supplier --}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        {{--End  Card Suppliers --}}
        @foreach ($providers as $provider)
            <div>
                <h3>{{ $provider->name }}</h3>
                <p>Average Rating: {{ $provider->average_rating }}</p>
            </div>
        @endforeach
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






