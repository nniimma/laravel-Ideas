@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" x-data='{show: true}'
        x-init="setTimeout(() => show = false, 2000)" x-show="show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
