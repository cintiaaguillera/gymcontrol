<?php

use Illuminate\Database\Seeder;
use App\Models\TipoFuncionario;

class TipoFuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoFuncionario::create([
            'descricao'=>'Instrutor',
        ]);

        TipoFuncionario::create([
            'descricao'=>'Recepcionista',
        ]);

        TipoFuncionario::create([
            'descricao'=>'Atendente',
        ]);
    }
}
