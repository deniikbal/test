
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <title>Login</title>

    <!-- vendor css -->
    <link href="{{ asset('/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/dashforge.auth.css') }}">
    {{-- script --}}
    <!-- Scripts -->
  </head>
  <body>

    <div class="content content-fixed content-auth">
      <div class="container">
        <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
          <div class="media-body align-items-center d-none d-lg-flex">
            <div class="mx-wd-600">
              <img src="{{ asset('assets/img/auth/login.png') }}" class="img-fluid" alt="">
            </div>
          </div><!-- media-body -->
          <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
            <div class="wd-100p">
              <h3 class="tx-color-01 mg-b-5">Sign In</h3>
              <p class="tx-color-03 tx-16 mg-b-40">Welcome back! Please signin to continue.</p>
              <form method="POST" action="{{ route('login') }}">
                @csrf
              <div class="form-group">
                <label>Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="yourname@yourmail.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <div class="form-group">
                <div class="d-flex justify-content-between mg-b-5">
                  <label class="mg-b-0-f">Password</label>
                </div>
                <input type="password" name="password" class="form-control @error('password')
                    is-invalid
                @enderror" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <button class="btn btn-danger btn-block">Sign In</button>
              </form>
              <hr>
              <div class="tx-13 mg-t-20 tx-center">Don't have an account? <a href="{{ route('register') }}">Create an Account</a></div>
            </div>
          </div><!-- sign-wrapper -->
        </div><!-- media -->
      </div><!-- container -->
    </div><!-- content -->

    <script src="{{ asset('/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('/assets/js/dashforge.js') }}"></script>

    <!-- append theme customizer -->
    <script src="{{ asset('/lib/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('/assets/js/dashforge.settings.js') }}"></script>
  </body>
</html>
