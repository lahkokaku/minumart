<x-admin title="{{ 'Edit Outlet: ' . $outlet->id }}">
    <div class="container mt-5 py-5">
        <div class="mb-3">
            <x-back-button link=""></x-back-button>
        </div>
        <x-card>
            <h3 class="text-uppercase fw-bold text-blue-4 mb-4" style="letter-spacing: 0.1em">Edit Outlet: {{ $outlet->id }}</h3>
            <form action="{{ route('outlets.update', $outlet->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Outlet Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter outlet's name" name="name"
                        id="name" value="{{ $outlet->name }}" required>
                    @error('name')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="col-form-label">Address <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter outlet's address" name="address"
                        id="address" value="{{ $outlet->address }}" required>
                    @error('address')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="open_time" class="col-form-label">Open Time <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="open_time" id="open_time" value="{{ $outlet->open_time }}"
                        placeholder="HH:MM" required>
                    @error('open_time')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="closed_time" class="col-form-label">Closed Time <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="closed_time" id="closed_time" value="{{ $outlet->closed_time }}"
                        placeholder="HH:MM" required>
                    @error('closed_time')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="photo" class="col-form-label">Photo <span class="text-danger"></span></label>
                    <div class="row">
                        <input type="file" class="form-control col" name="photo" id="photo"
                            accept="image/png,image/jpeg,image/jpg">
                        <a href="{{ env('APP_URL') . '/storage/outlet_photo/' . $outlet->photo }}" target="_blank" class="col-2"><div class="btn btn-blue-3 w-100">Old Picture</div></a>
                    </div>
                    <small class="text-danger" style="font-size: 0.7em">Type : PNG, JPEG, JPG | Max : 2MB</small><br>
                    @error('photo')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <a href="{{ route("outlets.manage") }}" class="btn btn-outline-dark w-100 rounded-pill">Back</a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn w-100 rounded-pill btn-outline-primary">Submit</button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</x-admin>
