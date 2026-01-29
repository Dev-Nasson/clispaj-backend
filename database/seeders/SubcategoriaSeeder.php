<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategoria;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){


      //  \App\Models\Subcategoria::factory(30)->create();


            $subcategorias = [

                ['nome' => 'Informática','categoria_id'=>1],
                ['nome' => 'Civil','categoria_id'=>1],
                ['nome' => 'Mecânica','categoria_id'=>1],
                ['nome' => 'Industrial E Sistemas Elêctrico','categoria_id'=>1],
                ['nome' => 'Recursos Naturais E Ambiente','categoria_id'=>1],
                ['nome' => 'Enfermagem','categoria_id'=>2],
                ['nome' => 'Nutrição','categoria_id'=>2],
                ['nome' => 'Fisioterapia','categoria_id'=>2],
                ['nome' => 'Odontologia','categoria_id'=>2],
                ['nome' => 'Psicologia','categoria_id'=>2],
                ['nome' => 'Educação Física','categoria_id'=>2],
                ['nome' => 'Administração','categoria_id'=>3],
                ['nome' => 'Economia','categoria_id'=>3],
                ['nome' => 'Ciências Contábeis','categoria_id'=>3],
                ['nome' => 'Marketing','categoria_id'=>3],
                ['nome' => 'Gestão De Recursos Humanos','categoria_id'=>3],
                ['nome' => 'Matemática','categoria_id'=>4],
                ['nome' => 'Ciência Da Computação','categoria_id'=>4],
                ['nome' => 'Banco De Dados','categoria_id'=>4],
                ['nome' => 'Administração De Redes','categoria_id'=>4],
                ['nome' => 'Análise E Desenvolvimento De Sistemas','categoria_id'=>4],


            ];

            foreach ($subcategorias as $value) {
                Subcategoria::create($value);
            }



    }
}
