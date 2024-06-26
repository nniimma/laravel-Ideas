@extends('layout.layout')
@section('title', 'Comments Administration')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.includes.left-sidebar')
        </div>
        <div class="col-9">
            @include('includes.success-message')
            @include('includes.error-message')
            <h1>comments</h1>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Owner</th>
                        <th>Idea</th>
                        <th>Content</th>
                        <th>Created At</th>
                        <th>Delete Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
                            </td>
                            <td>
                                <a href="{{ route('ideas.show', $comment->idea->id) }}">{{ $comment->idea->id }}</a>
                            </td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td>
                                <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="post">
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
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
