@extends('admin.layout.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach($users as $user)
            <div class="col-md-4">
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
                            <a href="{{ route('admin.dashboard', $user->id) }}" class="btn btn-primary mx-1 d-flex align-items-center">Dashboard</a>
                            <a href="{{ route('admin.editUser', $user->id) }}" class="btn btn-success mx-1 d-flex align-items-center">Editar</a>
                            <!-- Formulário de exclusão -->
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger d-flex align-items-center">
                                    <i class="bi bi-trash" style="font-size: 16px;"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
