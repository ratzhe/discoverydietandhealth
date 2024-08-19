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
