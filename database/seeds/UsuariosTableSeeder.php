<?php

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nome'=>'Cintia',
            'email'=>'cintia@hotmail.com',
            'senha'=> Hash::make('12345'),
        ]);

        Usuario::create([
            'nome'=>'Aguilera',
            'email'=>'aguillera@hotmail.com',
            'senha'=> Hash::make('12345'),
        ]);

        Usuario::create([
            'nome'=>'Ruan',
            'email'=>'ruan@hotmail.com',
            'senha'=> Hash::make('12345'),
        ]);
    }
}
