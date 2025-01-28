@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Pacientes</h1>

    <!-- Barra de busca -->
    <form action="{{ route('pacientes.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nome ou email..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

  <!-- Botões de exportação -->
<div class="mb-3">
    <!-- Botão PDF -->
    <a href="{{ route('pacientes.export', 'pdf') }}" class="btn btn-danger">
        <i class="bi bi-file-earmark-pdf-fill"></i> <!-- Ícone de PDF -->
        Exportar PDF
    </a>
    
    <!-- Botão CSV -->
    <a href="{{ route('pacientes.export', 'csv') }}" class="btn btn-success">
        <i class="bi bi-filetype-csv"></i> <!-- Ícone de CSV (disponível em Bootstrap Icons mais recentes) -->
        Exportar CSV
    </a>
</div>


    <!-- Alerta de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Tabela ou cards de pacientes (exemplo simplificado) -->
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
            @forelse($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->nome }}</td>
                    <td>{{ $paciente->data_nascimento }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">Nenhum paciente encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginação -->
    <div class="mt-3">
        {{ $pacientes->links() }}
    </div>
</div>
@endsection
