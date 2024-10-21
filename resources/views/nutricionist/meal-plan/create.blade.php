@extends('nutricionist.layout.master')

@section('title', __('meal_plan.create_meal_plan') . ' - DDH')

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
            <div class="card-header">
              <h4>{{ __('meal_plan.create_meal_plan') }}</h4>
            </div>

            <div class="card-body">
              <form action="{{ route('nutricionist.meal-plan.store') }}" method="POST">
                @csrf

                <!-- Seleção de Paciente -->
                <div class="row">
                    <div class="form-group col-12">
                      <label for="patient_id">{{ __('meal_plan.select_patient') }}</label>
                      <select name="patient_id" class="form-control" required>
                          @foreach($patients as $patient)
                              <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>

                <!-- Campos para as refeições -->
                <div class="row">
                  <div class="form-group col-6">
                    <label>{{ __('meal_plan.breakfast') }}</label>
                    <div id="breakfast-wrapper">
                        <input type="text" name="breakfast[]" class="form-control" placeholder="Ex: Pão, café" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addInput('breakfast')">{{ __('meal_plan.add_more') }}</button>
                  </div>

                  <div class="form-group col-6">
                    <label>{{ __('meal_plan.morning_snack') }}</label>
                    <div id="morning_snack-wrapper">
                        <input type="text" name="morning_snack[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addInput('morning_snack')">{{ __('meal_plan.add_more') }}</button>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label>{{ __('meal_plan.lunch') }}</label>
                    <div id="lunch-wrapper">
                        <input type="text" name="lunch[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addInput('lunch')">{{ __('meal_plan.add_more') }}</button>
                  </div>

                  <div class="form-group col-6">
                    <label>{{ __('meal_plan.afternoon_snack') }}</label>
                    <div id="afternoon_snack-wrapper">
                        <input type="text" name="afternoon_snack[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addInput('afternoon_snack')">{{ __('meal_plan.add_more') }}</button>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label>{{ __('meal_plan.dinner') }}</label>
                    <div id="dinner-wrapper">
                        <input type="text" name="dinner[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addInput('dinner')">{{ __('meal_plan.add_more') }}</button>
                  </div>

                  <div class="form-group col-6">
                    <label>{{ __('meal_plan.supper') }}</label>
                    <div id="supper-wrapper">
                        <input type="text" name="supper[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addInput('supper')">{{ __('meal_plan.add_more') }}</button>
                  </div>
                </div>

                <button type="submit" class="btn btn-success">{{ __('meal_plan.save_meal_plan') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
    // Função para adicionar mais campos de input dinamicamente
    function addInput(mealType) {
        const wrapper = document.getElementById(mealType + '-wrapper');

        // Criar um div para agrupar o input e o botão de remover
        const inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mt-2');

        // Criar o input
        const input = document.createElement('input');
        input.type = 'text';
        input.name = mealType + '[]';
        input.classList.add('form-control');

        // Criar o botão de remover
        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger');
        removeButton.innerHTML = '<i class="fas fa-trash"></i>'; // Ícone de lixeira
        removeButton.onclick = function() {
            wrapper.removeChild(inputGroup);
        };

        // Agrupar o input e o botão de remover
        inputGroup.appendChild(input);
        inputGroup.appendChild(removeButton);

        // Adicionar o grupo à área correspondente
        wrapper.appendChild(inputGroup);
    }
</script>


@endsection
