<x-admin title="Create Payment Provider">
    <div class="container mt-5 py-5">
        <div class="mb-3">
            <x-back-button link="{{ route('payment-providers.index') }}"></x-back-button>
        </div>
        <x-card>
            <h3 class="text-uppercase fw-bold text-blue-4 mb-4" style="letter-spacing: 0.1em">Create New
                Payment Provider</h3>
            <form action="{{ route('payment-providers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Payment Provider Type <span
                            class="text-danger">*</span></label>
                    <select class="form-select" placeholder="Enter Payment Provider name" name="type" id="type" required>
                        <option value="" disabled selected>Choose...</option>
                        <option value="Bank" {{ old('type') == 'Bank' ? 'selected' : '' }}>Bank</option>
                        <option value="E-Wallet" {{ old('type') == 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
                    </select>
                    @error('type')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Payment Provider Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter Payment Provider name" name="name"
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
