<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Top Users</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="d-flex justify-content-between">
                <div class="hstack gap-2 mb-3">
                    <div class="avatar">
                        <a href="{{ route('users.show', $user->id) }}"><img width="50"
                                class="avatar-img rounded-circle" src="{{ $user->getImageURL() }}"
                                alt="{{ $user->name }}"></a>
                    </div>
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        <p class="mb-0 small text-truncate text-light">{{ $user->email }}</p>
                    </div>
                </div>
                @auth
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            @if (Auth::user()->follows($user))
                                <form action="{{ route('users.unfollow', $user->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Unfollow</button>
                                </form>
                            @else
                                <form action="{{ route('users.follow', $user->id) }}" method="post">
                                    @csrf
                                    <button class="btn btn-primary btn-sm">Follow</button>
                                </form>
                            @endif
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
</div>
