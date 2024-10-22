@extends('patient.layout.master')

@section('title', 'Minhas Anamneses')

@section('content')
<div class="container mt-5">
    <h2>Minhas Anamneses</h2>

    @if($anamneses->isEmpty())
        <p>Você ainda não possui anamneses cadastradas.</p>
    @else
        @foreach ($anamneses as $anamnese)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $anamnese->anamnese_date }}
                </div>
                <div class="card-body">
                    <a href="{{ route('patient.anamnese.download', $anamnese->id) }}" class="btn btn-primary">
                        Baixar Anamnese em PDF
                    </a>
                    <p><strong>Peso:</strong> {{ $anamnese->weight }} kg</p>
                    <p><strong>Altura:</strong> {{ $anamnese->height }} m</p>
                    <p><strong>Doenças:</strong> {{ $anamnese->diseases }}</p>
                    <p><strong>Alergias:</strong> {{ $anamnese->allergies }}</p>
                    <p><strong>Medicamentos:</strong> {{ $anamnese->medications }}</p>
                    <p><strong>Histórico Familiar:</strong> {{ $anamnese->family_history }}</p>
                    <!-- Adicione outros campos conforme necessário -->
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
