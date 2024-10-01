@extends('admin.layout.master')

@section('title', __('register.title') . ' - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

            <form action="{{ route('switchLang') }}" method="POST" class="mb-3">
                @csrf
                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group">
                        <button type="submit" name="locale" value="pt_BR" class="btn {{ app()->getLocale() == 'pt_BR' ? 'btn-primary' : 'btn-outline-secondary' }}">
                            PT
                        </button>
                        <button type="submit" name="locale" value="en" class="btn {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-secondary' }}">
                            EN
                        </button>
                    </div>
                </div>
            </form>

          <div class="card card-primary">
            <div class="card-header"><h4>{{ __('register.form.header') }}</h4></div>

            <div class="card-body">
              <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-6">
                    <label for="name">{{ __('register.form.name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                  </div>
                  <div class="form-group col-6">
                    <label for="username">{{ __('register.form.username') }}</label>
                    <input id="username" type="text" class="form-control" name="username">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label for="email">{{ __('register.form.email') }}</label>
                      <input id="email" type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group col-6">
                      <label for="phone">{{ __('register.form.phone') }}</label>
                      <input id="phone" type="text" class="form-control" name="phone" placeholder="(00) 00000-0000">
                  </div>

                </div>

                <div class="row">
                    <div class="form-group col">
                      <label for="role">{{ __('register.form.role') }}</label>
                      <select id="role" class="form-control" name="role">
                        <option value="admin">{{ __('register.form.roles.admin') }}</option>
                        <option value="nutricionist">{{ __('register.form.roles.nutricionist') }}</option>
                        <option value="patient">{{ __('register.form.roles.patient') }}</option>
                      </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-4">
                        <label for="cpf">{{ __('register.form.cpf') }}</label>
                        <input id="cpf" type="text" class="form-control" name="cpf" placeholder="000.000.000-00">
                    </div>
                    <div class="form-group col-4">
                        <label for="rg">{{ __('register.form.rg') }}</label>
                        <input id="rg" type="text" class="form-control" name="rg" placeholder="00.000.000-0">
                    </div>
                    <div class="form-group col-4">
                        <label for="datebirth">{{ __('register.form.datebirth') }}</label>
                        <input id="datebirth" type="date" class="form-control" name="datebirth">
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="cep">{{ __('register.form.cep') }}</label>
                      <input id="cep" type="text" class="form-control" name="cep" placeholder="00000-000">
                    </div>
                    <div class="form-group col-6">
                      <label for="street">{{ __('register.form.street') }}</label>
                      <input id="street" type="text" class="form-control" name="street">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="neighborhood">{{ __('register.form.neighborhood') }}</label>
                      <input id="neighborhood" type="text" class="form-control" name="neighborhood">
                    </div>
                    <div class="form-group col-6">
                      <label for="city">{{ __('register.form.city') }}</label>
                      <input id="city" type="text" class="form-control" name="city">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                        <label for="state">{{ __('register.form.state') }}</label>
                        <input id="state" type="text" class="form-control" name="state">
                      </div>
                    <div class="form-group col-6">
                      <label for="number">{{ __('register.form.number') }}</label>
                      <input id="number" type="text" class="form-control" name="number">
                    </div>
                    <div class="form-group col-6">
                      <label for="complement">{{ __('register.form.complement') }}</label>
                      <input id="complement" type="text" class="form-control" name="complement">
                    </div>
                  </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">{{ __('register.form.password') }}</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password_confirmation" class="d-block">{{ __('register.form.password_confirmation') }}</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                  </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" style="width: 100px;">{{ __('register.form.submit') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="backend/assets/js/cep.js"></script>

<script>
$(document).ready(function() {
    // Aplica a máscara ao campo de telefone
    $('#phone').mask('(00) 00000-0000');

    $('#cep').mask('00000-000');

    // Aplica a máscara ao campo de cpf
    $('#cpf').mask('000.000.000-00');

    // Aplica a máscara ao campo de rg
    $('#rg').mask('00.000.000-0');

    // Validação de força da senha
    $("#password").on('keyup', function() {
        var strength = 0;
        var password = $(this).val();

        // Critérios de validação
        if (password.length >= 8) strength += 1;
        if (password.match(/(?=.*[a-z])(?=.*[A-Z])/)) strength += 1; // letras maiúsculas e minúsculas
        if (password.match(/(?=.*[0-9])/)) strength += 1; // números
        if (password.match(/(?=.*[!@#$%^&*])/)) strength += 1; // caracteres especiais

        // Indicação de força
        var label = $('.pwindicator .label');
        var bar = $('.pwindicator .bar');

        switch (strength) {
            case 0:
            case 1:
                label.text('{{ __('register.form.password_strength.weak') }}');
                bar.width('25%').addClass('bg-danger').removeClass('bg-warning bg-success');
                break;
            case 2:
                label.text('{{ __('register.form.password_strength.medium') }}');
                bar.width('50%').addClass('bg-warning').removeClass('bg-danger bg-success');
                break;
            case 3:
            case 4:
                label.text('{{ __('register.form.password_strength.strong') }}');
                bar.width('100%').addClass('bg-success').removeClass('bg-danger bg-warning');
                break;
        }
    });
});
</script>
@endpush
