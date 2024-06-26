@foreach ($datas as $data)
    <div class="col-sm-6 col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h6>
                    <span class="{{ $data['icon'] ?? '' }}"></span>
                    <span class="{{ isset($data['title']) ? '' : 'text-danger' }}">
                        {{ $data['title'] ?? 'Title is not set' }}
                    </span>
                </h6>
                <p class="fw-bold fs-2 {{ isset($data['no']) ? '' : 'text-danger' }}">
                    {{ $data['no'] ?? 'Number is not set' }}</p>
            </div>
        </div>
    </div>
@endforeach
