@if (Auth::guard('web')->check())
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasUser" aria-labelledby="offcanvasUserLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title text-gr-b3-b4 fs-2" id="offcanvasUserLabel">MINUMART</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <div class="d-flex flex-column justify-content-center align-items-center">
            <div>Welcome 👋</div>
            <h2 class="fs-3 text-blue-3">{{ Auth::guard('web')->user()->name }}</h2>
            <div style="font-size: 12.5px;">Customer</div>
        </div>

        <a class="pointer p-2 d-flex align-items-center text-decoration-none mt-3" href="{{ route('dashboards.user') }}">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-home"></i>
            </span>
            <span class="ms-2 text-black">Dashboard</span>
        </a>
        
        <a class="pointer p-2 d-flex align-items-center text-decoration-none mt-1" href="">
            <span class="rounded rounded-circle bg-blue-3 text-white d-flex justify-center p-2">
                <i class="fa-solid fa-clock"></i>
            </span>
            <span class="ms-2 text-black">Transaction History</span>
        </a>

    </div>
</div>
@endif