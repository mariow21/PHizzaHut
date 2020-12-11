@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-body mx-4">Add New Pizza</h1>
                <form method="post" action="/apizza" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="pname" class="col-md-4 col-form-label ml-5">{{ __('Pizza Name') }}</label>

                    <div class="col-md-6">
                        <input id="pname" type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pprice" class="col-md-4 col-form-label ml-5">{{ __('Pizza Price :') }}</label>

                    <div class="col-md-6">
                        <input id="pprice" type="text" name="price" class="form-control  @error('price') is-invalid @enderror">
                        @error('price')
                            <div id="validationServer03Feedback" class="invalid-feedback">The price must be greater than 10000</div>
                        @enderror   
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pdesc" class="col-md-4 col-form-label ml-5">{{ __('Pizza Description :') }}</label>

                    <div class="col-md-6">
                        <input id="pdesc" type="text" name="desc" class="form-control  @error('price') is-invalid @enderror">
                        @error('desc')
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pfile" class="col-md-4 col-form-label ml-5">{{ __('Pizza Image :') }}</label>

                    <div class="col-md-6">
                        <input id="pfile" type="file" name="photo" class=" @error('photo') is-invalid @enderror">
                        @error('photo')
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>
                    <button type="submit" class="btn btn-dark mx-5 mb-3 d-flex justify-content-center">Add</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection