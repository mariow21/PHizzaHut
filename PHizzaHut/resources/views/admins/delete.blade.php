@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3 mt-5 col-md-12">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src={{ asset('/' . $menu->photo)}} class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$menu -> name}}</h5>
                      <p class="card-text">{{$menu -> desc}}</p>
                      <p class="card-text">{{$menu -> price}}</p>
                    <form action="{{ $menu->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger ml-5">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection