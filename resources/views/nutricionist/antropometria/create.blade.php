@extends('nutricionist.layout.master')

@section('title', 'Nova Avaliação Antropométrica - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header"><h4>Avaliação Antropométrica</h4></div>

            <div class="card-body">
              <form method="POST" action="{{ route('nutricionist.antropometria.store') }}">
                @csrf

                <!-- Seleção de Paciente -->
                <div class="row">
                    <div class="form-group col-9">
                      <label for="patient">Selecione o Paciente</label>
                      <select id="patient" class="form-control" name="patient_id">
                        @foreach($patients as $patient)
                          <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="antropometria_date">Data</label>
                        <input id="antropometria_date" type="date" class="form-control" name="antropometria_date" required>
                      </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="weight">Peso (kg)</label>
                    <input id="weight" type="number" class="form-control" name="weight" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="height">Altura (cm)</label>
                    <input id="height" type="number" class="form-control" name="height" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="waist_circumference">Circunferência da Cintura (cm)</label>
                    <input id="waist_circumference" type="number" class="form-control" name="waist_circumference" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="hip_circumference">Circunferência do Quadril (cm)</label>
                    <input id="hip_circumference" type="number" class="form-control" name="hip_circumference" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="skinfold_tricep">Dobra Cutânea (Tríceps) (mm)</label>
                    <input id="skinfold_tricep" type="number" class="form-control" name="skinfold_tricep">
                  </div>
                  <div class="form-group col-6">
                    <label for="skinfold_subscapular">Dobra Cutânea (Subescapular) (mm)</label>
                    <input id="skinfold_subscapular" type="number" class="form-control" name="skinfold_subscapular">
                  </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                      <label for="bmi">IMC</label>
                      <input id="bmi" type="text" class="form-control" name="bmi">
                    </div>
                    <div class="form-group col-6">
                      <label for="body_fat">Percentual de gordura corporal (%)</label>
                      <input id="body_fat" type="number" step="0.1" class="form-control" name="body_fat">
                    </div>
                </div>

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const weightInput = document.getElementById('weight');
    const heightInput = document.getElementById('height');
    const bmiInput = document.getElementById('bmi');

    function calculateBMI() {
      const weight = parseFloat(weightInput.value);
      const height = parseFloat(heightInput.value) / 100; // converter cm para m
      if (weight && height) {
        const bmi = (weight / (height * height)).toFixed(2);
        bmiInput.value = bmi;
      } else {
        bmiInput.value = '';
      }
    }

    // Executa a função ao modificar os campos de peso e altura
    weightInput.addEventListener('input', calculateBMI);
    heightInput.addEventListener('input', calculateBMI);
  });
</script>
@endsection

@endsection
