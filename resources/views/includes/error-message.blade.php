@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" x-data='{show: true}' x-init="setTimeout(() => show = false, 2000)"
        x-show="show">
        <span>{{ $errors->first() }}</span>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" x-data='{show: true}' x-init="setTimeout(() => show = false, 4000)"
        x-show="show">
        <span>{{ session('error') }}</span>
    </div>
@endif
