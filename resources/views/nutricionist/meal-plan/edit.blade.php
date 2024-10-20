@extends('nutricionist.layout.master')

@section('content')
<div class="container">
    <h2>Editar Plano Alimentar</h2>

    <form action="{{ route('nutricionist.meal-plan.update', $mealPlan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Selecione o Paciente:</label>
            <select name="patient_id" class="form-control" required>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $patient->id == $mealPlan->patient_id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo para cada refeição -->
        <div class="row">
            <div class="form-group col-6">
                <label>Café da Manhã:</label>
                <div id="breakfast-wrapper">
                    @foreach($mealPlan->foodItems->where('meal_type', 'breakfast') as $item)
                        <input type="text" name="breakfast[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addInput('breakfast')">Adicionar mais</button>
            </div>

            <div class="form-group col-6">
                <label>Lanche da Manhã:</label>
                <div id="morning_snack-wrapper">
                    @foreach($mealPlan->foodItems->where('meal_type', 'morning_snack') as $item)
                        <input type="text" name="morning_snack[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addInput('morning_snack')">Adicionar mais</button>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label>Almoço:</label>
                <div id="lunch-wrapper">
                    @foreach($mealPlan->foodItems->where('meal_type', 'lunch') as $item)
                        <input type="text" name="lunch[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addInput('lunch')">Adicionar mais</button>
            </div>

            <div class="form-group col-6">
                <label>Lanche da Tarde:</label>
                <div id="afternoon_snack-wrapper">
                    @foreach($mealPlan->foodItems->where('meal_type', 'afternoon_snack') as $item)
                        <input type="text" name="afternoon_snack[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addInput('afternoon_snack')">Adicionar mais</button>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-6">
                <label>Jantar:</label>
                <div id="dinner-wrapper">
                    @foreach($mealPlan->foodItems->where('meal_type', 'dinner') as $item)
                        <input type="text" name="dinner[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addInput('dinner')">Adicionar mais</button>
            </div>

            <div class="form-group col-6">
                <label>Ceia:</label>
                <div id="supper-wrapper">
                    @foreach($mealPlan->foodItems->where('meal_type', 'supper') as $item)
                        <input type="text" name="supper[]" class="form-control mt-2" value="{{ $item->food_item }}" required>
                    @endforeach
                </div>
                <button type="button" class="btn btn-sm btn-primary" onclick="addInput('supper')">Adicionar mais</button>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Atualizar Plano Alimentar</button>
    </form>
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
