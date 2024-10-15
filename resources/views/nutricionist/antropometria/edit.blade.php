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
                        <input id="antropometria_date" type="date" class="form-control" name="antropometria_date" value="{{ old('antropometria_date', $antropometria->antropometria_date) }}">
                    </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="weight">Peso (kg)</label>
                    <input id="weight" type="number" class="form-control" name="weight" value="{{ old('weight', $antropometria->weight) }}">
                  </div>
                  <div class="form-group col-6">
                    <label for="height">Altura (m)</label>
                    <input id="height" type="number" class="form-control" name="height" value="{{ old('height', $antropometria->height) }}">
                  </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                      <label for="bmi">IMC</label>
                      <input id="bmi" type="text" class="form-control" name="bmi" value="{{ old('bmi', $antropometria->bmi) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="lean_mass">Massa Magra (kg)</label>
                      <input id="lean_mass" type="number" step="0.1" class="form-control" name="lean_mass" value="{{ old('lean_mass', $antropometria->lean_mass) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="fat_mass">Massa Gorda (kg)</label>
                      <input id="fat_mass" type="number" step="0.1" class="form-control" name="fat_mass" value="{{ old('fat_mass', $antropometria->fat_mass) }}">
                    </div>
                  </div>

                <h5>Circunferências (cm)</h5>

                <div class="row">
                    <div class="form-group col-6">
                      <label for="shoulder_circumference">Ombros </label>
                      <input id="shoulder_circumference" type="number" class="form-control" name="shoulder_circumference" value="{{ old('shoulder_circumference', $antropometria->shoulder_circumference) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="chest_circumference">Peitoral </label>
                      <input id="chest_circumference" type="number" class="form-control" name="chest_circumference" value="{{ old('chest_circumference', $antropometria->chest_circumference) }}">
                    </div>
                  </div>

                <div class="row">
                    <div class="form-group col-6">
                      <label for="waist_circumference">Cintura </label>
                      <input id="waist_circumference" type="number" class="form-control" name="waist_circumference" value="{{ old('waist_circumference', $antropometria->waist_circumference) }}" >
                    </div>
                    <div class="form-group col-6">
                      <label for="abdomen_circumference">Abdômen </label>
                      <input id="abdomen_circumference" type="number" class="form-control" name="abdomen_circumference" value="{{ old('abdomen_circumference', $antropometria->abdomen_circumference) }}" >
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="hip_circumference">Quadril </label>
                      <input id="hip_circumference" type="number" class="form-control" name="hip_circumference" value="{{ old('hip_circumference', $antropometria->hip_circumference) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="right_arm_circumference">Braço Direito </label>
                      <input id="right_arm_circumference" type="number" class="form-control" name="right_arm_circumference" value="{{ old('right_arm_circumference', $antropometria->right_arm_circumference) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="right_forearm_circumference">Antebraço Direito </label>
                      <input id="right_forearm_circumference" type="number" class="form-control" name="right_forearm_circumference" value="{{ old('right_forearm_circumference', $antropometria->right_forearm_circumference) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="right_thigh_circumference">Coxa Direita </label>
                      <input id="right_thigh_circumference" type="number" class="form-control" name="right_thigh_circumference" value="{{ old('right_thigh_circumference', $antropometria->right_thigh_circumference) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="right_calf_circumference">Panturrilha Direita </label>
                      <input id="right_calf_circumference" type="number" class="form-control" name="right_calf_circumference" value="{{ old('right_calf_circumference', $antropometria->right_calf_circumference) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="left_arm_circumference">Braço Esquerdo </label>
                      <input id="left_arm_circumference" type="number" class="form-control" name="left_arm_circumference" value="{{ old('left_arm_circumference', $antropometria->left_arm_circumference) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="left_forearm_circumference">Antebraço Esquerdo </label>
                      <input id="left_forearm_circumference" type="number" class="form-control" name="left_forearm_circumference" value="{{ old('left_forearm_circumference', $antropometria->left_forearm_circumference) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="left_thigh_circumference">Coxa Esquerda </label>
                      <input id="left_thigh_circumference" type="number" class="form-control" name="left_thigh_circumference" value="{{ old('left_thigh_circumference', $antropometria->left_thigh_circumference) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="left_calf_circumference">Panturrilha Esquerda </label>
                      <input id="left_calf_circumference" type="number" class="form-control" name="left_calf_circumference" value="{{ old('left_calf_circumference', $antropometria->left_calf_circumference) }}">
                    </div>
                  </div>

                <!-- Circunferências Adicionais -->


                <h5>Dobras Cutâneas (cm)</h5>
                <div class="row">
                    <div class="form-group col-6">
                      <label for="skinfold_subscapular">Subescapular</label>
                      <input id="skinfold_subscapular" type="number" class="form-control" name="skinfold_subscapular" value="{{ old('skinfold_subscapular', $antropometria->skinfold_subscapular) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="skinfold_tricep">Triciptal</label>
                      <input id="skinfold_tricep" type="number" class="form-control" name="skinfold_tricep" value="{{ old('skinfold_tricep', $antropometria->skinfold_tricep) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="skinfold_chest">Peitoral</label>
                      <input id="skinfold_chest" type="number" class="form-control" name="skinfold_chest" value="{{ old('skinfold_chest', $antropometria->skinfold_chest) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="skinfold_axillary">Axilar Média </label>
                      <input id="skinfold_axillary" type="number" class="form-control" name="skinfold_axillary" value="{{ old('skinfold_axillary', $antropometria->skinfold_axillary) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="skinfold_suprailiac">Supra-ilíaca </label>
                      <input id="skinfold_suprailiac" type="number" class="form-control" name="skinfold_suprailiac" value="{{ old('skinfold_suprailiac', $antropometria->skinfold_suprailiac) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="skinfold_abdominal">Abdominal </label>
                      <input id="skinfold_abdominal" type="number" class="form-control" name="skinfold_abdominal" value="{{ old('skinfold_abdominal', $antropometria->skinfold_abdominal) }}">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="skinfold_thigh">Coxa </label>
                      <input id="skinfold_thigh" type="number" class="form-control" name="skinfold_thigh" value="{{ old('skinfold_thigh', $antropometria->skinfold_thigh) }}">
                    </div>
                    <div class="form-group col-6">
                      <label for="skinfold_calves">Panturrilha </label>
                      <input id="skinfold_calves" type="number" class="form-control" name="skinfold_calves" value="{{ old('skinfold_calves', $antropometria->skinfold_calves) }}">
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
