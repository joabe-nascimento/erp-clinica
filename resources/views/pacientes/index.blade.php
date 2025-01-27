@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pacientes</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Adicionar Paciente</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este paciente?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if($pacientes->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Nenhum paciente encontrado.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
