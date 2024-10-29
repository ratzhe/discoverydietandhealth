<!DOCTYPE html>
<html>
<head>
    <title>Anamnese</title>
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
        h1 {
            text-align: center;
            font-size: 24px;
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
        }
    </style>
</head>
<body>
    <header>
        Relatório gerado em: {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
    </header>
    
    <div class="container">
        <h1>Anamnese</h1>

        <h2 class="section-title">Informações Pessoais</h2>
        <table class="table">
            <tr>
                <th>Data</th>
                <td>{{ $anamnese->anamnese_date }}</td>
            </tr>
            <tr>
                <th>Peso</th>
                <td>{{ $anamnese->weight }} kg</td>
            </tr>
            <tr>
                <th>Altura</th>
                <td>{{ $anamnese->height }} m</td>
            </tr>
        </table>

        <h2 class="section-title">Histórico Médico</h2>
        <table class="table">
            <tr>
                <th>Doenças</th>
                <td>{{ $anamnese->diseases }}</td>
            </tr>
            <tr>
                <th>Alergias</th>
                <td>{{ $anamnese->allergies }}</td>
            </tr>
            <tr>
                <th>Medicamentos</th>
                <td>{{ $anamnese->medications }}</td>
            </tr>
            <tr>
                <th>Histórico Familiar</th>
                <td>{{ $anamnese->family_history }}</td>
            </tr>
        </table>

        <h2 class="section-title">Hábitos de Vida</h2>
        <table class="table">
            <tr>
                <th>Número de Refeições Diárias</th>
                <td>{{ $anamnese->meals_per_day }}</td>
            </tr>
            <tr>
                <th>Consumo de Água Diário (litros)</th>
                <td>{{ $anamnese->water_intake }}</td>
            </tr>
            <tr>
                <th>Consumo de Bebidas Alcoólicas</th>
                <td>{{ $anamnese->alcohol }}</td>
            </tr>
            <tr>
                <th>Consumo de Cafeína</th>
                <td>{{ $anamnese->caffeine }}</td>
            </tr>
        </table>

        <h2 class="section-title">Atividade Física</h2>
        <table class="table">
            <tr>
                <th>Pratica Atividade Física?</th>
                <td>{{ $anamnese->exercise }}</td>
            </tr>
            <tr>
                <th>Frequência Semanal</th>
                <td>{{ $anamnese->exercise_frequency }}</td>
            </tr>
        </table>

        <h2 class="section-title">Objetivos</h2>
        <table class="table">
            <tr>
                <th>Objetivos de Curto Prazo</th>
                <td>{{ $anamnese->short_term_goal }}</td>
            </tr>
            <tr>
                <th>Objetivos de Longo Prazo</th>
                <td>{{ $anamnese->long_term_goal }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
