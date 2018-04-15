@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white"><strong>User Dashboard</strong><br>
                    You are logged in as: {{$user->name}}

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form enctype="multipart/form-data" method="POST" action="{{ route('home') }}">
                        @csrf
                        <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                            <label for="company">{{ __('COMPANY NAME') }}:</label>
                            <input id="company" type="text" class="form-control" name="company" value="{{ $user->company }}" autofocus>
                        </div> 

                        <div class="form-group">
                            <label for="name">{{ __('FIRST NAME') }}:</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="surname">{{ __('LAST NAME') }}:</label>
                            <input name="surname" type="text" class="form-control" id="surname" value="{{ $user->surname }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">{{ __('MOBILE NUMBER') }}:</label>
                            <input name="phone" type="tel" class="form-control" id="phone" value="{{ $user->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('EMAIL ADDRESS') }}:</label>
                            <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"><img src="/uploads/avatars/default.png" id="wapp-img" class="img-fluid" style="border-radius:50%;"></label>
                            {{$user->avatar}}
                        </div><input name="avatar" type="file" class="invisible" id="avatar">
                    </div>
                    </div>

                        <button type="submit" class=" text-center btn btn-primary">Submit</button>
                    </form> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection