<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir 5 categorías
        $categorias = [
            'Ficción',
            'No Ficción',
            'Historia',
            'Ciencia',
            'Arte',
        ];

        foreach ($categorias as $nombre) {
            $cat = Categoria::create(['nombre' => $nombre]);

            // Crear 3 libros por categoría (ejemplos simples)
            for ($i = 1; $i <= 3; $i++) {
                Libro::create([
                    'titulo'       => "Libro {$i} de {$nombre}",
                    'autor'        => "Autor {$i}",
                    'anio'         => 2000 + $i,
                    'categoria_id' => $cat->id,
                    'disponible'   => true,
                ]);
            }
        }
    }
}
