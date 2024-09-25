@extends('admin.layout.master')

@section('content')
<div class="container mt-5">
    <h4>Usuários</h4>
    <!-- Filtro de busca -->
    <form action="{{ route('admin.seeusers') }}" method="get" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por Nome ou E-mail" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4">a
                <div class="card mb-4 text-center">
                    <div class="card-body">
                        <img src="{{ $user->image ? $user->image : asset('backend/assets/img/avatar/avatar-1.png') }}"
                             class="rounded-circle mb-3"
                             alt="User Photo"
                             style="width: 100px; height: 100px; object-fit: cover;">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        @if ($user->role == 'admin')
                            <p class="card-text">Administrador</p>
                        @elseif ($user->role  == 'patient')
                            <p class="card-text">Paciente</p>
                        @else
                            <p class="card-text">Nutricionista</p>
                        @endif
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('admin.nutricionistDashboard', $user->id) }}" class="btn btn-primary mx-1 btn-custom">Dashboard</a>
                            <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-success mx-1 btn-custom">Editar</a>
                            <!-- Formulário de exclusão -->
                            <a href="{{ route('admin.deleteUser', $user->id) }}" class="btn btn-danger mx-1 btn-custom" data-method="DELETE" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">Excluir</a>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
