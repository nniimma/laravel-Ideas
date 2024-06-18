<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('ideas.index') ? 'text-white bg-primary round' : '' }}"
                    href="{{ route('ideas.index') }}">
                    <span>Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary round' : '' }}"
                    href="{{ route('terms') }}">
                    <span>Terms</span></a>
            </li>
        </ul>
    </div>
    @auth
        <div class="card-footer text-center py-2 ">
            <a class="btn btn-link btn-sm {{ Route::is('users.show') ? 'text-white bg-primary round w-100' : '' }}"
                href="{{ route('users.show', Auth::id()) }}">View Profile </a>
        </div>
    @endauth
</div>
