@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Informações do {{ $aluno->nome }}</div>

                    <div class="card-body">
                        <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
                        <p><strong>Sobrenome:</strong> {{ $aluno->sobrenome }}</p>
                        <p><strong>E-mail:</strong> {{ $aluno->email }}</p>
                        <p><strong>Turma:</strong> {{ $aluno->turma->nome }}</p>

                        @if($aluno->imagem)
                            <div>
                                <strong>Imagem:</strong><br>
                                <img src="{{ asset('storage/' . $aluno->imagem) }}" alt="Imagem do Aluno" style="max-width: 100px; max-height: 100px; width: auto; height: auto;">
                            </div>
                        @else
                            <p>Nenhuma imagem disponível.</p>
                        @endif

                        <a href="{{ route('alunos.index') }}" class="btn btn-primary">Voltar para a lista de alunos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
