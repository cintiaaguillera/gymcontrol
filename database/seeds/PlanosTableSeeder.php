<?php

use Illuminate\Database\Seeder;
use App\Models\Plano;

class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plano::create([
            'nome'=>'Mensal',
            'descricao'=>'O pagamento deverá ser efetuado todos os meses',
            'valor'=> 120.00,
        ]);

        Plano::create([
            'nome'=>'Trimestral',
            'descricao'=>'O pagamento será feito a cada três meses',
            'valor'=> 600.00,
        ]);

        Plano::create([
            'nome'=>'Anual',
            'descricao'=>'Pagamento na contratação do plano',
            'valor'=> 1000.00,
        ]);
    }
}
