@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Selamat Datang</h4>
            </div>
            
            <div class="card-body text-center">
                <h3>Aplikasi dengan Authentication Manual</h3>
                <p class="lead mt-3">
                    Ini adalah contoh authentication dari nol tanpa Breeze/Jetstream.
                </p>
                
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Ke Dashboard</a>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection