@extends('layouts.app')



@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Post</li>
        </ol>
    </nav>
@endsection

@section('content')
    {{-- <div class="content mt-3"> --}}
        <div class="animated fadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Dark card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Dark card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h5 class="card-title">Dark card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>

            
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection