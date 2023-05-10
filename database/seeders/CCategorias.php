<?php

namespace Database\Seeders;
use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CCategorias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorias::create([
            
            'name' => 'A - Tracto alimentario y metabolismo',
            
        ]);
        Categorias::create([
            
            'name' => 'B - Sangre y órganos hematopoyéticos',
            
        ]);
        Categorias::create([
            
            'name' => 'C - Sistema cardiovascular',
            
        ]);
        Categorias::create([
            
            'name' => 'D - Dermatológicos',
            
        ]);
        Categorias::create([
            
            'name' => 'G - Sistema genitourinario y hormonas sexuales',
            
        ]);
        Categorias::create([
            
            'name' => 'H - Preparados hormonales sistémicos, excluyendo hormonas sexuales e insulinas',
            
        ]);
        Categorias::create([
            
            'name' => 'J - Antiinfecciosos para uso sistémico',
            
        ]);
        Categorias::create([
            
            'name' => 'L - Antineoplásicos e inmunomoduladores',
            
        ]);
        Categorias::create([
            
            'name' => 'M - Sistema musculoesquelético',
            
        ]);
        Categorias::create([
            
            'name' => 'N - Sistema nervioso',
            
        ]);
        Categorias::create([
            
            'name' => 'P - Antiparasitarios, insecticidas y repelentes',
            
        ]);
        Categorias::create([
            
            'name' => 'R - Sistema respiratorio',
            
        ]);
        Categorias::create([
            
            'name' => 'S - Órganos de los sentidos',
            
        ]);
        Categorias::create([
            
            'name' => 'V - Varios',
            
        ]);
        Categorias::create([
            
            'name' => 'W - Cosméticos',
            
        ]);
        Categorias::create([
            
            'name' => 'X - Alimentos y dietéticos',
            
        ]);
        Categorias::create([
            
            'name' => 'Otro',
            
        ]);
    }
    
}
