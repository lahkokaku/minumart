<x-admin title="{{ 'Edit Beverage: ' . $beverage->id }}">
    <div class="container mt-5 py-5">
        <div class="mb-3">
            <x-back-button link="{{ route('beverages.index') }}"></x-back-button>
        </div>
        <x-card>
            <h3 class="text-uppercase fw-bold display-6 text-gradient mb-4" style="letter-spacing: 0.1em">Edit Beverage: {{ $beverage->id }}</h3>
            <form action="{{ route('beverages.update', $beverage->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="beverage_type_id" class="col-form-label">Beverage Type <span
                            class="text-danger">*</span></label>
                    <select name="beverage_type_id" class="form-select" id="">
                        <option value="" disabled selected>{{ __('Choose...') }}</option>
                        @foreach ($beverageTypes as $beverageType)
                            <option value="{{ $beverageType->id }}" {{ $beverage->beverage_type_id == $beverageType->id ? 'selected' : '' }}>{{ $beverageType->name }}</option>
                        @endforeach
                    </select>
                    @error('beverage_type_id')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="outlet_id" class="col-form-label">Outlet <span class="text-danger">*</span></label>
                    <select name="outlet_id" class="form-select" id="">
                        <option value="" disabled selected>{{ __('Choose...') }}</option>
                        @foreach ($outlets as $outlet)
                            <option value="{{ $outlet->id }}" {{ $beverage->outlet_id == $outlet->id ? 'selected' : '' }}>{{ $outlet->name }}</option>
                        @endforeach
                    </select>
                    @error('outlet_id')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name" class="col-form-label">Beverage Name <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter beverage's name" name="name"
                        id="name" value="{{ $beverage->name }}" required>
                    @error('name')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="col-form-label">Price (IDR) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $beverage->price }}"
                        placeholder="Beverage Placeholder" required>
                    @error('price')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="quantity" class="col-form-label">Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="quantity" id="quantity"
                        value="{{ $beverage->quantity }}" placeholder="Beverage Quantity" required>
                    @error('quantity')
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
                        <a href="{{ env('APP_URL') . '/storage/beverage_photo/' . $beverage->photo }}" target="_blank" class="col-2"><div class="btn btn-blue-3 w-100">Old Picture</div></a>
                    </div>
                    <small class="text-danger" style="font-size: 0.7em">Type : PNG, JPEG, JPG | Max : 2MB</small><br>
                    @error('photo')
                        <span class="invalid feedback text-danger"role="alert">
                            <small>*{!! $message !!}.</small>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col"><a href="{{ route('beverages.index') }}"
                            class="btn btn-outline-dark w-100 rounded-pill">Back</a></div>
                    <div class="col"><button type="submit"
                            class="btn w-100 rounded-pill btn-outline-primary">Submit</button></div>
                </div>
            </form>
        </x-card>
    </div>
</x-admin>
