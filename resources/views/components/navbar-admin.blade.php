<nav class="navbar navbar-expand-lg fixed-top shadow-sm text-black bg-white" style="font-family: 'Lexend', sans-serif; ">
    <div class="container" style="opacity: 100% !important;">
        <div class="d-inline-block py-2">
            @if (Auth::guard('admin')->user())
                <a class="text-blue-4 fs-5 me-2 text-decoration-none" data-bs-toggle="offcanvas" href="#offcanvasAdmin"
                    role="button" aria-controls="offcanvasAdmin">
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
        <div class="navbar-collapse collapse justify-content-end" id="navbar-menu">
            <div class="navbar-nav mb-2 mb-lg-0 gap-2">
                @if (!Auth::guard('admin')->user())
                    <div class="nav-item">
                        <a href="{{ route('outlets.index') }}" class="btn btn-gr-b3-b4">Order</a>
                    </div>
                    <div class="nav-item bg-blue-4 mx-1" style="width: 2px;"></div>
                @endif
                    <div class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('POST')
                            <button class="btn btn-red" type="submit">Logout</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</nav>
