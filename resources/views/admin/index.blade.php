@extends('layout.layout')
@section('title', 'Admin Page')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.includes.left-sidebar')
        </div>
        <div class="col-9">
            @include('includes.success-message')
            @include('includes.error-message')
            admin
        </div>
    </div>
@endsection
