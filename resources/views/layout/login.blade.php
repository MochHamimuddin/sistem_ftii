<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login FTII</title>
   <link rel="stylesheet" href="{{ asset('landingpage/assets/css/login.css') }}">
   <link href="{{asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
   <link href="{{asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                @if(Session::has('status'))
            <div class="alert alert-danger" role="alert">
                    {{ Session::get('message') }}
            </div>
            @endif

              <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <div class="divider d-flex align-items-center my-4">
                  <h3 class="text-center fw-bold mx-3 mb-0">Login</h3>
                </div>
                <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" required />
                  <label class="form-label" for="email">Email address</label>
                </div>
                <div class="form-outline mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                    placeholder="Enter password" required />
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <a href="#!" class="text-body">Forgot password?</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                      class="link-danger">Register</a></p>
                </div>

              </form>
            </div>
          </div>
        </div>
      </section>
      <script src="{{ asset('landingpage/assets/js/main.js')}}"></script>
      <script src="https://kit.fontawesome.com/4a4251cc63.js" crossorigin="anonymous"></script>
</body>
</html>
