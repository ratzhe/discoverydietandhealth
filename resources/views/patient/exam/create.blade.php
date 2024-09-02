@extends('patient.layout.master')

@section('content')
<div class="container">

    <div class="card-header">
        <h4>Carregar Exame</h4>
    </div>

    <!-- Formulário para criar um novo exame -->
    <form action="{{ route('patient.exam.store') }}" method="POST">
        @csrf <!-- Token de segurança para o Laravel -->

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

        <button type="submit" class="btn btn-primary">Salvar Exame</button>
    </form>
</div>

@endsection
