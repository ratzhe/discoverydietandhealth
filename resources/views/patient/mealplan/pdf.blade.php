<!DOCTYPE html>
<html>
<head>
    <title>Plano Alimentar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .table th {
            background-color: #f8f8f8;
            font-weight: bold;
        }
        .section-title {
            font-size: 18px;
            margin-top: 20px;
            color: #555;
            text-align: left;
        }
    </style>
</head>
<body>
    <header>
        Relatório gerado em: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
    </header>

    <div class="container">
        <h1>Plano Alimentar</h1>

        <h2 class="section-title">Informações do Plano</h2>
        <table class="table">
            <tr>
                <th>Data do Plano</th>
                <td>{{ $mealplan->patient->name }}</td>
            </tr>
            <tr>
                <th>Nutricionista</th>
                <td>{{ $mealplan->nutricionist->name }}</td>
            </tr>
        </table>

        <h2 class="section-title">Refeições</h2>

        @foreach(['Café da Manhã' => 'breakfast', 'Lanche da Manhã' => 'morning_snack', 'Almoço' => 'lunch', 'Lanche da Tarde' => 'afternoon_snack', 'Jantar' => 'dinner', 'Ceia' => 'supper'] as $label => $mealType)
            @php
                $mealItems = $mealplan->foodItems->where('meal_type', $mealType);
            @endphp
            @if($mealItems->isNotEmpty())
                <div class="section-title">{{ $label }}</div>
                <table class="table">
                    @foreach($mealItems as $index => $item)
                        <tr>
                            <td>Opção {{ $index + 1 }}</td>
                            <td>{{ $item->food_item }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        @endforeach
    </div>
</body>
</html>
