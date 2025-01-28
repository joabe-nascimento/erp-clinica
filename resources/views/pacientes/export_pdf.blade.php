<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exportar Pacientes</title>
    <style>
        /* Ajuste o estilo conforme desejar */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #666;
            padding: 8px;
        }
        th {
            background: #ccc;
        }
    </style>
</head>
<body>
    <h1>Relatório de Pacientes</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->data_nascimento }}</td>
                <td>{{ $paciente->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
