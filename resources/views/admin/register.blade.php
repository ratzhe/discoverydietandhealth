@extends('admin.layout.master')

@section('title', 'Cadastro de Usuário - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header"><h4>Cadastro</h4></div>

            <div class="card-body">
              <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="row">
                  <div class="form-group col-6">
                    <label for="name">Nome</label>
                    <input id="name" type="text" class="form-control" name="name" autofocus>
                  </div>
                  <div class="form-group col-6">
                    <label for="username">Nome de usuário</label>
                    <input id="username" type="text" class="form-control" name="username">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email">
                  </div>
                  <div class="form-group col-6">
                      <label for="phone">Telefone</label>
                      <input id="phone" type="text" class="form-control" name="phone" placeholder="(99) 99999-9999">
                  </div>
                </div>

                <!-- Input de seleção de usuário centralizado -->
                <div class="row">
                    <div class="form-group col">
                      <label for="role">Usuário</label>
                      <select id="role" class="form-control" name="role">
                        <option value="admin">Administrador</option>
                        <option value="nutricionist">Nutricionista</option>
                        <option value="patient">Paciente</option>
                      </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" class="form-control" name="cpf" placeholder="999.999.999-99">
                    </div>
                    <div class="form-group col-6">
                        <label for="rg">RG</label>
                        <input id="rg" type="text" class="form-control" name="rg">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="cep">CEP</label>
                      <input id="cep" type="text" class="form-control" name="cep" placeholder="99999-999">
                    </div>
                    <div class="form-group col-6">
                      <label for="street">Rua</label>
                      <input id="street" type="text" class="form-control" name="street">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="neighborhood">Bairro</label>
                      <input id="neighborhood" type="text" class="form-control" name="neighborhood">
                    </div>
                    <div class="form-group col-6">
                      <label for="city">Cidade</label>
                      <input id="city" type="text" class="form-control" name="city">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                        <label for="state">Estado</label>
                        <input id="state" type="text" class="form-control" name="state">
                      </div>
                    <div class="form-group col-6">
                      <label for="number">Número</label>
                      <input id="number" type="text" class="form-control" name="number">
                    </div>
                    <div class="form-group col-6">
                      <label for="complement">Complemento</label>
                      <input id="complement" type="text" class="form-control" name="complement">
                    </div>
                  </div>



                <div class="row">
                  <div class="form-group col-6">
                    <label for="password" class="d-block">Senha</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <label for="password_confirmation" class="d-block">Confirme a senha</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                  </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" style="width: 100px;">Cadastrar</button>
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

    // Aplica a máscara ao campo de telefone
    $('#cpf').mask('000.000.000-00');

    

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

@push('styles')
<style>
.pwindicator {
    height: 5px;
    border-radius: 3px;
    transition: width 0.3s ease;
}
.pwindicator.bg-danger {
    background-color: #dc3545;
    width: 33%;
}
.pwindicator.bg-warning {
    background-color: #ffc107;
    width: 66%;
}
.pwindicator.bg-success {
    background-color: #28a745;
    width: 100%;
}
</style>
@endpush
