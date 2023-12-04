<x-admin title="{{ 'Order: ' . $transactionHeader->id . ' - Detail' }}">
    <section class="container py-5 mt-5">
        <div class="mb-3">
            <x-back-button link="{{ route('transactions.manage') }}"></x-back-button>
        </div>
        <x-card>
            <h3 class="text-uppercase fw-bold mb-4" style="letter-spacing: 0.1em"><span class="text-gr-b3-b4">Transaction Header: {{ $transactionHeader->id }}</span></h3>
            <div class="alert alert-primary">
                <div>Customer Data:</div>
                <hr>
                <div class="fs-6">Customer ID: <span class="fw-bold">{{ $transactionHeader->user->id }}</span></div>
                <div class="fs-6">Customer Name: <span class="fw-bold">{{ $transactionHeader->user->name }}</span></div>
                <div class="fs-6">Customer Email: <span class="fw-bold">{{ $transactionHeader->user->email }}</span></div>
                <div class="fs-6">Customer Phone Number: <span class="fw-bold">{{ $transactionHeader->user->phone_number }}</span></div>
                <div class="fs-6">Customer Account Name: <span class="fw-bold">{{ $transactionHeader->account_name }}</span></div>
                <div class="fs-6">Customer Account Number: <span class="fw-bold">{{ $transactionHeader->account_number }}</span></div>
            </div>
            <div>Order Issued On: <span class="fw-bold">{{ $transactionHeader->transaction_date }}</span></div>
            <a href="{{ env('APP_URL') . '/storage/payment_proof/' . $transactionHeader->payment_proof }}" target="_blank">
                <button class="btn btn-blue-3 btn-sm" title="View Payment Proof">
                    View Payment Proof
                </button>
            </a>
            @if ($transactionHeader->picked_time)
                <div>Picked Up On: {{ $transactionHeader->picked_time }}</div>
            @endif
            <div>
                <div class="fw-bold fs-5">
                    <span class="">Status: </span>
                    <span class="{{ $color }}">{{ $message }}</span>
                </div>
                <form class="fw-bold fs-5" method="POST" enctype="multipart/form-data" action="{{ route('transactions.update-status-admin', $transactionHeader->id) }}">
                    @csrf
                    @method('PUT')
                    <label for="status">Update Status: </label>
                    <div class="d-flex flex-row gap-2">
                        <select value="" name="status" class="form-select w-25">
                            <option value="" disabled>Choose...</option>
                            <option value="1" {{ $transactionHeader->status == "1" ? 'selected' : '' }}>Pending</option>
                            <option value="2" {{ $transactionHeader->status == "2" ? 'selected' : '' }}>Making</option>
                            <option value="3" {{ $transactionHeader->status == "3" ? 'selected' : '' }}>Ready for Pick Up</option>
                            <option value="4" {{ $transactionHeader->status == "4" ? 'selected' : '' }}>Finished</option>
                        </select>
                        <button class="btn btn-blue-3" type="submit">Update</button>
                    </div>
                </form>
                <div class="fs-3">
                    <span>Grand Total: </span>
                    <span class="fw-bold">{{ 'Rp. ' . number_format($transactionHeader->total_price) }}</span>
                </div>
            </div>
            <hr>
            @if ($transactionHeader->count())
            <div class="table-responsive py-2">
                <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Beverage</th>
                        <th scope="col">Outlet</th>
                        <th scope="col">Price per Unit</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($transactionHeader->transactionDetail as $transactionDetail)
                        <tr>
                            <th>{{$transactionDetail->id}}</th>
                            <th>{{$transactionDetail->beverage->name}}</th>
                            <td>{{$transactionDetail->beverage->outlet->name}}</td>
                            <td>{{'Rp. ' . number_format($transactionDetail->beverage->price)}}</td>
                            <td>{{$transactionDetail->quantity}}</td>
                            <td>{{'Rp. ' . number_format($transactionDetail->total_price)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
              @else <hr> <p class="text-center"> No Data</p>
            @endif    
        </x-card>
    </section>
</x-admin>