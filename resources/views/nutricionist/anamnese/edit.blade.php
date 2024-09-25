@extends('nutricionist.layout.master')

@section('title', 'Nova Anamnese Nutricional - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Anamnese Nutricional</h4>
            </div>

            <div class="card-body">
              <form method="POST" action="{{ route('nutricionist.anamnese.update', ['id' => $anamnese->id]) }}">
                @csrf
                @method('PUT')

                <!-- Seleção de Paciente -->
                <div class="row">
                  <div class="form-group col-9">
                    <label for="patient">Selecione o Paciente</label>
                    <select id="patient" class="form-control" name="patient_id">
                      @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $patient->id == $anamnese->patient_id ? 'selected' : '' }}>
                          {{ $patient->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-3">
                    <label for="anamnese_date">Data</label>
                    <input id="anamnese_date" type="date" class="form-control" name="anamnese_date" value="{{ old('anamnese_date', $anamnese->anamnese_date) }}">
                  </div>
                </div>

                <!-- Dados Antropométricos -->
                <div class="row">
                  <div class="form-group col-6">
                    <label for="weight">Peso (kg)</label>
                    <input id="weight" type="number" class="form-control" name="weight" value="{{ old('weight', $anamnese->weight) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="height">Altura (cm)</label>
                    <input id="height" type="number" class="form-control" name="height" value="{{ old('height', $anamnese->height) }}">
                  </div>
                </div>

                <!-- Histórico Clínico -->
                <div class="row">
                  <div class="form-group col-12">
                    <label for="diseases">Doenças diagnosticadas</label>
                    <textarea id="diseases" class="form-control" name="diseases">{{ old('diseases', $anamnese->diseases) }}</textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="allergies">Alergias/Intolerâncias</label>
                    <input id="allergies" type="text" class="form-control" name="allergies" value="{{ old('allergies', $anamnese->allergies) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="medications">Medicamentos em uso</label>
                    <input id="medications" type="text" class="form-control" name="medications" value="{{ old('medications', $anamnese->medications) }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-12">
                    <label for="family_history">Histórico familiar de doenças</label>
                    <textarea id="family_history" class="form-control" name="family_history">{{ old('family_history', $anamnese->family_history) }}</textarea>
                  </div>
                </div>

                <!-- Hábitos Alimentares -->
                <div class="row">
                  <div class="form-group col-6">
                    <label for="meals_per_day">Número de refeições diárias</label>
                    <input id="meals_per_day" type="number" class="form-control" name="meals_per_day" value="{{ old('meals_per_day', $anamnese->meals_per_day) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="water_intake">Consumo de água diário (litros)</label>
                    <input id="water_intake" type="number" step="0.1" class="form-control" name="water_intake" value="{{ old('water_intake', $anamnese->water_intake) }}">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="alcohol">Consumo de bebidas alcoólicas</label>
                    <select id="alcohol" class="form-control" name="alcohol">
                      <option value="no" {{ $anamnese->alcohol == 'no' ? 'selected' : '' }}>Não</option>
                      <option value="yes" {{ $anamnese->alcohol == 'yes' ? 'selected' : '' }}>Sim</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="caffeine">Consumo de cafeína</label>
                    <select id="caffeine" class="form-control" name="caffeine">
                      <option value="no" {{ $anamnese->caffeine == 'no' ? 'selected' : '' }}>Não</option>
                      <option value="yes" {{ $anamnese->caffeine == 'yes' ? 'selected' : '' }}>Sim</option>
                    </select>
                  </div>
                </div>

                <!-- Atividade Física -->
                <div class="row">
                  <div class="form-group col-6">
                    <label for="exercise">Pratica atividade física?</label>
                    <select id="exercise" class="form-control" name="exercise">
                      <option value="no" {{ $anamnese->exercise == 'no' ? 'selected' : '' }}>Não</option>
                      <option value="yes" {{ $anamnese->exercise == 'yes' ? 'selected' : '' }}>Sim</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="exercise_frequency">Frequência semanal</label>
                    <input id="exercise_frequency" type="text" class="form-control" name="exercise_frequency" value="{{ old('exercise_frequency', $anamnese->exercise_frequency) }}">
                  </div>
                </div>

                <!-- Comportamento Alimentar -->
                <div class="row">
                  <div class="form-group col-6">
                    <label for="snacks">Faz lanches entre as refeições?</label>
                    <select id="snacks" class="form-control" name="snacks">
                      <option value="no" {{ $anamnese->snacks == 'no' ? 'selected' : '' }}>Não</option>
                      <option value="yes" {{ $anamnese->snacks == 'yes' ? 'selected' : '' }}>Sim</option>
                    </select>
                  </div>
                  <div class="form-group col-6">
                    <label for="diet_history">Relato de dietas anteriores</label>
                    <textarea id="diet_history" class="form-control" name="diet_history">{{ old('diet_history', $anamnese->diet_history) }}</textarea>
                  </div>
                </div>

                <!-- Objetivos Nutricionais -->
                <div class="row">
                  <div class="form-group col-6">
                    <label for="short_term_goal">Objetivo a curto prazo</label>
                    <input id="short_term_goal" type="text" class="form-control" name="short_term_goal" value="{{ old('short_term_goal', $anamnese->short_term_goal) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="long_term_goal">Objetivo a longo prazo</label>
                    <input id="long_term_goal" type="text" class="form-control" name="long_term_goal" value="{{ old('long_term_goal', $anamnese->long_term_goal) }}">
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
