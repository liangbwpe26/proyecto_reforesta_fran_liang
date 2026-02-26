<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReforestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un Admin por defecto para tus pruebas
        \App\Models\User::create([
            'nick' => 'EcoAdmin',
            'name' => 'Admin',
            'apellidos' => 'Sistema',
            'email' => 'admin@reforesta.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
            'karma' => 100
        ]);

        // Crear Beneficios básicos (Requisito CRUD)
        \App\Models\Beneficio::insert([
            ['nombre' => 'Captura de CO2', 'descripcion' => 'Ayuda a mitigar el cambio climático.'],
            ['nombre' => 'Prevención de Erosión', 'descripcion' => 'Las raíces fijan el suelo en laderas.'],
        ]);

        // Crear Especies de ejemplo (Requisito CRUD)
        \App\Models\Especie::create([
            'nombre' => 'Encina',
            'nombre_cientifico' => 'Quercus ilex',
            'clima' => 'Mediterráneo',
            'region_origen' => 'Península Ibérica',
            'tiempo_adultez' => '20-50 años',
            'beneficios_descripcion' => 'Gran resistencia a la sequía y producción de bellotas.',
        ]);
    }
}
