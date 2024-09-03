@extends('patient.layout.master')

@section('content')
<div class="container mt-5">
    <h2>Meus Exames</h2>
    <div class="row">
        @foreach($exams as $exam)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{ $exam->file_path ? asset('storage/' . $exam->file_path) : asset('backend/assets/img/file.png') }}"
                                 class="img-thumbnail"
                                 alt="Exame Preview"
                                 style="width: 250px; height: 180px; object-fit: cover;">
                        </div>
                        <h5 class="card-title">{{ $exam->exam_name }}</h5>
                        <p class="card-text">Data: {{ $exam->date->format('d/m/Y') }}</p>
                        <a href="{{ asset('storage/' . $exam->file_path) }}" class="btn btn-primary" target="_blank">Visualizar Exame</a>
                        <form action="{{ route('patient.exam.deleteExam', $exam->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-2">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
