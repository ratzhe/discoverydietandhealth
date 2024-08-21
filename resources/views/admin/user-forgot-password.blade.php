

<!DOCTYPE html>
<html lang="en">
<head>
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
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('backend/assets/img/logoDDH.png')}}" alt="DDH" width="100" class="shadow-light rounded-circle">
            </div>

             {{-- INICIO BLOCO 2 --}}
        <div class="col-12 col-md-12 col-lg-7">

            <div class="card">
              <form action="{{ route('admin.profile.password') }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                  <h4>Atualizar Senha</h4>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="form-group col-12">
                      <label>Senha Atual</label>
                      <input type="password" class="form-control" name="current_password" placeholder="Digite sua senha atual" >
                    </div>

                    <div class="form-group col-12">
                      <label>Nova Senha</label>
                      <input type="password" class="form-control" name="password" placeholder="Digite a nova senha" >
                    </div>

                    <div class="form-group col-12">
                      <label>Confirmar Senha</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha" >
                    </div>

                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>

          </div>
          {{-- FIM BLOCO 2 --}}
          
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
