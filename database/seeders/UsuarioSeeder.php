<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password = bcrypt('12345678');

        //Admin
        Usuario::create([
            'nombre' => 'Ricky Ramirez',
            'email' => 'ricky@gmail.com',
            'password' => $password,
            'telefono' => '70045678',
            'direccion' => 'Av. Siempre Viva 123',
        ]);

        Usuario::create([
            'nombre' => 'Juan Perez',
            'email' => 'juan@gmail.com',
            'password' => $password,
            'telefono' => '60045678',
            'direccion' => 'Av. Siempre Viva 456',
        ]);

    }
}
