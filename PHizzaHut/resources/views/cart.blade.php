@extends('layouts.app')

@section('content')
@if (Auth()->user()->roles == 'member')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card mb-3 mt-5 col-md-12">
              <div class="row no-gutters">
                @foreach ($menu as $men)
                <div class="col-md-4 my-5">
                  <img src={{ asset('/' . $men->menu->photo)}} class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $men->menu->name }}</h5>
                    <p class="card-text">{{ $men->menu->desc }}</p>
                    <p class="card-text">Rp. {{ $men->menu->price }}</p>
                    <p class="card-text">{{ $men->quantity }}</p>
                    <form action="/cart/{{ $men->id }}" method="POST">
                      @method('patch')
                      @csrf
                      <div class="form-group row">
                          <label for="pqty" class="col-md-4 col-form-label">{{ __('Quantity :') }}</label>
                          <div class="col-md-6">
                              <input id="pqty" type="number" class="form-control" name="quantity">
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary mb-2">Update Quantity</button><br>
                    </form>
                    <form action="/cart/{{ $men->id }}" method="POST">
                      @method('delete')
                      @csrf
                    <button type="submit" class="btn btn-danger">Delete From Cart</button>
                    </form>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          <div class="row flex justify-content-center">
            @if (count($menu) != 0)
              <form method="POST" action="{{ route('passingTransaction') }}">
                  @csrf
                  <button type="submit" class="btn btn-dark mt-3" name="checkout">Checkout</button>
              </form>
            @endif
          </div>
      </div>
  </div>
</div>
@endif

@endsection