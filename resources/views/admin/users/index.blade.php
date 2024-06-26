@extends('layout.layout')
@section('title', 'User Administration')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('admin.includes.left-sidebar')
        </div>
        <div class="col-9">
            @include('includes.success-message')
            @include('includes.error-message')
            <h1>Users</h1>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined At</th>
                        <th>Role</th>
                        <th>View User</th>
                        <th>Edit User</th>
                        <th>Delete User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td>
                                @if ($user->is_admin == 1)
                                    <form action="{{ route('admin.users.updateToUser', $user->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn p-0 border-0 bg-transparent">
                                            <input class="me-2" type="checkbox" name="" id="{{ 'admin' . $user->id }}"
                                                checked>
                                            <label for="{{ 'admin' . $user->id }}">Admin</label>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.users.updateToAdmin', $user->id) }}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn p-0 border-0 bg-transparent">
                                            <input class="me-2" type="checkbox" name=""
                                                id="{{ 'user' . $user->id }}">
                                            <label for="{{ 'user' . $user->id }}">User</label>
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}">View</a>
                            </td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.users.delete', $user->id) }}" method="post">
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
