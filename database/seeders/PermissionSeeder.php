<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){


        $permissaos = [


        // Permissão geral
        ['name' => 'permissao.geral','group_name'=>'permissao'],




            // Permissão de usuairo
            ['name' => 'usuario.index','group_name'=>'usuario'],
            ['name' => 'usuario.create','group_name'=>'usuario'],
            ['name' => 'usuario.edit','group_name'=>'usuario'],
            ['name' => 'usuario.show','group_name'=>'usuario'],
            ['name' => 'usuario.store','group_name'=>'usuario'],
            ['name' => 'usuario.update','group_name'=>'usuario'],
            ['name' => 'usuario.destroy','group_name'=>'usuario'],
            ['name' => 'usuario.disativar','group_name'=>'usuario'],

            // Permissão de estudante
            ['name' => 'estudante.index','group_name'=>'estudante'],
            ['name' => 'estudante.create','group_name'=>'estudante'],
            ['name' => 'estudante.edit','group_name'=>'estudante'],
            ['name' => 'estudante.show','group_name'=>'estudante'],
            ['name' => 'estudante.store','group_name'=>'estudante'],
            ['name' => 'estudante.update','group_name'=>'estudante'],
            ['name' => 'estudante.destroy','group_name'=>'estudante'],
            ['name' => 'estudante.disativar','group_name'=>'estudante'],

            // Permissão de estudante -> curriculum
            ['name' => 'curriculum.index','group_name'=>'curriculum'],
            ['name' => 'curriculum.create','group_name'=>'curriculum'],
            ['name' => 'curriculum.edit','group_name'=>'curriculum'],
            ['name' => 'curriculum.show','group_name'=>'curriculum'],
            ['name' => 'curriculum.store','group_name'=>'curriculum'],
            ['name' => 'curriculum.update','group_name'=>'curriculum'],
            ['name' => 'curriculum.destroy','group_name'=>'estudante'],
            ['name' => 'curriculum.disativar','group_name'=>'curriculum'],





            // Permissão de univerisade
            ['name' => 'universidade.index','group_name'=>'universidade'],
            ['name' => 'universidade.create','group_name'=>'universidade'],
            ['name' => 'universidade.edit','group_name'=>'universidade'],
            ['name' => 'universidade.show','group_name'=>'universidade'],
            ['name' => 'universidade.store','group_name'=>'universidade'],
            ['name' => 'universidade.update','group_name'=>'universidade'],
            ['name' => 'universidade.destroy','group_name'=>'universidade'],
            ['name' => 'universidade.disativar','group_name'=>'universidade'],

            // Permissão de Empresa
            ['name' => 'empresa.index','group_name'=>'empresa'],
            ['name' => 'empresa.create','group_name'=>'empresa'],
            ['name' => 'empresa.edit','group_name'=>'empresa'],
            ['name' => 'empresa.show','group_name'=>'empresa'],
            ['name' => 'empresa.store','group_name'=>'empresa'],
            ['name' => 'empresa.update','group_name'=>'empresa'],
            ['name' => 'empresa.destroy','group_name'=>'empresa'],
            ['name' => 'empresa.disativar','group_name'=>'empresa'],

                 // Permissão de Empresa->emprego
                 ['name' => 'emprego.index','group_name'=>'emprego'],
                 ['name' => 'emprego.create','group_name'=>'emprego'],
                 ['name' => 'emprego.edit','group_name'=>'emprego'],
                 ['name' => 'emprego.show','group_name'=>'emprego'],
                 ['name' => 'emprego.store','group_name'=>'emprego'],
                 ['name' => 'emprego.update','group_name'=>'emprego'],
                 ['name' => 'emprego.destroy','group_name'=>'emprego'],
                 ['name' => 'emprego.disativar','group_name'=>'emprego'],

        // Permissão de Empresa->ofertaemprego
        ['name' => 'ofertaemprego.index','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.create','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.edit','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.show','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.store','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.update','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.destroy','group_name'=>'ofertaemprego'],
        ['name' => 'ofertaemprego.disativar','group_name'=>'ofertaemprego'],

        // Permissão de Empresa->ofertaestagio
        ['name' => 'ofertaestagio.index','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.create','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.edit','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.show','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.store','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.update','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.destroy','group_name'=>'ofertaestagio'],
        ['name' => 'ofertaestagio.disativar','group_name'=>'ofertaestagio'],


        // Permissão de categoria
        ['name' => 'categoria.index','group_name'=>'categoria'],
        ['name' => 'categoria.create','group_name'=>'categoria'],
        ['name' => 'categoria.edit','group_name'=>'categoria'],
        ['name' => 'categoria.show','group_name'=>'categoria'],
        ['name' => 'categoria.store','group_name'=>'categoria'],
        ['name' => 'categoria.update','group_name'=>'categoria'],
        ['name' => 'categoria.destroy','group_name'=>'categoria'],
        ['name' => 'categoria.disativar','group_name'=>'categoria'],

        // Permissão de subcategoria
        ['name' => 'subcategoria.index','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.create','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.edit','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.show','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.store','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.update','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.destroy','group_name'=>'subcategoria'],
        ['name' => 'subcategoria.disativar','group_name'=>'subcategoria'],

        // Permissão de provincia
        ['name' => 'provincia.index','group_name'=>'provincia'],
        ['name' => 'provincia.create','group_name'=>'provincia'],
        ['name' => 'provincia.edit','group_name'=>'provincia'],
        ['name' => 'provincia.show','group_name'=>'provincia'],
        ['name' => 'provincia.store','group_name'=>'provincia'],
        ['name' => 'provincia.update','group_name'=>'provincia'],
        ['name' => 'provincia.destroy','group_name'=>'provincia'],
        ['name' => 'provincia.disativar','group_name'=>'provincia'],

        // Permissão de municipio
        ['name' => 'municipio.index','group_name'=>'municipio'],
        ['name' => 'municipio.create','group_name'=>'municipio'],
        ['name' => 'municipio.edit','group_name'=>'municipio'],
        ['name' => 'municipio.show','group_name'=>'municipio'],
        ['name' => 'municipio.store','group_name'=>'municipio'],
        ['name' => 'municipio.update','group_name'=>'municipio'],
        ['name' => 'municipio.destroy','group_name'=>'municipio'],
        ['name' => 'municipio.disativar','group_name'=>'municipio'],


        ];

        foreach ($permissaos as $permissao) {
            Permission::create($permissao);
      }



    }
}
