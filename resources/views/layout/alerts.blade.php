{{-- Success Alert --}}
@if (session('success'))
    <div class="alert alert-success border-0 bg-success-lighter alert-dismissible fade show w-50 mx-auto text-center">
        <div class="d-flex align-items-center justify-content-center">
            {{-- <i class="bi bi-check-circle me-2 fs-4 text-success"></i> <!-- Optional icon for clarity --> --}}
            <span class="text-success">{{ session('success') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Error Alert --}}
@if (session('error'))
    <div class="alert alert-warning border-0 bg-warning-lighter alert-dismissible fade show w-50 mx-auto text-center">
        <div class="d-flex align-items-center justify-content-center">
            {{-- <i class="bi bi-exclamation-triangle me-2 fs-4 text-warning"></i> <!-- Optional icon --> --}}
            <span class="text-warning">{{ session('error') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Failure Alert --}}
@if (session('fail'))
    <div class="alert alert-danger border-0 bg-danger-lighter alert-dismissible fade show w-50 mx-auto text-center">
        <div class="d-flex align-items-center justify-content-center">
            {{-- <i class="bi bi-x-circle me-2 fs-4 text-danger"></i> <!-- Optional icon --> --}}
            <span class="text-danger">{{ session('fail') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger border-0 bg-danger-lighter alert-dismissible fade show w-50 mx-auto text-start">
        <ul class="list-unstyled mb-0">
            @foreach ($errors->all() as $error)
                <li style="margin-top: 0;"><i class="me-2 fs-5 text-danger"></i>{{ $error }}</li> <!-- Optional icon -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endforeach
        </ul>
    </div>
@endif
