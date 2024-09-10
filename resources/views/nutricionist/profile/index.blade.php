@extends('nutricionist.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Meus dados</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('nutricionist.dashboard') }}">Painel</a></div>
        <div class="breadcrumb-item">Perfil</div>
      </div>
    </div>
    <div class="section-body">
      <div class="row mt-sm-4 d-flex justify-content-center">
        {{-- INICIO BLOCO 1 --}}
        <div class="col-12 col-md-12 col-lg-7">

          <div class="card">
            <form action="{{ route('nutricionist.profile.update') }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
              <div class="card-header">
                <h4>Atualizar Perfil</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-12">
                        <div class="mb-3 text-center">
                            @if(Auth::user()->image != null)
                            <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-fluid mb-3" style="width: 220px; height:auto; object-fit: cover; border-radius:50%;">
                            @else
                            <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" alt="{{ Auth::user()->name }}" class="img-fluid mb-3" style="width: 220px; height:auto; object-fit: cover; border-radius:50%;">
                            @endif
                        </div>
                        <label>Foto de Perfil</label>
                        <input id="image" type="file" class="form-control" name="image" >
                    </div>

                    <div class="form-group col-md-6 col-12">
                      <label>Nome</label>
                      <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
                    </div>

                    <div class="form-group col-6">
                        <label for="phone">Telefone</label>
                        <input id="phone" type="text" class="form-control" name="phone" placeholder="(00) 00000-0000" value="{{ Auth::user()->phone }}" >
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>CPF</label>
                        <input id="cpf" type="text" class="form-control" name="cpf" value="{{ Auth::user()->cpf }}" disabled>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>RG</label>
                        <input id="rg" type="text" class="form-control" name="rg" value="{{ Auth::user()->rg }}" disabled>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Data de Nascimento</label>
                        <input id="datebirth" type="date" class="form-control" name="datebirth" value="{{ Auth::user()->datebirth }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>CEP</label>
                        <input id="cep" type="text" class="form-control" name="cep" placeholder="00000-000" value="{{ Auth::user()->address->cep }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Rua</label>
                        <input id="street" type="text" class="form-control" name="street" value="{{ Auth::user()->address->street }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Bairro</label>
                        <input id="neighborhood" type="text" class="form-control" name="neighborhood" value="{{ Auth::user()->address->neighborhood }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Cidade</label>
                        <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->address->city }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Estado</label>
                        <input id="state" type="text" class="form-control" name="state" value="{{ Auth::user()->address->state }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Número</label>
                        <input id="number" type="text" class="form-control" name="number" value="{{ Auth::user()->address->number }}" required="">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Complemento</label>
                        <input id="complement" type="text" class="form-control" name="complement" value="{{ Auth::user()->address->complement }}" required="">
                    </div>

                  </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" style="width: 100px;">Salvar</button>
              </div>
            </form>
          </div>

        </div>
        {{-- FIM BLOCO 1 --}}

        {{-- INICIO BLOCO 2 --}}
        <div class="col-12 col-md-12 col-lg-7">

          <div class="card">
            <form action="{{ route('nutricionist.profile.password') }}" method="post" class="needs-validation" novalidate="" enctype="multipart/form-data">
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
                <button class="btn btn-primary" style="width: 100px;">Salvar</button>
              </div>
            </form>
          </div>

        </div>
        {{-- FIM BLOCO 2 --}}

      </div>
    </div>
  </section>
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
    });
    </script>
    @endpush
