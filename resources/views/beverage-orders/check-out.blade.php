<x-user title="Check Out">
    <div class="container my-5 py-5">
        <div class="row px-4">
            <div class="col-md-12">
                <div class="mt-3">
                    <x-back-button link=""></x-back-button>
                </div>
            </div>
        </div>
        <div class="row bg-dark-blue px-4 py-4 rounded">
            <div class="col-md-12">
                <x-card>
                    <h1 class="fw-bold m-0 text-gr-b3-b4"> Your Order</h1>
                    <hr class="border border-1 border-dark">
                    @for ($i = 0; $i < count($id); $i++)
                        @php
                            $beverage = $beverages->where("id", $id[$i])->first() 
                        @endphp
                         
                        <div class="w-100 rounded mb-4 row p-2 py-3 justify-content-between align-items-center">
                            <div class="col-md-6 d-flex justify-content-center">
                                <img src="/storage/beverage_photo/{{ $beverage->photo }}"alt="" class="beverage__thumb rounded shadow">
                            </div>
                            <div class="col-md-6">
                                <h5 class="fw-bold"> {{$beverage->name}}</h5>
                                <div class="d-flex justify-content-between mt-1">
                                    <div>Price</div>
                                    <div>Rp. {{number_format($beverage->price)}}</div>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <div>Quantity</div>
                                    <div> {{$quantity[$i]}}</div>
                                </div>

                                <div class="d-flex justify-content-between mt-1">
                                    <div>Beverage Type</div>
                                    <div>{{$beverage->beverageType->name}}</div>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <div>Outlet</div>
                                    <div>{{$beverage->outlet->name}}</div>
                                </div>
                                <div class="d-flex justify-content-between mt-1">
                                    <div>Total</div>
                                    <div>Rp. {{number_format($beverage->price * $quantity[$i])}}</div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <hr class="border border-1 border-dark mt-0 mb-3" >
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-gr-b3-b4"> Grand Total</h2>
                        <h1 class="fw-bold"> Rp. {{ number_format($grandTotal) }}</h1>
                    </div>
                </x-card>
            </div>

            <div class="col-md-12">
                <x-card>
                    <form action="{{ route('beverage-orders.checkout') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('POST')
                        <input type="text" hidden name="beverage_id" value="{{implode(",",$id)}}">
                        <input type="text" hidden name="outlet_id" value="{{$outlet->id}}">
                        <input type="text" hidden name="quantity" value="{{implode(",",$quantity)}}">
                        <input type="text" hidden name="grand_total" value="{{$grandTotal   }}">
                        
                        <h3>Payment Submission</h3>
                        <div class="alert alert-primary mt-3">
                            <div>Please transfer the Grand Total Amount to the following number:</div>
                            <h4>542799841 (BCA)</h4>
                            <div>Account Name: <span class="fw-bold">MINUMART</span></div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="account_name" class="form-label">{{ __('Account Name') }}<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="account_name" value="{{ old('account_name') }}" placeholder="Your Account Name" required>
                            @error('account_name')
                                <span class="invalid feedback text-danger" role="alert">
                                    <small>*{!! $message !!}.</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="account_number" class="form-label">{{ __('Account Number') }}<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="account_number" value="{{ old('account_number') }}" placeholder="Your Account Number" required>
                            @error('account_number')
                                <span class="invalid feedback text-danger" role="alert">
                                    <small>*{!! $message !!}.</small>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="payment_provider_id" class="form-label">{{ __('Payment Provider') }}<span class="text-danger"> *</span></label>
                            <select name="payment_provider_id" class="form-select" id="payment_provider_id" required>
                                <option value="" disabled selected>Choose...</option>
                                <optgroup label="E-Wallet">
                                @foreach ($paymentProviders as $paymentProvider)
                                    @if ($paymentProvider->type == 'E-Wallet')
                                    <option value="{{ $paymentProvider->id }}" {{ $paymentProvider->id == old('payment_provider_id') ? 'selected' : '' }}>{{ $paymentProvider->name }}</option>
                                    @endif
                                @endforeach
                                </optgroup>
                                <optgroup label="Bank">
                                @foreach ($paymentProviders as $paymentProvider)
                                    @if ($paymentProvider->type == 'Bank')
                                    <option value="{{ $paymentProvider->id }}" {{ $paymentProvider->id == old('payment_provider_id') ? 'selected' : '' }}>{{ $paymentProvider->name }}</option>
                                    @endif
                                @endforeach
                                </optgroup>
                            </select>
                            @error('payment_provider_id')
                                <span class="invalid feedback text-danger"role="alert">
                                    <small>*{!! $message !!}.</small>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="payment_proof" class="col-form-label">Payment Proof <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="payment_proof" id="payment_proof"
                                accept="image/png,image/jpeg,image/jpg" required>
                            <small class="text-danger" style="font-size: 0.7em">Type : PNG, JPEG, JPG | Max : 2MB</small><br>
                            @error('payment_proof')
                                <span class="invalid feedback text-danger"role="alert">
                                    <small>*{!! $message !!}.</small>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn text-white w-100 btn-blue-3 mt-3">
                            Submit
                        </button>
                
                    </form>
                </x-card>
            </div>
        </div>
    </div>
</x-layout>
