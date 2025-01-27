@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Paciente</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $paciente->nome }}</h5>
            <p class="card-text"><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</p>
            <p class="card-text"><strong>Telefone:</strong> {{ $paciente->telefone ?? 'Não informado' }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $paciente->email ?? 'Não informado' }}</p>
            <p class="card-text"><strong>Endereço:</strong> {{ $paciente->endereco ?? 'Não informado' }}</p>
            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</div>
@endsection
