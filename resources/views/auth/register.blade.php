<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Ekka - Admin Dashboard HTML Template.">

  <title>Ekka - Admin Dashboard HTML Template.</title>

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- Ekka CSS -->
  <link id="ekka-css" rel="stylesheet" href="{{asset('assets/css/ekka.css')}}" />

  <!-- FAVICON -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="shortcut icon" />
</head>

<body class="sign-inup" id="body">
  <div class="container d-flex align-items-center justify-content-center form-height pt-24px pb-24px">

    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-10">
        <div class="card">
          <div class="card-header bg-primary">

            <div class="ec-brand">
              <a href="index.html" title="Ekka">
                <img class="ec-brand-icon" src="assets/img/logo/logo-login.png" alt="" />
              </a>
            </div>
          </div>
          <div class="card-body p-5">

            @if(Session::get('succsess'))
            <div class="alert alert-success">
                {{ Session::get("succsess") }}
            </div>
            @endif
            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
            @endif
            <h4 class="text-dark mb-5">Sign Up</h4>

            <form action="{{route('auth.save')}}" method="post">
                @csrf
              <div class="row">
                <div class="form-group col-md-12 mb-4">
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Name">
                  <span class="text-danger" >@error('name'){{$message}} @enderror</span>
                </div>


                <div class="form-group col-md-12 mb-4">
                  <input type="email" name="email" class="form-control" id="email"  value="{{old('email')}}" placeholder="...email@.com">
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>


                <div class="form-group col-md-12 ">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  <span class="text-danger" >@error('password'){{$message}} @enderror</span>
                </div>



                <div class="form-group col-md-12 ">
                  <input type="password" name="password_confirmation" class="form-control" id="cpassword" placeholder="Confirm Password">
                  <span class="text-danger" >@error('password_confirmation'){{$message}} @enderror</span>
                </div>



                <div class="col-md-12">
                  <div class="d-inline-block mr-3">
                    <div class="control control-checkbox">
                      <input type="checkbox" />
                      <div class="control-indicator"></div>
                      I Agree the terms and conditions
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>

                  <p class="sign-upp">Already have an account?
                    <a class="text-blue" href="sign-in.html">Sign in</a>
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascript -->
  <script src="{{asset('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
	<script src="{{asset('assets/plugins/slick/slick.min.js')}}"></script>

  <!-- Ekka Custom -->
  <script src="{{asset('assets/js/ekka.js')}}"></script>
</body>

</html>
