@extends('nutricionist.layout.master')

@section('title', 'Editar Antropometria - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header"><h4>Editar Antropometria</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ route('nutricionist.antropometria.update', ['id' => $antropometria->id]) }}">
                    @csrf
                    @method('PUT')

                <!-- Seleção de Paciente e Data -->
                <div class="row">
                    <div class="form-group col-9">
                        <label for="patient">Selecione o Paciente</label>
                        <select id="patient" class="form-control" name="patient_id">
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}" {{ $patient->id == $antropometria->patient_id ? 'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="antropometria_date">Data</label>
                        <label for="antropometria_date" class="mr-2"></label>
                        <input id="antropometria_date" type="date" class="form-control" name="antropometria_date" value="{{ old('weight', $antropometria->antropometria_date) }}">
                    </div>
                </div>


                <div class="row">
                  <div class="form-group col-6">
                    <label for="weight">Peso (kg)</label>
                    <input id="weight" type="number" class="form-control" name="weight" value="{{ old('weight', $antropometria->weight) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="height">Altura (cm)</label>
                    <input id="height" type="number" class="form-control" name="height" value="{{ old('height', $antropometria->height) }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="waist_circumference">Circunferência da cintura (cm)</label>
                    <input id="waist_circumference" type="number" class="form-control" name="waist_circumference" value="{{ old('waist_circumference', $antropometria->waist_circumference) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="hip_circumference">Circunferência do quadril (cm)</label>
                    <input id="hip_circumference" type="number" class="form-control" name="hip_circumference" value="{{ old('hip_circumference', $antropometria->hip_circumference) }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="bmi">IMC</label>
                    <input id="bmi" type="text" class="form-control" name="bmi" value="{{ old('bmi', $antropometria->bmi) }}" readonly>
                  </div>
                  <div class="form-group col-6">
                    <label for="body_fat">Percentual de gordura corporal (%)</label>
                    <input id="body_fat" type="number" step="0.1" class="form-control" name="body_fat" value="{{ old('body_fat', $antropometria->body_fat) }}">
                  </div>
                </div>

                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
