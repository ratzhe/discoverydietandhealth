@extends('nutricionist.layout.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach($users as $user)
            @if ($user->role == 'patient') <!-- Adiciona a condição para exibir apenas pacientes -->
                <div class="col-md-4">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <img src="{{ $user->image ? $user->image : asset('backend/assets/img/avatar/avatar-1.png') }}"
                                 class="rounded-circle mb-3"
                                 alt="User Photo"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">{{ $user->email }}</p>
                            <p class="card-text">Paciente</p> <!-- Atualizado para sempre mostrar "Paciente" -->
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('nutricionist.dashboard', $user->id) }}" class="btn btn-primary mx-1 btn-custom">Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
