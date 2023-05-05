@extends('layouts.admin')

@section('title', 'Add New Category ')

@section('title-page-cat' , 'Category Page')

@section('content')
    <div class="card border-0">
        <div class="crd-header">
            <h4>Create a new category </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-category')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name_cate') is-invalid @enderror"  name="name_cate" placeholder="Name" required>
                    @error('name_cate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Mate Title</label>
                    <input type="text" class="form-control @error('mate_title') is-invalid @enderror"  name="mate_title" placeholder="Mate Title" required>
                    @error('mate_title')
                        <div class="invalid-feedback">Please provide a Mate Title.</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="validationCustom03" class="form-control @error('description') is-invalid @enderror"  rows="3" required></textarea>
                    @error('description')
                        <div class="invalid-feedback">Please provide a Description.</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" aria-label="file example" required>
                    @error('image')
                        <div class="invalid-feedback">Please Choose a images.</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-dark btn-lg float-end" type="submit">Add A New </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('Script')
<Script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
    }, false)
    })
})()
</Script>
@endsection


