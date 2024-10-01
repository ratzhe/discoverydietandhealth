@extends('nutricionist.layout.master')

@section('title', __('anamnese.title') . ' - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

          <!-- Botão para troca de idioma -->
        <form action="{{ route('switchLang') }}" method="POST" class="mb-3">
          @csrf
          <div class="d-flex justify-content-end">
              <div class="btn-group" role="group">
                  <button type="submit" name="locale" value="pt_BR" class="btn {{ app()->getLocale() == 'pt_BR' ? 'btn-primary' : 'btn-outline-secondary' }}">
                      PT
                  </button>
                  <button type="submit" name="locale" value="en" class="btn {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-secondary' }}">
                      EN
                  </button>
              </div>
          </div>
      </form>

          <div class="card card-primary">
            <div class="card-header"><h4>{{ __('anamnese.title') }}</h4></div>

            <div class="card-body">
                <form method="POST" action="{{ route('nutricionist.anamnese.store') }}">
                  @csrf

                  <!-- Seleção de Paciente -->
                  <div class="row">
                    <div class="form-group col-9">
                      <label for="patient">{{ __('anamnese.select_patient') }}</label>
                      <select id="patient" class="form-control" name="patient_id">
                        @foreach($patients as $patient)
                          <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-3">
                      <label for="anamnese_date">{{ __('anamnese.date') }}</label>
                      <input id="anamnese_date" type="date" class="form-control" name="anamnese_date" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="weight">{{ __('anamnese.weight') }}</label>
                      <input id="weight" type="number" class="form-control" name="weight">
                    </div>
                    <div class="form-group col-6">
                      <label for="height">{{ __('anamnese.height') }}</label>
                      <input id="height" type="number" class="form-control" name="height">
                    </div>
                  </div>

                  <!-- Histórico Clínico -->
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="diseases">{{ __('anamnese.diseases') }}</label>
                      <textarea id="diseases" class="form-control" name="diseases"></textarea>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="allergies">{{ __('anamnese.allergies') }}</label>
                      <input id="allergies" type="text" class="form-control" name="allergies">
                    </div>
                    <div class="form-group col-6">
                      <label for="medications">{{ __('anamnese.medications') }}</label>
                      <input id="medications" type="text" class="form-control" name="medications">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="family_history">{{ __('anamnese.family_history') }}</label>
                      <textarea id="family_history" class="form-control" name="family_history"></textarea>
                    </div>
                  </div>

                  <!-- Hábitos Alimentares -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="meals_per_day">{{ __('anamnese.meals_per_day') }}</label>
                      <input id="meals_per_day" type="number" class="form-control" name="meals_per_day">
                    </div>
                    <div class="form-group col-6">
                      <label for="water_intake">{{ __('anamnese.water_intake') }}</label>
                      <input id="water_intake" type="number" step="0.1" class="form-control" name="water_intake">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="alcohol">{{ __('anamnese.alcohol') }}</label>
                      <select id="alcohol" class="form-control" name="alcohol">
                        <option value="no">{{ __('anamnese.no') }}</option>
                        <option value="yes">{{ __('anamnese.yes') }}</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="caffeine">{{ __('anamnese.caffeine') }}</label>
                      <select id="caffeine" class="form-control" name="caffeine">
                        <option value="no">{{ __('anamnese.no') }}</option>
                        <option value="yes">{{ __('anamnese.yes') }}</option>
                      </select>
                    </div>
                  </div>

                  <!-- Atividade Física -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="exercise">{{ __('anamnese.exercise') }}</label>
                      <select id="exercise" class="form-control" name="exercise">
                        <option value="no">{{ __('anamnese.no') }}</option>
                        <option value="yes">{{ __('anamnese.yes') }}</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="exercise_frequency">{{ __('anamnese.exercise_frequency') }}</label>
                      <input id="exercise_frequency" type="text" class="form-control" name="exercise_frequency">
                    </div>
                  </div>

                  <!-- Comportamento Alimentar -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="snacks">{{ __('anamnese.snacks') }}</label>
                      <select id="snacks" class="form-control" name="snacks">
                        <option value="no">{{ __('anamnese.no') }}</option>
                        <option value="yes">{{ __('anamnese.yes') }}</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label for="diet_history">{{ __('anamnese.diet_history') }}</label>
                      <textarea id="diet_history" class="form-control" name="diet_history"></textarea>
                    </div>
                  </div>

                  <!-- Objetivos -->
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="short_term_goal">{{ __('anamnese.short_term_goal') }}</label>
                      <textarea id="short_term_goal" class="form-control" name="short_term_goal"></textarea>
                    </div>
                    <div class="form-group col-6">
                      <label for="long_term_goal">{{ __('anamnese.long_term_goal') }}</label>
                      <textarea id="long_term_goal" class="form-control" name="long_term_goal"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      {{ __('anamnese.submit') }}
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
