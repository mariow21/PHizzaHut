@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">All User Transaction History</h5>
                    <div class="card-body">
                        @foreach ($menu as $men)
                            <p>Transaction at {{ $men->created_at }}
                            <br>User ID: {{ $men->user_id }}
                            <br>Username: {{ $men->user->name }}   
                            <br>============================================================================                        
                            </p>
                        @endforeach
                        
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection