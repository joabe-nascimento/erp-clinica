@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Pacientes</h1>

    <!-- Alerta de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão "Adicionar Paciente" -->
    <div class="mb-3">
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">
            Adicionar Paciente
        </a>
    </div>

    <!-- Tabela (visível em telas md ou maiores) -->
    <div class="table-responsive d-none d-md-block">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pacientes as $paciente)
                    <tr>
                        <td>{{ $paciente->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</td>
                        <td>{{ $paciente->email }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">
                                    Ver
                                </a>
                                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">
                                    Editar
                                </a>
                                <form action="{{ route('pacientes.destroy', $paciente->id) }}" 
                                      method="POST" 
                                      class="d-inline-block"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este paciente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum paciente encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Versão "empilhada" para telas menores que md -->
    <div class="d-md-none">
        @forelse($pacientes as $paciente)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-2">{{ $paciente->nome }}</h5>
                    <p class="mb-1">
                        <strong>Data de Nascimento:</strong> 
                        {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}
                    </p>
                    <p class="mb-2">
                        <strong>Email:</strong> {{ $paciente->email }}
                    </p>
                    <!-- Botões de Ação logo abaixo -->
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm">
                            Ver
                        </a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" 
                              method="POST" 
                              class="d-inline-block"
                              onsubmit="return confirm('Tem certeza que deseja excluir este paciente?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">
                Nenhum paciente encontrado.
            </div>
        @endforelse
    </div>
</div>
@endsection
