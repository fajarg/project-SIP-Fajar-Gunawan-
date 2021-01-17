@extends('layouts.app')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
@endsection

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header"><h5>{{ __('Dashboard') }}</h5></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h5>Welcome {{ Auth::user()->name }} {{ __(', You are logged in!') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection