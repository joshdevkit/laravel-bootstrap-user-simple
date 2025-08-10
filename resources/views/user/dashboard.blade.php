@extends('layouts.app')
@section('content')

<div class="container">

    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Welcome, <strong>{{ auth()->user()->name }}</strong>!</h4>
                    <span class="badge bg-success">Online</span>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection