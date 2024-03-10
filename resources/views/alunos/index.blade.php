{{-- resources/views/alunos/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alunos</h1>
        <a href="{{ route('alunos.create') }}" class="btn btn-primary">Adicionar Aluno</a>
        <div class="mt-3">
            <form action="{{ route('alunos.index') }}" method="GET" class="form-inline">
                <div class="form-group">
                    <input type="text" name="nome" class="form-control" placeholder="Buscar por nome" value="{{ request()->query('nome') }}">
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
        </div>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Turma</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->nome }}</td>
                    <td>{{ $aluno->email }}</td>
                    <td>{{ $aluno->turma->nome }}</td>
                    <td>
                        <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-success">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $alunos->links() }}
    </div>
@endsection
