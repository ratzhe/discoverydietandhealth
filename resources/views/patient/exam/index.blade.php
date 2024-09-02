@extends('patient.layout.master')

@section('content')
<div class="container">
    <h1>Upload de Exame</h1>

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
        <button type="submit" class="btn btn-primary">Carregar</button>
    </form>
</div>
@endsection
