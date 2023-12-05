@if (Auth::guard('admin')->check())
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAdmin" aria-labelledby="offcanvasAdminLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-gr-b3-b4 fs-2" id="offcanvasAdminLabel">MINUMART</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="d-flex flex-column justify-content-center align-items-center">
            <div>Welcome 👋</div>
            <h2 class="fs-3 text-blue-3">{{ Auth::guard('admin')->user()->name }}</h2>
            <div style="font-size: 12.5px;">Admin</div>
        </div>

        <a class="pointer p-2 d-flex align-items-center text-decoration-none mt-3" href="{{ route('dashboards.admin') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-home"></i>
            </span>
            <span class="ms-2 text-black">Admin Dashboard</span>
        </a>
        
        <h6 class="mt-3">Payment</h6>
        <a class="pointer p-2 d-flex align-items-center text-decoration-none mt-1" href="{{ route('payment-providers.index') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-sack-dollar"></i>
            </span>
            <span class="ms-2 text-black">Payment Providers</span>
        </a>

        <h6 class="mt-3">Management</h6>
        <a class="pointer p-2 d-flex align-items-center text-decoration-none mt-1" href="{{ route('outlets.manage') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-shop"></i>
            </span>
            <span class="ms-2 text-black">Outlets</span>
        </a>
        <a class="pointer p-2 d-flex align-items-center text-decoration-none" href="{{ route('beverage-types.index') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-gear"></i>
            </span>
            <span class="ms-2 text-black">Beverage Types</span>
        </a>
        <a class="pointer p-2 d-flex align-items-center text-decoration-none" href="{{ route('beverages.index') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-gear"></i>
            </span>
            <span class="ms-2 text-black">Beverages</span>
        </a>
        
        <h6 class="mt-3">Orders</h6>
        <a class="pointer p-2 d-flex align-items-center text-decoration-none mt-1" href="{{ route('transactions.manage') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </span>
            <span class="ms-2 text-black">Manage Orders</span>
        </a>

    </div>
</div>
@endif