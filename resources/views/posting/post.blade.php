@extends('layouts.app')

@section('title', 'post')

{{-- @section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Post</li>
        </ol>
    </nav>
@endsection --}}

@section('content')
    {{-- <div class="content mt-3"> --}}
        <div class="animated fadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="container mb-3 mt-3">
                {{-- @foreach($posts as $post) --}}
                <div class="row">
                    <form action="/posting/post" method="post">
                        @csrf 
                        <div class="dropdown ml-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select by
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="submit" value="all" name="submit">All Post</button>
                                <button class="dropdown-item" type="submit" value="information" name="submit">Information</button>
                                <button class="dropdown-item" type="submit" value="tips" name="submit">Tips</button>
                                <button class="dropdown-item" type="submit" value="experience" name="submit">Experience</button>
                            </div>
                        </div>
                    </form>         
                </div>
            </div>
            <hr>
            
            <div class="container mb-4">
                
                <div class="row justify-content-center">
                        <div class="col-6 d-flex flex-row bd-highlight mb-1">
                            @if ( Auth::user()->role_id === 1 )
                                <div>
                                    <a href="/posting/export" class="btn btn-success">Export</a>
                                </div>
                                <div class="ml-2">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                        Import
                                    </button>
                                </div>
                            @endif
                        </div>
                   
                    <div class="col-6 d-flex flex-row-reverse bd-highlight">
                        @if ( Auth::user()->role_id === 1 )
                        <div class="ml-3 mt-2">
                            <label> Select all :</label>
                            <input type="checkbox" id="checkAll">
                        </div> 
                       
                        <form method="get" action="" onsubmit="return confirm('Are you sure want to delete this data ?')">
                                <button type="submit" class="btn btn-danger" id="deleteSelectedRecords" >delete selected</button>
                        </form>
                        @endif
                        <div>
                            <a href="/posting/create" class="btn btn-primary mr-3">Add Post</a>
                        </div> 
                          
                    </div>
                </div>
            </div>
           
                <div class="container justify-content-center">
                    @if( isset($title) )
                        <h2 class="ml-5 mb-3">{{ $title }} :</h2>
                    @else
                        <h2 class="ml-5 mb-3">All post :</h2>
                    @endif
                    <div class="row justify-content-center margin-auto">
                        @foreach($posts as $post)
                            <div class="card mb-5 mr-3 ml-4 text-white bg-dark" style="width: 18rem;" id="sid{{ $post->title }}">
                                @if ( Auth::user()->role_id === 1 )
                                <div class="card-header text-right">
                                    <input type="checkbox" name="ids" class="checkBoxClass" value="{{ $post->title }}">
                                </div>
                                @endif
                                @if( $post->thumb )
                                    <img style="height:180px; object-fit:cover; object-position:center;" src="{{ asset("storage/" . $post->thumb) }}" class="card-img-top">
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Posted by {{ $post->author->name }}</h6>
                                    <p class="card-text">{{ Str::limit($post->content, 50) }}</p>
                                    <a href="{{ url('posting/' .$post->title) }}" class="card-link">Read More</a>
                                    @if( Auth::user()->role_id === 1 || Auth::user()->id === $post->author->id )
                                        <a href="/posting/{{ $post->title }}/edit" class="card-link">Edit Post</a>
                                    @endif
                                  </div>

                                
                                <div class="card-footer">
                                    <p class="card-text"><small class="text-muted">Published on {{ $post->created_at->diffForHumans() }}</small></p>
                                </div>
                               
                            </div>
                            
                        @endforeach
                    </div>
                </div>         
                <div class="row justify-content-center">
                    {{ $posts->links() }}
                </div>
        
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="/posting/import" method="post" enctype="multipart/form-data">
                            @csrf 
                            <div class="modal-body">
                            
                                <div class="form-group" >
                                    <input type="file" name="import" id="import">
                                </div>
                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Import</button>
                                </div>
                        
                            </div>
                        </form>
                    </div>
                </div>
                            
        </div><!-- .animated -->
    </div><!-- .content -->

    <script>
        $(function(e){
            $("#checkAll").click(function(){
                $(".checkBoxClass").prop('checked',$(this).prop('checked'));
            });

            
            $('#deleteSelectedRecords').click(function(e){
                var r = confirm("Are you sure you want to delete selected data?");
                if (r == true) {
                    var allids = [];
                    $("input:checkbox[name=ids]:checked").each(function(){
                        allids.push($(this).val());
                    });
                    $.ajax({
                        url:"post",
                        type:'DELETE',
                        data:{
                            ids:allids,
                            _token:$("input[name=_token]").val()
                        },
                        success:function(response)
                        {
                            $.each(allids,function(key,val){
                                $('#sid'+val).remove();
                            })
                        }
                    });
                } else {
                    txt = "You pressed Cancel!";
                }
                e.preventDefault();
                
            });
        });
    </script>
@endsection