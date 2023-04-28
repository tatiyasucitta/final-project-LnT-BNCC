@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ __('Dashboard') }}

                <div class="card-body">
                    @if(session('status'))
                        <div class="alertalert-success" role="alert">
                            {{session('status')}}
                        </div>
                    @endif

                    {{ __("You're logged in!") }}
                    
                </div>
                <a href="{{route('home')}}">Admin's Homepage</a>
            </div>
        </div>
    </div>
</div>
@endsection