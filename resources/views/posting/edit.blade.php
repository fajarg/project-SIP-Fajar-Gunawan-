@extends('layouts.app')

@section('title', 'Edit Posts')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
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

            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <a href="{{ url('/posting/post') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-6 offset-md-3">
                            <form action="/posting/{{ $post->title }}/edit" method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf 
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group" >
                                    <label for="title">Title :</label>
                                    <input type="text" name="title" class="form-control" placeholder="title..." id="title" value="{{ $post->title }}" required>
                                </div>
                                <div class="form-group" >
                                    <label for="content">Content :</label>
                                    <textarea name="content" class="form-control" id="content" rows="5" required>{{ $post->content }}</textarea>
                                </div>

                                <div class="form-group" >
                                    <label for="category">Select Category :</label>
                                    <select class="form-control" id="category" name="category" value="{{ $post->category }}">
                                        @if ($post->category === 'information')
                                            <option value="information">Information</option>
                                            <option value="tips">Tips</option>
                                            <option value="experience">Experience</option>
                                        @elseif ($post->category === 'tips') 
                                            <option value="tips">Tips</option>
                                            <option value="experience">Experience</option>
                                            <option value="information">Information</option>
                                        @elseif ($post->category === 'experience')
                                            <option value="experience">Experience</option>
                                            <option value="information">Information</option>
                                            <option value="tips">Tips</option>
                                        @endif  
                                      </select>
                                </div>                                                           
                                
                                <div class="form-group" >
                                    <label for="thumb">Thumb :</label><br>
                                    <input type="file" name="thumb" id="thumb" value="{{ $post->thumb }}">
                                </div>

                                <div class="form-group" >
                                    <label for="create">Created at :</label>
                                    <input type="text" name="create" class="form-control" id="create" value="{{ $post->created_at }}">
                                </div>
                                <div class="form-group" >
                                    <label for="update">Updated at :</label>
                                    <input type="text" name="update" class="form-control"  id="update" value="<?php echo date("Y-m-d H:i:s");?>">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                       </div>
                    </div>   
                </div>
            </div>

            
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection