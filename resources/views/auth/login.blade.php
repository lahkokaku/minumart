<x-guest title="Login">
    <style>
        .login-page {
            background-image:url('/storage/assets/login-background.jpg');
            background-position: center;
            background-size: cover;
            filter: blur(10px);
        }

        .position-absolute{
            text-align: center;
            top: 50%;
            left: 0;
            right: 0;
            margin: auto;
            transform: translateY(-50%);  
        }
    </style>
    <div class="login-page container-fluid min-vh-100 position-relative"> </div>
    <div class="position-absolute col-md-6 px-0 d-flex align-items-center justify-content-center">
        <div class="card shadow w-100 py-3" style="border: 0">
            <div class="card-title text-center">
                <span class="text-gr-b3-b4 fw-bold fs-2">{{ __('Login') }}</span>
            </div>

            <div class="card-body border-0 ">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check d-flex gap-2">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0 justify-content-center ">
                        <div class="col-md-8    ">
                            <button type="submit " class="btn-blue-3 ">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest>
