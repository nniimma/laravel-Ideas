@extends('layout.layout')
@section('title', $idea->user->name)
@section('content')
    <div class="row">
        <div class="col-3">
            @include('includes.left-sidebar')
        </div>
        <div class="col-6">
            @include('includes.success-message')
            @include('includes.error-message')
            <div class="mt-3">
                @include('ideas.includes.idea-card')
            </div>
            <div class="mt-3">
            </div>
        </div>
        <div class="col-3">
            @include('includes.search-bar')
            @include('includes.follow-box')
        </div>
    </div>
@endsection
