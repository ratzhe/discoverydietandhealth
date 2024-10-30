@extends('patient.layout.master')

@section('title', 'Visualizar Antropometria')

@section('content')
<div class="container mt-5">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Visualizar Antropometria') }}</h4>
            </div>
            <div class="card-body">
                <!-- Exibição dos dados da antropometria -->
                <div class="row">
                    <div class="form-group col-6">
                        <label for="weight">Data</label>
                        <input type="text" id="weight" class="form-control" value="{{ $antropometria->weight }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="weight">Peso</label>
                        <input type="text" id="weight" class="form-control" value="{{ $antropometria->weight }} kg" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="height">Altura</label>
                        <input type="text" id="height" class="form-control" value="{{ $antropometria->height }} cm" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="bmi">IMC</label>
                        <input type="text" id="bmi" class="form-control" value="{{ $antropometria->bmi }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="lean_mass">Massa Magra (kg)</label>
                        <input type="text" id="lean_mass" class="form-control" value="{{ $antropometria->lean_mass }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="fat_mass">Massa Gorda (kg)</label>
                        <input type="text" id="fat_mass" class="form-control" value="{{ $antropometria->fat_mass }}" readonly>
                    </div>
                </div>

                <h6>Circunferências</h6>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="shoulder_circumference">Ombros (cm)</label>
                        <input type="text" id="shoulder_circumference" class="form-control" value="{{ $antropometria->shoulder_circumference }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="chest_circumference">Peitoral (cm)</label>
                        <input type="text" id="chest_circumference" class="form-control" value="{{ $antropometria->chest_circumference }}" readonly>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="waist_circumference">Cintura (cm)</label>
                        <input type="text" id="waist_circumference" class="form-control" value="{{ $antropometria->waist_circumference }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="abdomen_circumference">Abdômen (cm)</label>
                        <input type="text" id="abdomen_circumference" class="form-control" value="{{ $antropometria->abdomen_circumference }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="hip_circumference">Quadril (cm)</label>
                        <input type="text" id="hip_circumference" class="form-control" value="{{ $antropometria->hip_circumference }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="right_arm_circumference">Braço Direito (cm)</label>
                        <input type="text" id="right_arm_circumference" class="form-control" value="{{ $antropometria->right_arm_circumference }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="right_forearm_circumference">Antebraço Direito (cm)</label>
                        <input type="text" id="right_forearm_circumference" class="form-control" value="{{ $antropometria->right_forearm_circumference }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="right_thigh_circumference">Coxa Direita (cm)</label>
                        <input type="text" id="right_thigh_circumference" class="form-control" value="{{ $antropometria->right_thigh_circumference }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="right_calf_circumference">Panturrilha Direita (cm)</label>
                        <input type="text" id="right_calf_circumference" class="form-control" value="{{ $antropometria->right_calf_circumference }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="left_arm_circumference">Braço Esquerdo (cm)</label>
                        <input type="text" id="left_arm_circumference" class="form-control" value="{{ $antropometria->left_arm_circumference }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="left_forearm_circumference">Antebraço Esquerdo (cm)</label>
                        <input type="text" id="left_forearm_circumference" class="form-control" value="{{ $antropometria->left_forearm_circumference }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="left_thigh_circumference">Coxa Esquerda (cm)</label>
                        <input type="text" id="left_thigh_circumference" class="form-control" value="{{ $antropometria->left_thigh_circumference }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="left_calf_circumference">Panturrilha Esquerda (cm)</label>
                        <input type="text" id="left_calf_circumference" class="form-control" value="{{ $antropometria->left_calf_circumference }}" readonly>
                    </div>
                </div>

                <h6>Dobras Cutâneas</h6>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="skinfold_subscapular">Subescapular (mm)</label>
                        <input type="text" id="skinfold_subscapular" class="form-control" value="{{ $antropometria->skinfold_subscapular }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="skinfold_tricep">Triciptal (mm)</label>
                        <input type="text" id="skinfold_tricep" class="form-control" value="{{ $antropometria->skinfold_tricep }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="skinfold_chest">Peitoral (mm)</label>
                        <input type="text" id="skinfold_chest" class="form-control" value="{{ $antropometria->skinfold_chest }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="skinfold_axillary">Axilar Média (mm)</label>
                        <input type="text" id="skinfold_axillary" class="form-control" value="{{ $antropometria->skinfold_axillary }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="skinfold_suprailiac">Supra-ilíaca (mm)</label>
                        <input type="text" id="skinfold_suprailiac" class="form-control" value="{{ $antropometria->skinfold_suprailiac }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="skinfold_abdominal">Abdominal (mm)</label>
                        <input type="text" id="skinfold_abdominal" class="form-control" value="{{ $antropometria->skinfold_abdominal }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="skinfold_thigh">Coxa (mm)</label>
                        <input type="text" id="skinfold_thigh" class="form-control" value="{{ $antropometria->skinfold_thigh }}" readonly>
                    </div>

                    <div class="form-group col-6">
                        <label for="skinfold_calves">Panturrilha (mm)</label>
                        <input type="text" id="skinfold_calves" class="form-control" value="{{ $antropometria->skinfold_calves }}" readonly>
                    </div>
                </div>

                <!-- Botão para baixar em PDF -->
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{ route('patient.antropometria.download', $antropometria->id) }}" class="btn btn-success">Baixar em PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
