@extends('admin.layout.master')

@section('title', 'Anamnese - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

          <div class="card card-primary">
            <div class="card-header"><h4>Anamnese</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.anamnese.store') }}">
                  @csrf

                  <!-- Seleção de Nutricionista -->
                  <div class="row">
                    <div class="form-group col-9">
                      <label for="nutricionist">Selecione o Nutricionista</label>
                      <select id="nutricionist" class="form-control" name="nutricionist_id">
                        @foreach($nutricionists as $nutricionist)
                          <option value="{{ $nutricionist->id }}">{{ $nutricionist->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

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
                      <label for="anamnese_date">Data</label>
                      <input id="anamnese_date" type="date" class="form-control" name="anamnese_date" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="weight">Peso</label>
                      <input id="weight" type="number" class="form-control" name="weight">
                    </div>
                    <div class="form-group col-6">
                      <label for="height">Altura</label>
                      <input id="height" type="number" class="form-control" name="height">
                    </div>
                  </div>

                  <!-- Histórico Clínico -->
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="diseases">Doenças</label>
                      <textarea id="diseases" class="form-control" name="diseases"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="allergies">Alergias</label>
                      <input id="allergies" type="text" class="form-control" name="allergies">
                    </div>
                    <div class="form-group col-6">
                      <label for="medications">Medicações</label>
                      <input id="medications" type="text" class="form-control" name="medications">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="family_history">Histórico Familiar</label>
                      <textarea id="family_history" class="form-control" name="family_history"></textarea>
                    </div>
                  </div>

                  <!-- Hábitos Alimentares -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="meals_per_day">Refeições por Dia</label>
                      <input id="meals_per_day" type="number" class="form-control" name="meals_per_day">
                    </div>
                    <div class="form-group col-6">
                      <label for="water_intake">Ingestão de Água (litros)</label>
                      <input id="water_intake" type="number" step="0.1" class="form-control" name="water_intake">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="alcohol">Consumo de Álcool</label>
                      <select id="alcohol" class="form-control" name="alcohol">
                        <option value="no">Não</option>
                        <option value="yes">Sim</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="caffeine">Consumo de Cafeína</label>
                      <select id="caffeine" class="form-control" name="caffeine">
                        <option value="no">Não</option>
                        <option value="yes">Sim</option>
                      </select>
                    </div>
                  </div>

                  <!-- Atividade Física -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exercise">Atividade Física</label>
                      <select id="exercise" class="form-control" name="exercise">
                        <option value="no">Não</option>
                        <option value="yes">Sim</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exercise_frequency">Frequência de Exercícios</label>
                      <input id="exercise_frequency" type="text" class="form-control" name="exercise_frequency">
                    </div>
                  </div>

                  <!-- Comportamento Alimentar -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="snacks">Consome Lanches?</label>
                      <select id="snacks" class="form-control" name="snacks">
                        <option value="no">Não</option>
                        <option value="yes">Sim</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="diet_history">Histórico Dietético</label>
                      <textarea id="diet_history" class="form-control" name="diet_history"></textarea>
                    </div>
                  </div>

                  <!-- Objetivos -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="short_term_goal">Objetivo de Curto Prazo</label>
                      <textarea id="short_term_goal" class="form-control" name="short_term_goal"></textarea>
                    </div>
                    <div class="form-group col-6">
                      <label for="long_term_goal">Objetivo de Longo Prazo</label>
                      <textarea id="long_term_goal" class="form-control" name="long_term_goal"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Enviar
                    </button>
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
