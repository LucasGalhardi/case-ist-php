<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Support\Facades\Storage;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $alunos = Aluno::with('turma')
            ->where('nome', 'like', '%' . $request->query('nome', '') . '%')
            ->orderBy('nome')
            ->paginate(10);
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        $turmas = Turma::all();
        $aluno = new \App\Models\Aluno();

        return view('alunos.create', compact('turmas', 'aluno'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|unique:alunos,email',
            'turma_id' => 'required|exists:turmas,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aluno = new Aluno($request->except('_token'));
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $path = $request->imagem->store('alunos', 'public');
            $aluno->imagem = $path;
        }
        $aluno->save();

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso.');
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function destroy(Aluno $aluno)
    {
        if ($aluno->imagem) {
            Storage::delete($aluno->imagem);
        }
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno deletado com sucesso.');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        $turmas = Turma::all();

        return view('alunos.edit', compact('aluno', 'turmas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|unique:alunos,email,' . $id,
            'turma_id' => 'required|exists:turmas,id',
            'imagem' => 'nullable|image|max:10240',
        ]);

        $aluno = Aluno::findOrFail($id);

        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->turma_id = $request->turma_id;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $path = $request->imagem->store('alunos', 'public');
            $aluno->imagem = $path;
        }

        $aluno->save();

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

}
