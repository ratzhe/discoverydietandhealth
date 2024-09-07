@extends('patient.layout.master')

@section('content')
<div class="container">
    <br><br>
    <h3>Upload de Exame</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('patient.exam.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Escolha o arquivo PDF:</label>
            <input type="file" class="form-control" id="file" name="file" required>
        </div>

        <div class="form-group">
            <label for="exam_name">Nome do Exame:</label>
            <input type="text" class="form-control" id="exam_name" name="exam_name" placeholder="Digite o nome do exame" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descrição do exame" required></textarea>
        </div>

        <div class="form-group">
            <label for="date">Data do Exame:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-primary">Carregar</button>
    </form>
</div>
@endsection
