{{-- resources/views/alunos/edit.blade.php --}}
@extends('layouts.app')
{{--@include('alunos.form', ['aluno' => $aluno])--}}

@section('content')
    <div class="container">
        <h1>Editar Aluno</h1>
        <form action="{{ route('alunos.update', $aluno->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('alunos.form', ['aluno' => $aluno])
        </form>
    </div>
@endsection
