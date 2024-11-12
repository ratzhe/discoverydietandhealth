@extends('admin.layout.master')

@section('title', 'Editar Plano Alimentar - DDH')

@section('content')
<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Editar Plano Alimentar</h4>
            </div>

            <div class="card-body">
              <form method="POST" action="{{ route('admin.mealplan.update', $mealplan->id) }}">
                @csrf
                @method('PUT')

                <!-- Seleção de Paciente -->
                <div class="row">
                  <div class="form-group col-9">
                    <label for="patient_id">Selecione o Paciente</label>
                    <select id="patient_id" class="form-control" name="patient_id" required>
                      @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $patient->id == $mealplan->patient_id ? 'selected' : '' }}>
                          {{ $patient->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-3">
                    <label for="mealplan_date">Data do Plano Alimentar</label>
                    <input id="mealplan_date" type="date" class="form-control" name="mealplan_date" value="{{ $mealplan->mealplan_date }}" required>
                  </div>
                </div>

                <!-- Refeições -->
                <div class="row">
                  <div class="form-group col-6">
                    <label for="breakfast">Café da Manhã</label>
                    <div id="breakfast-wrapper">
                      @foreach($mealplan->foodItems->where('meal_type', 'breakfast') as $item)
                        <input type="text" name="breakfast[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                      @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addInput('breakfast')">Adicionar mais</button>
                  </div>

                  <div class="form-group col-6">
                    <label for="morning_snack">Lanche da Manhã</label>
                    <div id="morning_snack-wrapper">
                      @foreach($mealplan->foodItems->where('meal_type', 'morning_snack') as $item)
                        <input type="text" name="morning_snack[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                      @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addInput('morning_snack')">Adicionar mais</button>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="lunch">Almoço</label>
                    <div id="lunch-wrapper">
                      @foreach($mealplan->foodItems->where('meal_type', 'lunch') as $item)
                        <input type="text" name="lunch[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                      @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addInput('lunch')">Adicionar mais</button>
                  </div>

                  <div class="form-group col-6">
                    <label for="afternoon_snack">Lanche da Tarde</label>
                    <div id="afternoon_snack-wrapper">
                      @foreach($mealplan->foodItems->where('meal_type', 'afternoon_snack') as $item)
                        <input type="text" name="afternoon_snack[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                      @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addInput('afternoon_snack')">Adicionar mais</button>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-6">
                    <label for="dinner">Jantar</label>
                    <div id="dinner-wrapper">
                      @foreach($mealplan->foodItems->where('meal_type', 'dinner') as $item)
                        <input type="text" name="dinner[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                      @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addInput('dinner')">Adicionar mais</button>
                  </div>

                  <div class="form-group col-6">
                    <label for="supper">Ceia</label>
                    <div id="supper-wrapper">
                      @foreach($mealplan->foodItems->where('meal_type', 'supper') as $item)
                        <input type="text" name="supper[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                      @endforeach
                    </div>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addInput('supper')">Adicionar mais</button>
                  </div>
                </div>

                <button type="submit" class="btn btn-success">Atualizar Plano Alimentar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
function addInput(mealType) {
    const wrapper = document.getElementById(mealType + '-wrapper');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = mealType + '[]';
    input.classList.add('form-control', 'mt-2');
    wrapper.appendChild(input);
}
</script>

@endsection
