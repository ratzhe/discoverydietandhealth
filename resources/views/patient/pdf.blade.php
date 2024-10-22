<!DOCTYPE html>
<html>
<head>
    <title>Anamnese</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Anamnese</h1>
    <table>
        <tr>
            <th>Data</th>
            <td>{{ $anamnese->anamnese_date }}</td>
        </tr>
        <tr>
            <th>Peso</th>
            <td>{{ $anamnese->weight }}</td>
        </tr>
        <tr>
            <th>Altura</th>
            <td>{{ $anamnese->height }}</td>
        </tr>
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
        <tr>
            <th>Objetivos de Curto Prazo</th>
            <td>{{ $anamnese->short_term_goal }}</td>
        </tr>
        <tr>
            <th>Objetivos de Longo Prazo</th>
            <td>{{ $anamnese->long_term_goal }}</td>
        </tr>
        <!-- Adicione mais campos conforme necessário -->
    </table>
</body>
</html>
