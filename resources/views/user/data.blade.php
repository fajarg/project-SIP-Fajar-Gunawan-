@extends('layouts.app')

@section('title', 'Users')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">User</li>
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
                @if ( Auth::user()->role_id === 1 )
                    <div class="pull-right">
                        <a href="{{ url('user/add') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus"></i> Add Data
                        </a>
                    </div>
                @endif
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Role id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                {{-- @if ( Auth::user()->role_id === 1 ) --}}
                                    <th>Action</th>
                                {{-- @endif --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $item->role_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    {{-- <td>{{ $item->username }}</td> --}}
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    @if ( Auth::user()->role_id === 1 )
                                        <td class="text-center">
                                       
                                            <a href="{{ url('user/edit/' .$item->id) }}" class="btn btn-primary btn-sm">
                                                edit
                                            </a>
                                            <form action="{{ url('user/' .$item->id) }}" class="d-inline" method="post" onsubmit="return confirm('Are you sure want to delete this data ?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    delete
                                                </button>
                                            </form>
                                            <a href="{{ url('user/detail/' .$item->id) }}" class="btn btn-success btn-sm">
                                                detail
                                            </a>
                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a href="{{ url('user/detail/' .$item->id) }}" class="btn btn-success btn-sm">
                                                detail
                                            </a>
                                        </td>
                                    @endif
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection