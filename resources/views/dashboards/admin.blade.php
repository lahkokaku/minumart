<x-admin title="Admin Dashboard">
    <section class="container py-5 my-5">
        <h2 class="mt-3 fw-light" style="font-family: 'Roboto">Welcome Back, <span class="text-gr-b3-b4 fw-bold fs-2" style="font-family: 'Lexend';">{{ Auth::guard('admin')->user()->name }}</span></h2>
        <h3 class="mt-4">Monthly Report</h3>
        <div class="row mt-2">
            <div class="col-md-4">
                <x-card>
                    <h4 class="text-blue-4">On Going Transaction(s)</h4>
                    <h1 class="mt-2">{{ $onGoingTransactionCountThisMonth }}</h1>
                    @if ($onGoingTransactionCountThisMonth)
                        <a href="{{ route('transactions.manage') }}">
                            <button class="btn-blue-3">Manage Transaction</button>
                        </a>
                    @else
                        <div>All transactions managed. Good Work!</div>
                    @endif
                </x-card>
            </div>
            <div class="col-md-8">
                <x-card>
                    <h4 class="text-blue-4">Finished Transaction(s) this Month</h4>
                    <h1 class="mt-2">{{ $finishedTransactionCountThisMonth }}</h1>
                    @if ($finishedTransactionCountThisMonth < 1)
                        <div>Be the first one to manage a transaction!</div>
                    @else
                        <div>Keep up the good work!</div>
                    @endif
                </x-card>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <x-card>
                    <h4 class="text-blue-4">Total Transaction(s) this Month</h4>
                    <h1 class="mt-2">{{ $onGoingTransactionCountThisMonth + $finishedTransactionCountThisMonth }}</h1>
                </x-card>
            </div>
            <div class="col-md-8">
                <x-card>
                    <h4 class="text-blue-4">Revenue this Month</h4>
                    <h1 class="mt-2">{{ 'Rp. ' . number_format($revenueThisMonth) }}</h1>
                </x-card>
            </div>
        </div>
        <h3 class="mt-4">Annual Report</h3>
        <div class="row mt-2">
            <div class="col-md-8">
                <x-card>
                    <h4 class="text-blue-4">Revenue this Year</h4>
                    <h1 class="mt-2">{{ 'Rp. ' . number_format($revenueThisYear) }}</h1>
                </x-card>
            </div>
            <div class="col-md-4">
                <x-card>
                    <h4 class="text-blue-4">Finished Transaction(s) this Year</h4>
                    <h1 class="mt-2">{{ $finishedTransactionCountThisYear }}</h1>
                </x-card>
            </div>
        </div>
    </section>
</x-admin>