@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Dashboard</h4>
            </div>
            
            <div class="card-body">
                <div class="alert alert-success">
                    <h5>Selamat datang, <strong>{{ Auth::user()->name }}</strong>!</h5>
                    <p>Email: {{ Auth::user()->email }}</p>
                </div>
                
                <p>Kamu berhasil login! 🎉</p>
                <p>Ini adalah halaman dashboard yang hanya bisa diakses oleh user yang sudah login.</p>
            </div>
        </div>
    </div>
</div>
@endsection