

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6KYCSBPFK9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6KYCSBPFK9');
</script>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NMSM247H');</script>
  <!-- End Google Tag Manager -->
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login - Administrador </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body style="background: #3d7182">
<!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMSM247H"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('backend/assets/img/logoDDH.png')}}" alt="DDH" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Bem-vindo!</h4></div>

              <div class="card-body">
                <form action="{{ route('login') }}"  method="POST" action="#" class="needs-validation" novalidate="">
                @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <code>{{ $errors->first('email') }}</code>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Senha</label>
                      <div class="float-right">
                        @if (Route::has('admin.forgot'))
                            <a href="{{ route('admin.forgot') }}" class="text-small" style="color: #6777f0">
                            Esqueceu a senha?
                            </a>
                        @endif
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" value="{{ old('email') }}" required>
                    @if ($errors->has('password'))
                        <code>{{ $errors->first('password') }}</code>
                    @endif
                  </div>

                  <!--
                    <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Lembre-me</label>
                    </div>
                  </div>
                    -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background: #6777f0" tabindex="4">
                      Entrar
                    </button>
                  </div>
                </form>


              </div>
            </div>
            <!--<div class="mt-5 text-muted text-center" >
              Não tem uma conta? <a href="auth-register.html" style="color: #fff">Cadastre-se</a>
            </div>-->
            <div class="simple-footer" style="color: #fff">
              Todos os Direitos Reservados &copy; DDH 2024
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>
</html>
