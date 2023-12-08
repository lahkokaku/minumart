<x-guest title="Login as Admin">
    <style>
        .login-page {
            background-image: url('/storage/assets/login-background.jpg');
            background-position: center;
            background-size: cover;
            filter: blur(10px);
        }

        .position-absolute {
            text-align: center;
            top: 50%;
            left: 0;
            right: 0;
            margin: auto;
            transform: translateY(-50%);
        }
    </style>
    <div class="login-page container-fluid min-vh-100 position-relative"> </div>
    <div class="position-absolute col-md-6 px-0 d-flex align-items-center justify-content-center w-100">
        <div class="col-md-6 px-0 h-100 ">
            <div class="card col-12 shadow py-4" style="border: 0">
                <div class="card-title text-center">
                    <span class="text-gr-b3-b4 fw-bold fs-2">{{ __('Login As Admin') }}</span>
                </div>

                <div class="card-body s">
                    <form method="POST" action="{{ route('login-admin') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
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

                        <div class="row mb-3 ">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check d-flex gap-2" >
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label  " for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 w-100 justify-content-center">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-blue-3 w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</x-guest>
