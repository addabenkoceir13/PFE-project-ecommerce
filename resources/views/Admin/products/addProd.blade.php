@extends('layouts.admin')

@section('title', 'Add New Products ')

@section('title-page-cat' , 'Products Page')

@section('content')
    <div class="card border-0">
        <div class="crd-header">
            <h4>Create a new product </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-product')}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-md-4">
                    <label class="form-label">Choose a category </label>
                    <select class="form-select @error('id_cate') is-invalid @enderror" name="id_cate" value="{{ old('id_cate') }}">
                        <option selected disabled>choose a category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id}}">{{ $item->name_cate}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Choose a Suppliers </label>
                    <select class="form-select @error('id_supp') is-invalid @enderror" name="id_supp" value="{{ old('id_supp') }}">
                        <option selected disabled>choose a category</option>
                        @foreach ($suppliers as $item)
                            <option value="{{ $item->id}}">{{ $item->fname .' '. $item->lname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name_prod') is-invalid @enderror"  name="name_prod" placeholder="Name" value="{{ old('name_prod') }}" required>
                    @error('name_prod')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Trade Mark</label>
                    <input type="text" class="form-control @error('mark_prod') is-invalid @enderror"  name="mark_prod" placeholder="Trade Mark" value="{{ old('mark_prod') }}" required>
                    @error('name_cate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Original Price</label>
                    <input type="number" class="form-control @error('original_price') is-invalid @enderror"  name="original_price" placeholder="219900 DA" value="{{ old('original_price') }}" required>
                    @error('original_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Selling Price</label>
                    <input type="number" class="form-control @error('selling_price') is-invalid @enderror"  name="selling_price" placeholder="199900 DA" value="{{ old('selling_price') }}" required>
                    @error('selling_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Quantity </label>
                    <input type="number" class="form-control @error('qte_stock') is-invalid @enderror"  name="qte_stock" placeholder="156" value="{{ old('qte_stock') }}" required>
                    @error('qte_stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4 ">
                    <label class="form-label">Choose a Images</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" aria-label="file example" value="{{ old('image') }}" required>
                    @error('image')
                        <div class="invalid-feedback">Please Choose a images.</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input mt-2" type="checkbox" role="switch" name="status" >
                        <label class="form-check-label mt-1" for="flexSwitchCheckDefault"> Status</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stockages</label>
                    <input type="text" class="form-control @error('stockage') is-invalid @enderror"  name="stockage" placeholder="64, 128, 256, 512" value="{{ old('stockage') }}" required>
                    @error('stockage')
                        <div class="invalid-feedback">Please enter your Stockages</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Colors</label>
                    <input type="text" class="form-control @error('color') is-invalid @enderror"  name="color" placeholder="white, black" value="{{ old('color') }}" required>
                    @error('color')
                        <div class="invalid-feedback">Please enter your Colors</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Small Description</label>
                    <textarea name="small_descripton"  class="form-control @error('small_descripton') is-invalid @enderror"  rows="3" required>{{ old('small_descripton') }}</textarea>
                    @error('small_descripton')
                        <div class="invalid-feedback">Please provide a Small Description.</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Description</label>
                    <textarea name="description"  class="form-control @error('description') is-invalid @enderror"  rows="3"   required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">Please provide a Description.</div>
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


