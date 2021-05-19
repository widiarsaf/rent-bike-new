<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assetsCustomer/ldanr.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-6 pt-4" style="background: rgb(255, 255, 255)">
                <img src="assetsCustomer/logo.jpg" class="img-fluid" alt="image">
            </div>
            <div class="col-md-6 px-5" style="border-left:1px solid rgb(233, 223, 136)"
                style="background: rgb(255, 255, 255)">
                <h3 class="signin-text mb-6 mt-4 "><b>Sign In</b></h3><br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    {{-- username --}}
                    <div class=" form-group">
                        <label for="uname"><i class="fa fa-user"></i><b> Username</b></label><br>
                        <input id="username" type="username"
                            class="form-control @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}" required autocomplete="email" autofocus>

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <label for="pass"><i class="fa fa-lock"></i><b> Password</b></label><br>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="form-group form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Remember Me</label>
                    </div><br>
                    <button class="btn btn-class"><b>Login</b></button>

                    {{-- Password Reset --}}
                    @if (Route::has('password.request'))
                    <div class="form-group" style="margin-left:-10px !important;">
                        <a class="btn btn-link" href="{{ route('password.request') }}"
                            style="color: #00ac96 !important">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>
                {{-- register --}}

                <p style="text-align: center;"><b>Don't Have an Account?</b> <a
                        href="{{route('register')}}"><u>Register</u></a></p>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
</body>

</html>