@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white"><strong>User Dashboard</strong><br>
                    @php
                        if (Auth::user()->admin){
                        echo 'You are masquerading as: ' . $user->name;
                    } else
                    echo 'You are logged in as: ' . $user->name;
                    @endphp
                </div>

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

                   <form enctype="multipart/form-data" method="POST" action="{{ route('home.update') }}">
                        @csrf
                        <div class="row">
                    <div class="col-md-6">
                        <input id="id" type="hidden" name="id" value="{{ $user->id }}">
                       <div class="form-group">
                            <label for="company" class="form-control-sm mb-0">{{ __('COMPANY NAME') }}:</label>
                            <input id="company" type="text" class="form-control form-control-sm" name="company" value="{{ $user->company }}" autofocus>
                        </div> 

                        <div class="form-group">
                            <label for="name" class="form-control-sm mb-0">{{ __('FIRST NAME') }}:</label>
                            <input name="name" type="text" class="form-control form-control-sm" id="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="surname" class="form-control-sm mb-0">{{ __('LAST NAME') }}:</label>
                            <input name="surname" type="text" class="form-control form-control-sm" id="surname" value="{{ $user->surname }}">
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-control-sm mb-0">{{ __('MOBILE NUMBER') }}:</label>
                            <input name="phone" type="tel" class="form-control form-control-sm" id="phone" value="{{ $user->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-control-sm mb-0">{{ __('EMAIL ADDRESS') }}:</label>
                            <input name="email" type="email" class="form-control form-control-sm" id="email" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group text-center">
                            <label for="email">Click on the image below to update Profile Picture</label>
                        </div>
                        <div class="form-group text-center">
                            <label for="exampleFormControlFile1"><img src="/uploads/avatars/{{$user->avatar}}" id="wapp-img" class="img-fluid rounded-circle"</label>
                            
                        </div><input name="avatar" type="file" value="{{$user->avatar}}" class="invisible" id="avatar">
                    </div>
                    </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection