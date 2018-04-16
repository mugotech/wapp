@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white"><strong>ADMIN Dashboard</strong> <br> You are logged in as an ADMIN: <strong>{{Auth::user()->name}} {{Auth::user()->surname}}</strong></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif                   
                    <div class="row">
                        <label for="filter" class="card form-control-sm mb-3"><strong>Sort By:</strong> </label>
                        <div class="col-auto">
                            @sortablelink('created_at', 'Date Created')  
                        </div>|
                        <div class="col-auto">
                            @sortablelink('name','Customer Name')
                        </div>|
                        <div class="col-auto">
                            @sortablelink('email','Email Address')
                        </div>|
                    </div>                   
                    <div class="row">
                        <table class="table table-sm">
                          <thead class="bg-secondary text-white">
                            <tr>
                              <th scope="col">Full Name</th>
                              <th scope="col">Email Address</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Login</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if (count($users) > 0)
                              @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }} {{ $user->surname }} </td>
                                    <td>
                                        <a class="btn btn-link" href="mailto:{{ $user->email }}">{{ $user->email }}</a> 
                                    </td>
                                    <td> {{ $user->phone }}</td>
                                    <td> 
                                        <a href="#" data-target="#editUser{{$user->id}}" data-toggle="modal" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td> 
                                        <a class="btn btn-primary" href="{{ route('admin.user', ['id'=>$user->id]) }}">LOGIN</a>
                                    </td>
                                    <td> 
                                        <a class="btn btn-danger" href="{{ route('admin.delete', ['id'=>$user->id]) }}">DELETE</a>
                                    </td>
                                </tr>
                                @include('edit')
                              @endforeach
                                {!! $users->appends(\Request::except('page'))->render()!!}
                            @else
                                <tr >
                                    <td class="text-center">
                                        <div class="alert alert-warning"><h3>No records to display!</h3></div>
                                    </td>
                                </tr>
                            @endif
                          </tbody>
                        </table> 
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
