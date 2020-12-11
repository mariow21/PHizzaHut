@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Our Freshly made pizza!</h1>
            <h5>order it now!</h5>
            <form class="form-inline" action="/search">
              @csrf
                <h6 class=" mr-sm-5">Search Pizza:</h6>
                <input class="form-control mr-sm-2 col-md-8" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            @if (Auth()->user()->roles == 'admin')
            <a href="/apizza" class="btn btn-dark my-3">Add</a>
            @if (session('status'))
              <div class="alert alert-success">
              {{ session('status') }}
              </div>
            @endif
            <div class="row">
            @foreach ($pizza as $piz)
            <div class="col-md-4">
              <div class="card mt-5" style="width: 15rem;">
                <a href="/detaila/{{ $piz->id }}" class="text-decoration-none">
                  <img src={{ asset('/' . $piz->photo)}} class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-title" style="color: black">{{ $piz->name }}</</p>
                    <p class="card-text" style="color: black">Rp. {{ $piz->price }}</p>
                    <div class="card-body row">
                    <a href="/epizza/{{ $piz->id }}" class="card-link btn btn-primary">Update</a>
                    <a href="/delete/{{ $piz->id }}" class="card-link btn btn-danger">Delete</a>
                    </div>
                  </div>
                </a>
              </div>
            </div>           
            @endforeach
            </div>            
            @elseif (Auth()->user()->roles == 'member')
            <div class="row">
            @foreach ($pizza as $piz)
            <div class="col-md-4">
              <div class="card mt-5" style="width: 15rem;">
                <a href="/detailm/{{ $piz->id }}" class="text-decoration-none">
                <img src={{ asset('/' . $piz->photo)}} class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text" style="color: black">{{ $piz->name }}</p>
                  <p class="card-text" style="color: black">Rp. {{ $piz->price }}</p>
                </div>
                </a>
              </div>
            </div>
            @endforeach
            </div>
            @elseif (Auth()->user()->roles == 'guest')
            <div class="row">
            @foreach ($pizza as $piz)
            <div class="col-md-4">
              <div class="card mt-5" style="width: 15rem;">
                <a href="/detail/{{ $piz->id }}" class="text-decoration-none">
                <img src={{ asset('/' . $piz->photo)}} class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text" style="color: black">{{ $piz->name }}</p>
                  <p class="card-text" style="color: black">Rp. {{ $piz->price }}</p>
                </div>
                </a>
              </div>
            </div>
            @endforeach
            </div>
            @endif
            
    </div>
</div>
@endsection
