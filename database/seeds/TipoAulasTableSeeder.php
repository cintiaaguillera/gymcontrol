<?php

use Illuminate\Database\Seeder;
use App\Models\Aula;

class TipoAulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aula::create([
            'nome'=>'Individual',
        ]);

        Aula::create([
            'nome'=>'Coletiva',
        ]);

        Aula::create([
            'nome'=>'Grupo',
        ]);

        Aula::create([
            'nome'=> 'Jiu-Jitsu',
        ]);
        Aula::create([
            'nome'=> 'Karate',
        ]);
        Aula::create([
            'nome'=> 'Muaitai',
        ]);
        Aula::create([
            'nome'=> 'Box',
        ]);

        Aula::create([
            'nome'=> 'Box Tailandes',
        ]);

        Aula::create([
            'nome'=> 'Ginástica Clássica',
        ]);

        Aula::create([
            'nome'=> 'Ginástica Olímpica',
        ]);
    }
}
