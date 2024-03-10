@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $aluno->exists ? route('alunos.update', $aluno->id) : route('alunos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($aluno->exists)
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $aluno->nome) }}" required maxlength="100">
    </div>

    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $aluno->email) }}" required>
    </div>

    <div class="form-group">
        <label for="turma_id">Turma:</label>
        <select class="form-control" id="turma_id" name="turma_id" required>
            <option value="">Selecione uma Turma</option>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{ (old('turma_id', $aluno->turma_id) == $turma->id) ? 'selected' : '' }}>
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="imagem">Imagem:</label>
        <input type="file" class="form-control-file" id="imagem" name="imagem">
        @if($aluno->imagem)
            <div>
                <img src="{{ asset('storage/' . $aluno->imagem) }}" alt="Imagem do Aluno" style="max-height: 200px;">
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ $aluno->exists ? 'Atualizar' : 'Cadastrar' }}</button>
</form>
