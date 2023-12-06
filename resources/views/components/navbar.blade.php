<nav class="navbar navbar-expand-lg fixed-top shadow-sm text-black bg-white" style="font-family: 'Lexend', sans-serif; ">
    <div class="container" style="opacity: 100% !important;">
        <div class="d-inline-block py-2">
            @if (Auth::guard('admin')->user())
                <a class="text-blue-4 fs-5 me-2 text-decoration-none" data-bs-toggle="offcanvas" href="#offcanvasAdmin"
                    role="button" aria-controls="offcanvasAdmin">
                    <i class="fa-solid fa-bars"></i>
                </a>
            @endif
            @if (Auth::guard('web')->user())
                <a class="text-blue-4 fs-5 me-2 text-decoration-none" data-bs-toggle="offcanvas" href="#offcanvasUser"
                    role="button" aria-controls="offcanvasUser">
                    <i class="fa-solid fa-bars"></i>
                </a>
            @endif
            <a class="navbar-brand" href="/">
                <img src="/storage/assets/ThemeLogoHorizontal.png" alt="" height="40">
            </a>
        </div>
        <button class="navbar-toggler border" type="button" data-bs-target="#navbar-menu" data-bs-toggle="collapse"
            aria-controls="contain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon pt-1 c-text-1"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar-menu">
            <div class="d-flex w-100 justify-content-end gap-2">
                @if (!Auth::guard('admin')->user())
                    <div class="nav-item">
                        <a href="{{ route('outlets.index') }}" class="btn btn-gr-b3-b4">Order</a>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-gr-b3-b4 dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Your Order
                        </button>
                        @if (Auth::guard('web')->user())
                            @php
                                $unFinishedOrder = App\Models\TransactionHeader::where('user_id', Auth::guard('web')->user()->id)
                                    ->where('status', '!=', 4)
                                    ->get();
                            @endphp
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @if ($unFinishedOrder->count())
                                    @foreach ($unFinishedOrder as $order)
                                        <li>
                                            <a href="{{ route('dashboards.user') }}?order={{ $order->id }}"
                                                class="dropdown-item d-flex justify-content-between">
                                                <span>id :{{ $order->id }}</span>
                                                <span> Rp {{ number_format($order->total_price) }} </span>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li> <a href="{{ route('outlets.index') }}" class="dropdown-item"> No Pending
                                            Transaction </a></li>
                                @endif
                            </ul>
                        @endif
                    </div>

                    <div class="nav-item bg-blue-4 mx-1" style="width: 2px;"></div>
                @endif
                @if (!Auth::guard('web')->user() && !Auth::guard('admin')->user())
                    <div class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-blue-4-outline">Login</a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-blue-3">Register</a>
                    </div>
                @else
                    <div class="nav-item">
                        <?php
                        $role;
                        if (Auth::guard('web')->user()) {
                            $role = 'user';
                        } else {
                            $role = 'admin';
                        }
                        ?>
                        <a href="{{ $role == 'user' ? route('dashboards.user') : route('dashboards.admin') }}"
                            class="btn btn-blue-3">Dashboard</a>
                    </div>
                    <div class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="btn btn-red" type="submit">Logout</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>
