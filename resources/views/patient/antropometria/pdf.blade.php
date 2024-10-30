<!DOCTYPE html>
<html>
<head>
    <title>Antropometria</title>
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
        <h1>Antropometria</h1>

        <h2 class="section-title">Informações Pessoais</h2>
        <table class="table">
            <tr>
                <th>Data</th>
                <td>{{ $antropometria->weight }}</td>
            </tr>
            <tr>
                <th>Peso</th>
                <td>{{ $antropometria->weight }} kg</td>
            </tr>
            <tr>
                <th>Altura</th>
                <td>{{ $antropometria->height }} m</td>
            </tr>
            <tr>
                <th>IMC</th>
                <td>{{ $antropometria->bmi }} m</td>
            </tr>
            <tr>
                <th>Massa magra (kg)</th>
                <td>{{ $antropometria->lean_mass }} m</td>
            </tr>
            <tr>
                <th>Massa Gorda (kg)</th>
                <td>{{ $antropometria->fat_mass }} m</td>
            </tr>
        </table>

        <h2 class="section-title">Circunferências</h2>
        <table class="table">
            <tr>
                <th>Ombros (cm)</th>
                <td>{{ $antropometria->shoulder_circumference }}</td>
            </tr>
            <tr>
                <th>Peitoral (cm)</th>
                <td>{{ $antropometria->chest_circumference }}</td>
            </tr>
            <tr>
                <th>Cintura (cm)</th>
                <td>{{ $antropometria->waist_circumference }}</td>
            </tr>
            <tr>
                <th>Abdômen (cm)</th>
                <td>{{ $antropometria->abdomen_circumference }}</td>
            </tr>
            <tr>
                <th>Quadril (cm)</th>
                <td>{{ $antropometria->hip_circumference }}</td>
            </tr>
            <tr>
                <th>Braço Direito (cm)</th>
                <td>{{ $antropometria->right_arm_circumference }}</td>
            </tr>
            <tr>
                <th>Antebraço Direito (cm)</th>
                <td>{{ $antropometria->right_forearm_circumference }}</td>
            </tr>
            <tr>
                <th>Coxa Direita (cm)</th>
                <td>{{ $antropometria->right_thigh_circumference }}</td>
            </tr>
            <tr>
                <th>Panturrilha Direita (cm)</th>
                <td>{{ $antropometria->right_calf_circumference }}</td>
            </tr>
            <tr>
                <th>Braço Esquerdo (cm)</th>
                <td>{{ $antropometria->left_arm_circumference }}</td>
            </tr>
            <tr>
                <th>Antebraço Esquerdo (cm)</th>
                <td>{{ $antropometria->left_forearm_circumference }}</td>
            </tr>
            <tr>
                <th>Coxa Esquerda (cm)</th>
                <td>{{ $antropometria->left_thigh_circumference }}</td>
            </tr>
            <tr>
                <th>Panturrilha Esquerda (cm)</th>
                <td>{{ $antropometria->left_calf_circumference }}</td>
            </tr>
        </table>

        <h2 class="section-title">Dobras Cutâneas</h2>
        <table class="table">
            <tr>
                <th>Subescapular (mm)</th>
                <td>{{ $antropometria->skinfold_subscapular }}</td>
            </tr>
            <tr>
                <th>Triciptal (mm)</th>
                <td>{{ $antropometria->skinfold_tricep }}</td>
            </tr>
            <tr>
                <th>Peitoral (mm)</th>
                <td>{{ $antropometria->skinfold_chest }}</td>
            </tr>
            <tr>
                <th>Axilar Média (mm)</th>
                <td>{{ $antropometria->skinfold_axillary }}</td>
            </tr>
            <tr>
                <th>Supra-ilíaca (mm)</th>
                <td>{{ $antropometria->skinfold_suprailiac }}</td>
            </tr>
            <tr>
                <th>Abdominal (mm)</th>
                <td>{{ $antropometria->skinfold_abdominal }}</td>
            </tr>
            <tr>
                <th>Coxa (mm)</th>
                <td>{{ $antropometria->skinfold_abdominal }}</td>
            </tr>
            <tr>
                <th>Panturrilha (mm)</th>
                <td>{{ $antropometria->skinfold_calves }}</td>
            </tr>
        </table>


    </div>
</body>
</html>
