@extends('nutricionist.layout.master')

@section('title', __('antropometria.title') . ' - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

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
            <div class="card-header"><h4>{{ __('antropometria.title') }}</h4></div>

            <div class="card-body">
              <form method="POST" action="{{ route('nutricionist.antropometria.store') }}">
                @csrf

                <!-- Seleção de Paciente -->
                <div class="row">
                    <div class="form-group col-9">
                      <label for="patient">{{ __('antropometria.select_patient') }}</label>
                      <select id="patient" class="form-control" name="patient_id">
                        @foreach($patients as $patient)
                          <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-3">
                        <label for="antropometria_date">{{ __('antropometria.evaluation_date') }}</label>
                        <input id="antropometria_date" type="date" class="form-control" name="antropometria_date" required>
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="weight">{{ __('antropometria.weight') }}</label>
                    <input id="weight" type="number" class="form-control" name="weight" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="height">{{ __('antropometria.height') }}</label>
                    <input id="height" type="number" step="0.01" class="form-control" name="height" required>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="bmi">{{ __('antropometria.bmi') }}</label>
                    <input id="bmi" type="text" class="form-control" name="bmi">
                  </div>
                  <div class="form-group col-6">
                    <label for="lean_mass">{{ __('antropometria.lean_mass') }}</label>
                    <input id="lean_mass" type="number" step="0.1" class="form-control" name="lean_mass">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="fat_mass">{{ __('antropometria.fat_mass') }}</label>
                    <input id="fat_mass" type="number" step="0.1" class="form-control" name="fat_mass">
                  </div>
                </div>

                <h6>{{ __('antropometria.circumferences') }}</h6>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="shoulder_circumference">{{ __('antropometria.shoulder_circumference') }}</label>
                    <input id="shoulder_circumference" type="number" class="form-control" name="shoulder_circumference">
                  </div>
                  <div class="form-group col-6">
                    <label for="chest_circumference">{{ __('antropometria.chest_circumference') }}</label>
                    <input id="chest_circumference" type="number" class="form-control" name="chest_circumference">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="waist_circumference">{{ __('antropometria.waist_circumference') }}</label>
                    <input id="waist_circumference" type="number" class="form-control" name="waist_circumference" required>
                  </div>
                  <div class="form-group col-6">
                    <label for="abdomen_circumference">{{ __('antropometria.abdomen_circumference') }}</label>
                    <input id="abdomen_circumference" type="number" class="form-control" name="abdomen_circumference">
                  </div>
                </div>  

                <div class="row">
                  <div class="form-group col-6">
                    <label for="hip_circumference">{{ __('antropometria.hip_circumference') }}</label>
                    <input id="hip_circumference" type="number" class="form-control" name="hip_circumference">
                  </div>
                  <div class="form-group col-6">
                    <label for="right_arm_circumference">{{ __('antropometria.right_arm_circumference') }}</label>
                    <input id="right_arm_circumference" type="number" class="form-control" name="right_arm_circumference">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="right_forearm_circumference">{{ __('antropometria.right_forearm_circumference') }}</label>
                    <input id="right_forearm_circumference" type="number" class="form-control" name="right_forearm_circumference">
                  </div>
                  <div class="form-group col-6">
                    <label for="right_thigh_circumference">{{ __('antropometria.right_thigh_circumference') }}</label>
                    <input id="right_thigh_circumference" type="number" class="form-control" name="right_thigh_circumference">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="right_calf_circumference">{{ __('antropometria.right_calf_circumference') }}</label>
                    <input id="right_calf_circumference" type="number" class="form-control" name="right_calf_circumference">
                  </div>
                  <div class="form-group col-6">
                    <label for="left_arm_circumference">{{ __('antropometria.left_arm_circumference') }}</label>
                    <input id="left_arm_circumference" type="number" class="form-control" name="left_arm_circumference">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="left_forearm_circumference">{{ __('antropometria.left_forearm_circumference') }}</label>
                    <input id="left_forearm_circumference" type="number" class="form-control" name="left_forearm_circumference">
                  </div>
                  <div class="form-group col-6">
                    <label for="left_thigh_circumference">{{ __('antropometria.left_thigh_circumference') }}</label>
                    <input id="left_thigh_circumference" type="number" class="form-control" name="left_thigh_circumference">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="left_calf_circumference">{{ __('antropometria.left_calf_circumference') }}</label>
                    <input id="left_calf_circumference" type="number" class="form-control" name="left_calf_circumference">
                  </div>
                </div>

                <h6>{{ __('antropometria.skinfolds') }}</h6>
                <div class="row">
                  <div class="form-group col-6">
                    <label for="skinfold_subscapular">{{ __('antropometria.skinfold_subscapular') }}</label>
                    <input id="skinfold_subscapular" type="number" class="form-control" name="skinfold_subscapular">
                  </div>
                  <div class="form-group col-6">
                    <label for="skinfold_tricep">{{ __('antropometria.skinfold_tricep') }}</label>
                    <input id="skinfold_tricep" type="number" class="form-control" name="skinfold_tricep">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="skinfold_chest">{{ __('antropometria.skinfold_chest') }}</label>
                    <input id="skinfold_chest" type="number" class="form-control" name="skinfold_chest">
                  </div>
                  <div class="form-group col-6">
                    <label for="skinfold_axillary">{{ __('antropometria.skinfold_axillary') }}</label>
                    <input id="skinfold_axillary" type="number" class="form-control" name="skinfold_axillary">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="skinfold_suprailiac">{{ __('antropometria.skinfold_suprailiac') }}</label>
                    <input id="skinfold_suprailiac" type="number" class="form-control" name="skinfold_suprailiac">
                  </div>
                  <div class="form-group col-6">
                    <label for="skinfold_abdominal">{{ __('antropometria.skinfold_abdominal') }}</label>
                    <input id="skinfold_abdominal" type="number" class="form-control" name="skinfold_abdominal">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="skinfold_thigh">{{ __('antropometria.skinfold_thigh') }}</label>
                    <input id="skinfold_thigh" type="number" class="form-control" name="skinfold_thigh">
                  </div>
                  <div class="form-group col-6">
                    <label for="skinfold_calves">{{ __('antropometria.skinfold_calves') }}</label>
                    <input id="skinfold_calves" type="number" class="form-control" name="skinfold_calves">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-12 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('antropometria.save_evaluation') }}</button>
                  </div>
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
