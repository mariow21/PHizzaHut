@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3 col-md-12">
                <div class="row no-gutters">
                  @foreach ($tdetail as $tdet)
                    <div class="col-md-4 my-3">
                      <img src={{ asset('/' . $tdet->menu->photo)}} class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{ $tdet->menu->name }}</h5>
                        <p class="card-text">Rp. {{ $tdet->menu->price }}</p>
                        <p class="card-text">{{ $tdet->quantity }}</p>
                        <p class="card-text">Total Price: {{ $tdet->menu->price * $tdet->quantity }}</p>
                        <p></p>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
    </div>
</div>
@endsection