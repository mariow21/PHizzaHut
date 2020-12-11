@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <h3 class="card-header">Transaction History</h3>
                    <div class="card-body">
                        @foreach ($history as $his)
                        <a href="/tdetail/{{ $his->id }}" class="text-decoration-none" style="color: black" >Transaction at {{ $his->created_at }}</a>
                            <br>
                            <br>
                        @endforeach
                    </div>
    </div>
</div>
@endsection