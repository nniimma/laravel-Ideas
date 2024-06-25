<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('ideas.index') ? 'text-white bg-primary round' : '' }}"
                    href="{{ route('ideas.index') }}">
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary round' : '' }}"
                    href="{{ route('feed') }}">
                    <span>Feed</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary round' : '' }}"
                    href="{{ route('terms') }}">
                    <span>Terms & Conditions</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-footer py-2 d-flex flex-column ">
        <a class="mb-2 text-decoration-none" href="{{ route('lang', 'en') }}">
            <img class="me-3" width="30" class="mr-5" src="{{ URL::asset('img/flags/USA-flag.png') }}"
                alt="USA-flag">
            English
        </a>
        <a class="mb-2 text-decoration-none" href="{{ route('lang', 'pt') }}">
            <img class="me-3" width="30" class="mr-5" src="{{ URL::asset('img/flags/Brazil-flag.png') }}"
                alt="Brazil-flag">
            Portoguês
        </a>
        <a class="mb-2 text-decoration-none" href="{{ route('lang', 'fa') }}">
            <img class="me-3" width="30" class="mr-5" src="{{ URL::asset('img/flags/Iran-flag.png') }}"
                alt="Iran-flag">
            فارسی
        </a>
        <a class="mb-2 text-decoration-none" href="{{ route('lang', 'de') }}">
            <img class="me-3" width="30" class="mr-5" src="{{ URL::asset('img/flags/Germany-flag.png') }}"
                alt="Germany-flag">
            Deutch
        </a>
        <a class="mb-2 text-decoration-none" href="{{ route('lang', 'tr') }}">
            <img class="me-3" width="30" class="mr-5" src="{{ URL::asset('img/flags/Turkey-flag.png') }}"
                alt="Turkey-flag">
            Türkçe
        </a>
    </div>
</div>
