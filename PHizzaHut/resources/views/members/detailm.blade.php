@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 mt-5 col-md-12">
                <div class="row no-gutters">
                  <div class="col-md-4 my-5">
                    <img src={{ asset('/' . $menu->photo)}} class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <form method="post" action="{{ route('detailm', $menu->id) }}">
                    @csrf
                    <div class="card-body">
                      <h5 class="card-title">{{$menu -> name}}</h5>
                      <p class="card-text">{{$menu -> desc}}</p>
                      <p method="post" class="card-text">Rp. {{$menu -> price}}</p>
                      
                      <div class="form-group row">
                        <label for="pqty" class="col-md-4 col-form-label">{{ __('Quantity :') }}</label>

                        <div class="col-md-6">
                        <input id="pqty" type="number" class="form-control" name="quantity" placeholder="Quantity" @error('quantity') is-invalid @enderror>
                          @error('quantity')
                            <div id="validationServerFeedback" class="invalid-feedback">{{ $message }}</div>
                          @enderror 
                        </div>
                        <button type="submit" class="btn btn-primary ml-5 mt-3">Add to Cart</button>
                      </form>
                      
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection