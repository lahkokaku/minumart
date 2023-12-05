<x-user title="User Dashboard">

    <div class="container my-5 pt-5">
        <h2 class="mt-3 fw-light" style="font-family: 'Roboto">Welcome Back, <span class="text-gr-b3-b4 fw-bold fs-2" style="font-family: 'Lexend';">{{ Auth::guard('web')->user()->name }}</span> 👋</h2>
        @if ($transactionHeader)
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs d-flex align-items-center border border-0 w-100 justify-content-center"
                    id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="step {{ $transactionHeader->status == 1 ? 'active' : 'disabled' }}" id="home-tab"
                            data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab"
                            aria-controls="home" aria-selected="true">1</button>
                    </li>
                    <hr class="connector ">
                    <li class="nav-item">
                        <button class="step {{ $transactionHeader->status == 2 ? 'active' : 'disabled' }}"
                            id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                            role="tab" aria-controls="profile" aria-selected="false"> 2 </button>
                    </li>
                    <hr class="connector ">
                    <li class="nav-item">
                        <button class="step    {{ $transactionHeader->status == 3 ? 'active' : 'disabled' }}"
                            id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                            role="tab"> 3
                        </button>
                    </li>
                    <hr class="connector ">

                    <li class="nav-item">
                        <button class="step {{ $transactionHeader->status == 4 ? 'active' : 'disabled' }}"
                            id="contact-tab" data-bs-toggle="tab" data-bs-target="#step-4" type="button"
                            role="tab"> 4 </button>
                    </li>

                </ul>
            </div>


            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade  {{ $transactionHeader->status == 1 ? 'active show' : '' }} " id="home"
                    role="tabpanel" aria-labelledby="home-tab">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-12 col-md-8 text-center">
                            <x-card>
                                <img src="/storage/assets/pending.webp" class="img-fluid w-50 " alt="">
                                <h3 class="fw-bold"> Confirming Your Payment </h3>
                                <p> Please Wait our staff to confirm your payment </p>
                            </x-card>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade {{ $transactionHeader->status == 2 ? 'active show' : '' }}" id="profile"
                    role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-12 col-md-8 text-center">
                            <x-card>
                                <img src="/storage/assets/making_order.webp" class="img-fluid w-50  "
                                    alt="making_order">
                                <h3 class="fw-bold"> Getting Ready Your Order </h3>
                                <p> Please Wait to our bartender to getting your order up </p>
                            </x-card>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade {{ $transactionHeader->status == 3 ? 'active show' : '' }}" id="contact"
                    role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-12 col-md-8 text-center">
                            <x-card>

                                {!! QrCode::size(250)->generate('https://techvblogs.com/blog/generate-qr-code-laravel-8') !!}
                                <h3 class="fw-bold mt-3"> Your Order is Ready</h3>
                                <p> Please pick up your order and give the qr code above to our staff </p>
                            </x-card>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade {{ $transactionHeader->status == 4 ? 'active show' : '' }}" id="step-4"
                    role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mt-4 justify-content-center">
                        <div class="col-12 col-md-8 text-center">
                            <x-card>
                                <img src="/storage/assets/order-confirmed.png" class="img-fluid w-50 h-50"
                                    alt="making_order">
                                <h3 class="fw-bold text-capitalize"> Your order has been picked up. Enjoy your order
                                </h3>
                                <a href="{{ route('outlets.index') }}">
                                    <button class="btn btn-blue-3 w-100 mt-4 rounded-pill"> Order Again </button>
                                </a>
                            </x-card>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <x-card>
                            <h1 class="fw-bold m-0 "> Your Order Detail</h1>
                            <hr class="border border-1 border-dark">
                            @foreach ($transactionHeader->transactionDetail as $transactionDetail)
                                @php
                                    $beverage = $transactionDetail->beverage;
                                @endphp
                                <div
                                    class=" w-100 rounded mb-4 bg-white row p-2 py-3 mx-auto justify-content-between align-items-center ">
                                    <div class="col-6">
                                        <img src="/storage/beverage_photo/{{ $beverage->photo }}"alt=""
                                            class="img-fluid rounded shadow">
                                    </div>
                                    <div class="col-6">
                                        <h5 class="fw-bold"> {{ $beverage->name }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <p>Price</p>
                                            <p>Rp. {{ number_format($beverage->price) }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p>Quantity</p>
                                            <p> {{ $transactionDetail->quantity }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p>Beverage Type</p>
                                            <p>{{ $beverage->beverageType->name }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p>Outlet</p>
                                            <p>{{ $beverage->outlet->name }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p>Total</p>
                                            <p>Rp. {{ number_format($beverage->price * $transactionDetail->quantity) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </x-card>
                    </div>
                </div>

            </div>
        @else
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img src="/storage/assets/order.webp" alt="order" class="img-fluid w-100">
                </div>
                <h1 class="text-center"> You have no order yet <a href="{{route('outlets.index')}}"> Start Order</a> </h1>

            </div>
        @endif
    </div>
</x-user>
