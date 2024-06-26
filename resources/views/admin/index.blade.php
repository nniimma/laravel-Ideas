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
            <h1>Admin Dashboard</h1>

            <div class="row">
                @include('admin.includes.widget', [
                    'datas' => [
                        [
                            'title' => 'Total Users',
                            'icon' => 'fas fa-users me-1',
                            'no' => $totalUsers,
                        ],
                        [
                            'title' => 'Total Ideas',
                            'icon' => 'fas fa-lightbulb me-1',
                            'no' => $totalIdeas,
                        ],
                        [
                            'title' => 'Total Comments',
                            'icon' => 'fas fa-comments me-1',
                            'no' => $totalComments,
                        ],
                    ],
                ])
            </div>
        </div>
    </div>
@endsection
