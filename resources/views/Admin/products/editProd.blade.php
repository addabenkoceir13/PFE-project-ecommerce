@extends('layouts.admin')

@section('title', 'Modify Products ')

@section('title-page-cat' , 'Products Page')

@section('content')
    <div class="card border-0">
        <div class="crd-header">
            <h4>Change The Product </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-products/'. $products->id)}}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @method('PUT')
                @csrf
                <div class="col-md-4">
                    <label class="form-label">Choose a category </label>
                    <select class="form-select @error('id_cate') is-invalid @enderror" name="id_cate" >
                        <option  selected disabled>{{ $products->category->name_cate}}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control @error('name_prod') is-invalid @enderror"  name="name_prod" placeholder="Name" value="{{$products->name_prod, old('name_cate') }}" required>
                    @error('name_prod')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Trade Mark</label>
                    <input type="text" class="form-control @error('mark_prod') is-invalid @enderror"  name="mark_prod" placeholder="Trade Mark" value="{{$products->mark_prod, old('mark_prod') }}" required>
                    @error('name_cate')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Original Price</label>
                    <input type="number" class="form-control @error('original_price') is-invalid @enderror"  name="original_price" placeholder="219900 DA" value="{{$products->original_price, old('original_price') }}" required>
                    @error('original_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Selling Price</label>
                    <input type="number" class="form-control @error('selling_price') is-invalid @enderror"  name="selling_price" placeholder="199900 DA" value="{{$products->selling_price, old('selling_price') }}" required>
                    @error('selling_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tax</label>
                    <input type="number" class="form-control @error('tax') is-invalid @enderror"  name="tax" placeholder="15%" value="{{$products->tax, old('tax') }}" required>
                    @error('tax')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Quantity </label>
                    <input type="number" class="form-control @error('qte_stock') is-invalid @enderror"  name="qte_stock" placeholder="156" value="{{$products->qte_stock, old('qte_stock') }}" required>
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
                        <input class="form-check-input mt-2" type="checkbox" {{ $products->status == '1' ? 'checked':'1'}} role="switch"  name="status" >
                        <label class="form-check-label mt-1" for="flexSwitchCheckDefault"> Status</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Stockages</label>
                    <input type="text" class="form-control @error('stockage') is-invalid @enderror"  name="stockage" placeholder="64, 128, 256, 512" value="{{ old('stockage') }}" required>
                    @error('stockage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label class="form-label">Colors</label>
                    <input type="text" class="form-control @error('color') is-invalid @enderror"  name="color" placeholder="white, black" value="{{ old('stockage') }}" required>
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Small Description</label>
                    <textarea name="small_descripton"  class="form-control @error('small_descripton') is-invalid @enderror"  rows="3" required>{{$products->small_descripton, old('small_descripton') }}</textarea>
                    @error('small_descripton')
                        <div class="invalid-feedback">Please provide a Small Description.</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Description</label>
                    <textarea name="description"  class="form-control @error('description') is-invalid @enderror"  rows="3"   required>{{$products->description, old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">Please provide a Description.</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button class="btn btn-outline-dark btn-lg float-end" type="submit">Add A Change</button>
                </div>
            </form>
            <div class="text-center">
                @if ($products->image)
                    <img src="{{ asset('assets/uploads/products/'.$products->image)}}" width="450px" alt="image ">

                @endif
            </div>
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


