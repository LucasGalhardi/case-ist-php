{{-- resources/views/alunos/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Adicionar Aluno</h1>
        <form action="{{ route('alunos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('alunos.form')
        </form>
    </div>
@endsection
