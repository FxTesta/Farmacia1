<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            
            'name' => 'A - Tracto alimentario y metabolismo',
            
        ]);
        Categoria::create([
            
            'name' => 'B - Sangre y órganos hematopoyéticos',
            
        ]);
        Categoria::create([
            
            'name' => 'C - Sistema cardiovascular',
            
        ]);
        Categoria::create([
            
            'name' => 'D - Dermatológicos',
            
        ]);
        Categoria::create([
            
            'name' => 'G - Sistema genitourinario y hormonas sexuales',
            
        ]);
        Categoria::create([
            
            'name' => 'H - Preparados hormonales sistémicos, excluyendo hormonas sexuales e insulinas',
            
        ]);
        Categoria::create([
            
            'name' => 'J - Antiinfecciosos para uso sistémico',
            
        ]);
        Categoria::create([
            
            'name' => 'L - Antineoplásicos e inmunomoduladores',
            
        ]);
        Categoria::create([
            
            'name' => 'M - Sistema musculoesquelético',
            
        ]);
        Categoria::create([
            
            'name' => 'N - Sistema nervioso',
            
        ]);
        Categoria::create([
            
            'name' => 'P - Antiparasitarios, insecticidas y repelentes',
            
        ]);
        Categoria::create([
            
            'name' => 'R - Sistema respiratorio',
            
        ]);
        Categoria::create([
            
            'name' => 'S - Órganos de los sentidos',
            
        ]);
        Categoria::create([
            
            'name' => 'V - Varios',
            
        ]);
        Categoria::create([
            
            'name' => 'W - Cosméticos',
            
        ]);
        Categoria::create([
            
            'name' => 'X - Alimentos y dietéticos',
            
        ]);
        Categoria::create([
            
            'name' => 'Otro',
            
        ]);
    }
}
