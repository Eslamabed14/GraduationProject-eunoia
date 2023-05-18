
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('auth/style/style.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <section class="section-login mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 m-auto">
                    <h1 class="text-center color-primary mb-2">Doctor LogIn</h1>
                    <p class="text-center section-p">
                        Log In To Your Account
                        <br />
                    </p>
                    <div class="mt-5">

                        <form method="POST" action="{{ route('doctor.confirmlogin') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email" class="color-primary mb-2">Email</label>

                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="password" class="color-primary mb-2 ">Password</label>

                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group remember-forget mt-2">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div class="forgot-password">
                                    <a href="{{ route('password.request') }}" class="color-primary ">{{ __('Forgot Your Password?') }}</a>
                                </div>

                            </div>

                            <div class="form-group btn-submit mt-5">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                            </div>

                            <p class="text-center color-primary mt-2">
                                 {{ __('Don\'t have an account?') }} <a href="{{route('doctor.register')}}">
                                    {{__('Sign Up')}}
                                </a>
                            </p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>

