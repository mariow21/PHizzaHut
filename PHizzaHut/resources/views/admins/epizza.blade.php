@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3 mt-5 col-md-12">
                <div class="row no-gutters">
                  <div class="col-md-4 my-5">
                    <img src={{ asset('/' . $menu->photo)}} class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-body mx-4">Edit Pizza</h1>
                        <form action="/epizza/{{ $menu->id }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                            <div class="form-group row">
                                <label for="pname" class="col-md-4 col-form-label ml-5">{{ __('Pizza Name') }}</label>
            
                                <div class="col-md-6">
                                    <input id="pname" type="text" class="form-control" name="name" value="{{ $menu->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pprice" class="col-md-4 col-form-label ml-5">{{ __('Pizza Price :') }}</label>
            
                                <div class="col-md-6">
                                    <input id="pprice" type="number" class="form-control" name="price" value="{{ $menu->price }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pdesc" class="col-md-4 col-form-label ml-5">{{ __('Pizza Description :') }}</label>
            
                                <div class="col-md-6">
                                    <input id="pdesc" type="text" class="form-control" name="desc" value="{{ $menu->desc }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pfile" class="col-md-4 col-form-label ml-5">{{ __('Pizza Image :') }}</label>
            
                                <div class="col-md-6">
                                    <input id="pfile" type="file" name="photo" value="{{ $menu->photo }}">
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <button for="button" type="submit" class="col-form-label ml-5 btn btn-primary">{{ __('Edit Pizza') }}</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
    </div>
</div>
@endsection