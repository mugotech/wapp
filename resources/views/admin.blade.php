@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white"><strong>ADMIN Dashboard</strong> <br> Welcome: {{$name}}</div>

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

                    You are logged in as an ADMIN!<br>

                    
                            <div class="row">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <th scope="col">Name</th>
                                      <th scope="col">Email</th>
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
                                        <td>{{ $user->email }} </td>
                                        <td> {{ $user->phone }}</td>
                                        <td> 
                                        <a href="#" data-target="#editUser{{$user->id}}" data-toggle="modal" class="btn btn-outline-primary">EDIT<i class="fa fa-edit"></i></a>
                                        </td>
                                        <td> 
                                            <a class="btn primary" href="{{ route('admin.user', ['id'=>$user->id]) }}">LOGIN</a>
                                        </td>
                                        <td> <a class="btn primary" href="{{ route('admin.delete', ['id'=>$user->id]) }}">DELETE</a></td>
                                    </tr>
                                    @include('edit')
                                @endforeach

                                @else
                                    <tr><td><h3>No records to display!</h3></td></tr>
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
