@extends('layout.layout')
@section('title', 'Ideas Administration')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.includes.left-sidebar')
        </div>
        <div class="col-9">
            @include('includes.success-message')
            @include('includes.error-message')
            <h1>Ideas</h1>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>View User</th>
                        <th>Edit User</th>
                        <th>Delete User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $idea->user->id) }}">{{ $idea->user->name }}</a>
                            </td>
                            <td>{{ $idea->content }}</td>
                            <td>{{ $idea->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                            </td>
                            <td>
                                <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.ideas.destroy', $idea->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
@endsection
