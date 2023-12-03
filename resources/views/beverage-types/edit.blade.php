<x-admin title="{{ 'Edit Beverage Type: ' . $beverageType->id }}">
    <div class="container mt-5 py-5">
        <div class="mb-3">
            <x-back-button link="{{ route('beverage-types.index') }}"></x-back-button>
        </div>
        <x-card>
            <h3 class="text-uppercase fw-bold text-blue-4 mb-4" style="letter-spacing: 0.1em">Edit Beverage Type: {{ $beverageType->id }}</h3>
            <form action="{{ route("beverage-types.update", $beverageType->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Beverage Type Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter Beverage Type name" name="name" id="name" value="{{ $beverageType->name }}" required>
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
