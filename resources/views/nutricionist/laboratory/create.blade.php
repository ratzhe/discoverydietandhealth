@extends('nutricionist.layout.master')

@section('content')
<div class="container">
    <h1>Registrar Avaliação Laboratorial</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('nutricionist.laboratory.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="test_type">Escolha o tipo de exame:</label>
            <select id="test_type" name="test_type" class="form-control" onchange="showTestFields(this.value)">
                <option value="">Selecione um exame</option>
                <option value="hemograma">Hemograma</option>
                <option value="glicose">Glicose</option>
                <option value="colesterol">Colesterol</option>
            </select>
        </div>

        <!-- Campos para Hemograma -->
        <div id="hemograma-fields" class="test-fields" style="display: none;">
            <h3>Resultados do Hemograma</h3>
            <div class="form-group">
                <label for="hemoglobina">Hemoglobina:</label>
                <input type="number" step="0.01" name="results[hemoglobina]" class="form-control">
            </div>
            <div class="form-group">
                <label for="hematocrito">Hematócrito:</label>
                <input type="number" step="0.01" name="results[hematocrito]" class="form-control">
            </div>
        </div>

        <!-- Campos para Glicose -->
        <div id="glicose-fields" class="test-fields" style="display: none;">
            <h3>Resultados da Glicose</h3>
            <div class="form-group">
                <label for="glicose">Nível de Glicose:</label>
                <input type="number" step="0.01" name="results[glicose]" class="form-control">
            </div>
        </div>

        <!-- Campos para Colesterol -->
        <div id="colesterol-fields" class="test-fields" style="display: none;">
            <h3>Resultados do Colesterol</h3>
            <div class="form-group">
                <label for="hdl">Colesterol HDL:</label>
                <input type="number" step="0.01" name="results[hdl]" class="form-control">
            </div>
            <div class="form-group">
                <label for="ldl">Colesterol LDL:</label>
                <input type="number" step="0.01" name="results[ldl]" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar Exame</button>
    </form>
</div>

<script>
    function showTestFields(testType) {
        // Ocultar todos os campos
        document.querySelectorAll('.test-fields').forEach(function (field) {
            field.style.display = 'none';
        });

        // Exibir os campos correspondentes ao exame selecionado
        if (testType) {
            document.getElementById(testType + '-fields').style.display = 'block';
        }
    }
</script>
@endsection
