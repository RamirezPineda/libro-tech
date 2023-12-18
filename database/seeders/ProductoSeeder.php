<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Producto::create([
            'titulo' => 'El Señor de los Anillos: La Comunidad del Anillo',
            'descripcion' => 'La obra de Tolkien, difundida en millones de ejemplares, traducida a docenas de lenguas... una coherente mitología de una autenticidad universal creada en pleno siglo XX',
            'autor' => 'J.R.R. Tolkien',
            'imagen' => 'https://m.media-amazon.com/images/I/91ddMPYKaYL._AC_UF1000,1000_QL80_.jpg',
            'precio' => 80,
            'stock' => 100,
            'id_genero' => 2,
            'id_promocion' => 1
        ]);
        Producto::create([
            'titulo' => 'Juego de Tronos: Cancion de Hielo y Fuego',
            'descripcion' => 'Juego de tronos es el primer volumen de Canción de hielo y fuego, la monumental saga de fantasía épica del escritor George R. R. Martin que ha vendido más de 20 millones de ejemplares en todo el mundo',
            'autor' => 'George R.R. Martin',
            'imagen' => 'https://www.penguinlibros.com/uy/2385579-thickbox_default/juego-de-tronos-cancion-de-hielo-y-fuego-1.webp',
            'precio' => 90,
            'stock' => 100,
            'id_genero' => 2,
            'id_promocion' => 1
        ]);
        Producto::create([
            'titulo' => 'Guerra Mundial Z',
            'descripcion' => 'La crónica de cómo la humanidad se enfrentó a la peor amenaza jamás vista. El final estaba cerca, muy pocos vivieron para contarlo...',
            'autor' => 'Max Brooks',
            'imagen' => 'https://librosobrelibro.com/wp-content/uploads/2021/06/51FeTNGjE8L.jpeg',
            'precio' => 70,
            'stock' => 100,
            'id_genero' => 1,
            'id_promocion' => 1
        ]);
    }
}
