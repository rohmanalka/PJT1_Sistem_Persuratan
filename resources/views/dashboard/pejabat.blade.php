@extends('components.layout.app')

@section('title', 'Dashboard Pejabat')
@section('page-title', 'Dashboard')

@section('content')
    <h2 class="text-xl font-bold mb-4">
        Selamat datang, {{ auth()->user()->name }}
    </h2>
@endsection
