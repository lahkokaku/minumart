<x-admin title="Create Beverage Type">
    <div class="container mt-5 py-5">
        <div class="mb-3">
            <x-back-button link="{{ route('beverage-types.index') }}"></x-back-button>
        </div>
        <x-card>
            <h3 class="text-uppercase fw-bold text-blue-4 mb-4" style="letter-spacing: 0.1em">Create New
                Beverage Type</h3>
            <form action="{{ route('beverage-types.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Beverage Type Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter Beverage Type name" name="name"
                        id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col"><button type="submit"
                            class="btn w-100 rounded-pill btn-blue-3-outline">Submit</button></div>
                </div>
            </form>
        </x-card>
    </div>
</x-admin>
