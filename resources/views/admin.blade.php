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

                    You are logged in as an ADMIN!<br>

                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td> | 
                                <td> <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ $user->email }}
                                </a> </td> | 
                                <td>{{ $user->name }}</td>
                            </tr><br>  
                            
                        @endforeach
                    @else
                        I don't have any records! Nothing to display.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
