@extends('layouts.app')

@section('title', $post->title)

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Post Detail</li>
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
                
            <div class="row justify-content-center mt-5">               
                <div class="col-md-8">
                    <h1>{{ $post->title }}</h1>
                    <div class="text-secondary">
                        Category : {{ $post->category }}
                    </div>
                    <div class="text-secondary">
                        Posted by {{ $post->author->name }} at {{ $post->created_at }}
                    </div>
                    <hr>
                    <p>{{ $post->content }}</p>
                    @if( Auth::user()->role_id === 1 || Auth::user()->id === $post->author->id )
                    <div>
                        <form method="post" action="/posting/{{ $post->title }}/delete" onsubmit="return confirm('Are you sure want to delete this data ?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-link text-danger btn-sm p-0" type="submit">Delete Post</button>
                        </form>
                    </div>
                    @endif
                    <a href="/posting/{{ $post->title }}/download" target="_blank">Download Post</a>
                </div>
            </div>

            
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection