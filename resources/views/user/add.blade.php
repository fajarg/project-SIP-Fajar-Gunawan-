@extends('layouts.app')

@section('title', 'Add Users')


@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
    </nav>
@endsection


@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
           

            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <a href="{{ url('user') }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-4 offset-md-4">
                            <form action="{{ url('user') }}" method="post">
                                @csrf
                                <div class="form-group" >
                                    <label for="role-id">Select role id :</label>
                                    <select class="form-control" id="role-id" name="roleid">
                                        <option selected>Choose...</option>
                                        <option value="1">1 - admin</option>
                                        <option value="2">2 - user</option>
                                      </select>
                                </div>
                                <div class="form-group" >
                                    <label for="nama">Name :</label>
                                    <input type="text" name="nama" class="form-control" placeholder="name..." id="nama" required>
                                </div>
                                <div class="form-group" >
                                    <label for="usernama">Username :</label>
                                    <input type="text" name="usernama" class="form-control" placeholder="username..." id ="usernama" required>
                                </div>
                                <div class="form-group" >
                                    <label for="email">Email :</label>
                                    <input type="email" name="email" class="form-control" placeholder="name@example.com" id ="email" required>
                                </div>
                                <div class="form-group" >
                                    <label for="password">Password :</label>
                                    <input type="password" name="password" class="form-control" placeholder="password..." id ="password" required>
                                </div>
                                <div class="form-group" >
                                    <label for="create">Created at :</label>
                                    <input type="text" name="create" class="form-control" id="create" value="<?php echo date("Y-m-d H:i:s");?>">
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