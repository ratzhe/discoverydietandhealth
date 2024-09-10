@extends('admin.layout.master')

@section('title', 'Editar Usuário - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header"><h4>Editar Usuário</h4></div>

            <div class="card-body">
              <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="form-group col-6">
                    <label for="name">Nome</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" autofocus>
                  </div>
                  <div class="form-group col-6">
                    <label for="username">Nome de usuário</label>
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                  </div>
                  <div class="form-group col-6">
                      <label for="phone">Telefone</label>
                      <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="(99) 99999-9999">
                  </div>
                </div>

                <!-- Input de seleção de usuário com  centralizadas -->
                <div class="row">
                    <div class="form-group col">
                      <label for="role">Usuário</label>
                      <select id="role" class="form-control" name="role">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="nutricionist" {{ $user->role == 'nutricionist' ? 'selected' : '' }}>Nutricionista</option>
                        <option value="patient" {{ $user->role == 'patient' ? 'selected' : '' }}>Paciente</option>
                      </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-4">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" class="form-control" name="cpf" placeholder="000.000.000-00" value="{{ old('cpf', $user->cpf) }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="rg">RG</label>
                        <input id="rg" type="text" class="form-control" name="rg" placeholder="00.000.000-0" value="{{ old('rg', $user->rg) }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="datebirth">Data de Nascimento</label>
                        <input id="datebirth" type="date" class="form-control" name="datebirth" value="{{ old('datebirth', $user->datebirth) }}">
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="cep">CEP</label>
                      <input id="cep" type="text" class="form-control" name="cep" placeholder="00000-000" value="{{ old('cep', $user->address->cep) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="street">Rua</label>
                      <input id="street" type="text" class="form-control" name="street" value="{{ old('street', $user->address->street) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="neighborhood">Bairro</label>
                      <input id="neighborhood" type="text" class="form-control" name="neighborhood" value="{{ old('neighborhood', $user->address->neighborhood) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="city">Cidade</label>
                      <input id="city" type="text" class="form-control" name="city" value="{{ old('city', $user->address->city) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                        <label for="state">Estado</label>
                        <input id="state" type="text" class="form-control" name="state" value="{{ old('state', $user->address->state) }}">
                      </div>
                    <div class="form-group col-6">
                      <label for="number">Número</label>
                      <input id="number" type="text" class="form-control" name="number" value="{{ old('number', $user->address->number) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="complement">Complemento</label>
                      <input id="complement" type="text" class="form-control" name="complement" value="{{ old('complement', $user->address->complement) }}">
                    </div>
                  </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Senha</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" value="{{ old('password', $user->password) }}">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password_confirmation" class="d-block">Confirme a senha</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation', $user->password_confirmation)}}">
                  </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" style="width: 190px;">Atualizar</button>
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
        if (password.match(/(?=.*[a-z])(?=.*[A-Z])/)) strength += 1;
        if (password.match(/(?=.*[0-9])/)) strength += 1;
        if (password.match(/(?=.*[!@#$%^&*])/)) strength += 1;

        // Atualizar o indicador de força
        var pwindicator = $("#pwindicator");
        pwindicator.removeClass();
        pwindicator.addClass('pwindicator');

        if (strength === 1) {
            pwindicator.addClass('bg-danger').text('Fraca');
        } else if (strength === 2) {
            pwindicator.addClass('bg-warning').text('Média');
        } else if (strength >= 3) {
            pwindicator.addClass('bg-success').text('Forte');
        } else {
            pwindicator.text('');
        }
    });
});
</script>
@endpush
