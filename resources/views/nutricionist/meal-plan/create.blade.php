@extends('nutricionist.layout.master')

@section('content')
    <div class="container">
        <h1>Criar Plano Alimentar</h1>

        <form action="{{ route('nutricionist.meal-plan.store') }}" method="POST">
            @csrf
            <input type="hidden" name="nutricionist_id" value="{{ auth()->user()->id }}">

            <input type="hidden" name="meal_type" value="Almoço">

            <div class="form-group">
                <label for="patient_id">Selecione o Paciente</label>
                <select name="patient_id" id="patient_id" class="form-control">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>

            <div id="food-card-container">
                <div class="card food-card mb-3">
                    <div class="card-body">
                        <label for="food_items[]">Comida</label>
                        <input type="text" name="food_items[]" class="form-control" placeholder="Digite o alimento" id="food_item_1">
                    </div>
                </div>
            </div>

            <button type="button" id="add-food-card" class="btn btn-primary mt-2">Adicionar mais comida</button>
            <button type="submit" class="btn btn-success mt-2">Salvar Plano</button>
        </form>
    </div>

    <script>
        let cardCount = 1;
        const maxCards = 7;

        document.getElementById('add-food-card').addEventListener('click', function() {
            if (cardCount < maxCards) {
                cardCount++;
                const container = document.getElementById('food-card-container');
                const newCard = document.querySelector('.food-card').cloneNode(true);

                newCard.querySelector('input').value = ''; // Limpar o campo de input
                newCard.querySelector('input').setAttribute('name', 'food_items[]');
                newCard.querySelector('input').setAttribute('id', 'food_item_' + cardCount);

                container.appendChild(newCard);
            } else {
                alert('Você só pode adicionar até 7 opções de comida.');
            }
        });
    </script>
@endsection
