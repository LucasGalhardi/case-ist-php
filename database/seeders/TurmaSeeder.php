<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $turmas = [
            ['nome' => 'Turma 1', 'descricao' => 'Descrição dessa turma aqui'],
            ['nome' => 'Turma 2', 'descricao' => 'Descrição dessa turma aqui'],
            ['nome' => 'Turma 3', 'descricao' => 'Descrição dessa turma aqui'],
            ['nome' => 'Turma 4', 'descricao' => 'Descrição dessa turma aqui'],
            ['nome' => 'Turma 5', 'descricao' => 'Descrição dessa turma aqui'],
        ];

        DB::table('turmas')->insert($turmas);
    }
}
