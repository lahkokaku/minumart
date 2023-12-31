<x-admin title="Manage Orders">
    <section class="container py-5 mt-5">
        {{-- Pending --}}
        <x-card>
            <h3 class="text-uppercase fw-bold mb-4" style="letter-spacing: 0.1em"><span class="text-gr-b3-b4">Pending Order</span> ⌛</h3>
            @if ($pendingTransactions->count())
            <div class="table-responsive py-2">
                <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Outlet</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Issued On</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($pendingTransactions as $pendingTransaction)
                        <tr>
                            <th>{{$pendingTransaction->id}}</th>
                            <th>{{$pendingTransaction->user->name}}</th>
                            <td>{{$pendingTransaction->account_name}}</td>
                            <th>{{$pendingTransaction->account_number}}</th>
                            <td>{{$pendingTransaction->transactionDetail[0]->beverage->outlet->name}}</td>
                            <td>{{'Rp. ' . number_format($pendingTransaction->total_price)}}</td>
                            <td>{{$pendingTransaction->transaction_date}}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ env('APP_URL') . '/storage/payment_proof/' . $pendingTransaction->payment_proof }}" target="_blank">
                                    <button class="btn btn-primary rounded btn-sm" title="View Payment Proof">
                                        <i class="fa-solid fa-receipt"></i>
                                    </button>
                                </a>
                                <a href="{{ route('transactions.detail', $pendingTransaction) }}" rel="noopener noreferrer">
                                    <button class="btn btn-dark rounded btn-sm" title="View Details">
                                        <i class="fa-solid fa-list"></i>
                                    </button>
                                </a>
                                <form  action={{ route('transactions.update-status-admin', $pendingTransaction->id) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="2" id="" hidden>
                                    <button class="btn btn-success rounded btn-sm" title="Set status to Making" id ="making" type="submit">
                                        <i class="fa-solid fa-blender"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
              @else <hr> <p class="text-center"> No Data</p>
            @endif    
        </x-card>
        {{-- On Making --}}
        <x-card>
            <h3 class="text-uppercase fw-bold mb-4" style="letter-spacing: 0.1em"><span class="text-gr-b3-b4">On Making Order</span> 🧑‍🍳</h3>
            @if ($makingTransactions->count())
            <div class="table-responsive py-2">
                <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Outlet</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Issued On</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($makingTransactions as $makingTransaction)
                        <tr>
                            <th>{{$makingTransaction->id}}</th>
                            <th>{{$makingTransaction->user->name}}</th>
                            <td>{{$makingTransaction->account_name}}</td>
                            <th>{{$makingTransaction->account_number}}</th>
                            <td>{{$makingTransaction->transactionDetail[0]->beverage->outlet->name}}</td>
                            <td>{{'Rp. ' . number_format($makingTransaction->total_price)}}</td>
                            <td>{{$makingTransaction->transaction_date}}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ env('APP_URL') . '/storage/payment_proof/' . $makingTransaction->payment_proof }}" target="_blank">
                                    <button class="btn btn-primary rounded btn-sm" title="View Payment Proof">
                                        <i class="fa-solid fa-receipt"></i>
                                    </button>
                                </a>
                                <a href="{{ route('transactions.detail', $makingTransaction) }}" rel="noopener noreferrer">
                                    <button class="btn btn-dark rounded btn-sm" title="View Details">
                                        <i class="fa-solid fa-list"></i>
                                    </button>
                                </a>
                                <form  action={{ route('transactions.update-status-admin', $makingTransaction->id) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="3" id="" hidden>
                                    <button class="btn btn-success rounded btn-sm" title="Set status to Ready for Pick Up" id ="ready" type="submit">
                                        <i class="fa-solid fa-bottle-water"></i>
                                    </button>
                                </form>
                                <form action={{ route('transactions.update-status-admin', $makingTransaction->id) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="1" id="" hidden>
                                    <button class="btn btn-warning rounded btn-sm" title="Set status to Pending" id="pending" type="submit">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
              @else <hr> <p class="text-center"> No Data</p>
            @endif    
        </x-card>
        {{-- Ready to Pick Up --}}
        <x-card>
            <h3 class="text-uppercase fw-bold mb-4" style="letter-spacing: 0.1em"><span class="text-gr-b3-b4">Ready for Pick Up</span> 🚶</h3>
            @if ($readyTransactions->count())
            <div class="table-responsive py-2">
                <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Account Name</th>
                        <th scope="col">Account Number</th>
                        <th scope="col">Outlet</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Issued On</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($readyTransactions as $readyTransaction)
                        <tr>
                            <th>{{$readyTransaction->id}}</th>
                            <th>{{$readyTransaction->user->name}}</th>
                            <td>{{$readyTransaction->account_name}}</td>
                            <th>{{$readyTransaction->account_number}}</th>
                            <td>{{$readyTransaction->transactionDetail[0]->beverage->outlet->name}}</td>
                            <td>{{'Rp. ' . number_format($readyTransaction->total_price)}}</td>
                            <td>{{$readyTransaction->transaction_date}}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ env('APP_URL') . '/storage/payment_proof/' . $readyTransaction->payment_proof }}" target="_blank">
                                    <button class="btn btn-primary rounded btn-sm" title="View Payment Proof">
                                        <i class="fa-solid fa-receipt"></i>
                                    </button>
                                </a>
                                <a href="{{ route('transactions.detail', $readyTransaction) }}" rel="noopener noreferrer">
                                    <button class="btn btn-dark rounded btn-sm" title="View Details">
                                        <i class="fa-solid fa-list"></i>
                                    </button>
                                </a>
                                <form  action={{ route('transactions.update-status-admin', $readyTransaction->id) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="4" id="" hidden>
                                    <button class="btn btn-success rounded btn-sm" title="Set status to Finished" id ="finish" type="submit">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                                <form action={{ route('transactions.update-status-admin', $readyTransaction->id) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="2" id="" hidden>
                                    <button class="btn btn-warning rounded btn-sm" title="Set status to On Making" id ="making" type="submit">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else <hr> <p class="text-center"> No Data</p>
        @endif    
    </x-card>
    {{-- Finished --}}
    <x-card>
        <h3 class="text-uppercase fw-bold mb-4" style="letter-spacing: 0.1em"><span class="text-gr-b3-b4">Finished Order</span> 🎉</h3>
        @if ($finishTransactions->count())
        <div class="table-responsive py-2">
            <table class="table table-striped table-bordered" id="dataTables">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Outlet</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Issued On</th>
                            <th scope="col">Picked Up On</th>
                            <th scope="col">Action</th>
                        </tr>
                </thead>
                    <tbody class="text-center">
                        @foreach ($finishTransactions as $finishTransaction)
                        <tr>
                            <th>{{$finishTransaction->id}}</th>
                            <th>{{$finishTransaction->user->name}}</th>
                            <td>{{$finishTransaction->account_name}}</td>
                            <th>{{$finishTransaction->account_number}}</th>
                            <td>{{$finishTransaction->transactionDetail[0]->beverage->outlet->name}}</td>
                            <td>{{'Rp. ' . number_format($finishTransaction->total_price)}}</td>
                            <td>{{$finishTransaction->transaction_date}}</td>
                            <td>{{$finishTransaction->picked_time}}</td>
                            <td class="d-flex justify-content-center gap-2">
                                <a href="{{ env('APP_URL') . '/storage/payment_proof/' . $finishTransaction->payment_proof }}" target="_blank">
                                    <button class="btn btn-info rounded btn-sm" title="View Payment Proof">
                                        <i class="fa-solid fa-receipt"></i>
                                    </button>
                                </a>
                                <a href="{{ route('transactions.detail', $finishTransaction) }}" rel="noopener noreferrer">
                                    <button class="btn btn-dark rounded btn-sm" title="View Details">
                                        <i class="fa-solid fa-list"></i>
                                    </button>
                                </a>
                                <form action={{ route('transactions.update-status-admin', $finishTransaction->id) }} method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="status" value="3" id="" hidden>
                                    <button class="btn btn-warning rounded btn-sm" title="Set status to Ready for Pick Up" id ="ready" type="submit">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </button>
                                </form>
                            </td>
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