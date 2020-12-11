@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($user as $use)
        <div class="col-md-2 mx-3 my-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" style="width: 13rem;">
                        <div class="card-header" style="background: rgba(201, 40, 40, 0.952); color:white;">
                            User ID {{ $use->id }}
                        </div>
                        
                            <div class="card-body">
                                <h6>{{ $use->name }}</h6>
                                <h6 class="mt-3">{{ $use->email }}</h6>
                                <h6 class="mt-3">{{ $use->address }}</h6>
                                <h6 class="mt-3">{{ $use->phone }}</h6>
                                <h6 class="mt-3">{{ $use->gender }}</h6>
                            </div>              
                    </div>
                </div>
            </div>
        </div>
        @endforeach  
    </div>
</div>
@endsection