@extends('layouts.admin')

@section('title', 'Categorys ')

@section('title-page-cat' , 'Categorys Page')

@section('content')
    <div class="card border-0">
        <div class="header-body row">
            <div class="col-md-10">
                <h1>Category</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ url('add-category')}}" class="btn btn-dark">Create A New </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mate Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $item)
                        <tr>
                            <td scope="row">{{ $item->id}}</td>
                            <td>{{ $item->name_cate}}</td>
                            <td>{{ $item->mate_title}}</td>
                            <td>{{ $item->description}}</td>
                            <td> <img src="{{ asset('assets/uploads/category/'.$item->image)}}" width="200px" alt="{{$item->image }}"></td>
                            <td>
                                <a href="{{ url('edit-category/'.$item->id)}}" type="button" class="btn btn-outline-success mb-1"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('deleted-category/'.$item->id)}}" type="button" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
