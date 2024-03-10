<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

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
        return view('alunos.create', compact('turmas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|email|unique:alunos,email',
            'turma_id' => 'required|exists:turmas,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aluno = new Aluno($request->all());
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $aluno->imagem = $request->imagem->store('alunos');
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

}
