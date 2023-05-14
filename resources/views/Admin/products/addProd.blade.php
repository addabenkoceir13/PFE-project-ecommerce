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
                    <div class="form-chec form-switch">
                        <input class="form-check-input mt-2" type="checkbox" role="switch" name="status" id="swithsat">
                        <label class="form-check-label mt-1 mx-2" for="swithsat"> Status</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Stocrages</label><br>
                    <div class="form-check form-check-inline">
                        <input  type="checkbox" name="storages[]"  value="64 GB" id="ids1">
                        <label style="cursor: pointer;" class="form-check-label" for="ids1" >64 GB</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="checkbox" name="storages[]"  value="128 GB" id="ids2">
                        <label style="cursor: pointer;" class="form-check-label" for="ids2" >128 GB</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="checkbox" name="storages[]"  value="256 GB" id="ids3" >
                        <label style="cursor: pointer;" class="form-check-label" for="ids3" >256 GB</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="checkbox" name="storages[]"  value="512 GB" id="ids4">
                        <label style="cursor: pointer;" class="form-check-label" for="ids4" >512 GB</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="checkbox" name="storages[]"  value="1 TB" id="ids5">
                        <label style="cursor: pointer;" class="form-check-label" for="ids5" >1 TB</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input  type="checkbox" name="storages[]"  value="2 TB" id="ids6" >
                        <label style="cursor: pointer;" class="form-check-label" for="ids6" >2 TB</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Colors</label><br>
                    <div class="form-check1 form-check-inline " >
                        <input type="checkbox" name="colors[]"  value="#000"  id="invalidCheck1">
                        <label class=" d-block" style="background: #000; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck1"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#fff" id="invalidCheck2">
                        <label class=" d-block" style="background: #fff; width: 32px; height: 32px; border: 1px solid #333; border-radius: 50%; cursor: pointer;" for="invalidCheck2"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#5e5566" id="invalidCheck3" >
                        <label class=" d-block" style="background: #5e5566; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck3"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#fb1230" id="invalidCheck4">
                        <label class=" d-block" style="background: #fb1230; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck4"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#d4c9b1" id="invalidCheck5">
                        <label class=" d-block" style="background: #d4c9b1; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck5"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#e2e4e1" id="invalidCheck6" >
                        <label class=" d-block" style="background: #e2e4e1; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck6"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#4b4845" id="invalidCheck7" >
                        <label class=" d-block" style="background: #4b4845; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck7"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#faf7f2" id="invalidCheck8" >
                        <label class=" d-block" style="background: #faf7f2; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck8"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#e5ddea" id="invalidCheck9" >
                        <label class=" d-block" style="background: #e5ddea; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck9"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#a9bacc" id="invalidCheck10" >
                        <label class=" d-block" style="background: #a9bacc; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck10"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#343b43" id="invalidCheck11" >
                        <label class=" d-block" style="background: #343b43; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck11"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="#FFFF00" id="invalidCheck12" >
                        <label class=" d-block" style="background: #FFFF00; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck12"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="silver" id="invalidCheck13" >
                        <label class=" d-block" style="background: silver; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck13"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="gray" id="invalidCheck14" >
                        <label class=" d-block" style="background: gray; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck14"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="" id="invalidCheck" >
                        <label class=" d-block" style="background: #; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck"></label>
                    </div>
                    <div class="form-check1 form-check-inline">
                        <input  type="checkbox" name="colors[]"  value="" id="invalidCheck" >
                        <label class=" d-block" style="background: #; width: 32px; height: 32px; border-radius: 50%; cursor: pointer;" for="invalidCheck"></label>
                    </div>

                </div>
                <div class="col-md-6">
                    <label class="form-label">Small Description</label>
                    <textarea name="small_descripton"  class="form-control @error('small_descripton') is-invalid @enderror"  rows="3" required>{{ old('small_descripton') }}</textarea>
                    @error('small_descripton')
                        <div class="invalid-feedback">Please provide a Small Description.</div>
                    @enderror
                </div>
                <div class="col-md-6">
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
    $(document).ready(function() {
        $('#example-getting-started').multiselect();
    });
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
})();


</Script>
@endsection


