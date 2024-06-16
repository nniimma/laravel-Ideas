@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('includes.left-sidebar')
        </div>
        <div class="col-6">
            @include('includes.success-message')
            @include('includes.error-message')
            <div class="mt-3">
                @include('users.includes.user-card')
            </div>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.includes.idea-card')
                </div>
            @empty
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <img width="250" src="{{ URL::asset('img/layout/noResult.png') }}" alt="">
                    <p class="">No results found...</p>
                </div>
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('includes.search-bar')
            @include('includes.follow-box')
        </div>
    </div>
@endsection
