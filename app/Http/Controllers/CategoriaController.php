<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Image;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriaController extends Controller{


    public function index(){

        $categorias = Categoria::orderBy('id', 'desc')->get();
        return view('admin.categorias.index',compact('categorias'));
    }


    public function create(){

         return view('admin.categorias.create');
    }

    public function store(Request $request){

        Alert::warning('Atenção!', 'existem campos não validados');


        $validateData = $request->validate(

            ['nome' => 'required',],
            ['nome.required' => 'Insira o nome da categoria',],

            );

            $inseir = new Categoria;
            $inseir->categoria_nome = $request->nome;
            $inseir->save();

            Alert::success('Sucesso!', 'Categoria inserida com êxito');
            return redirect()->route('categoria.index');

        }




    public function show($id){
        $categoria = DB::table('categorias')->where('id',$id)->first();
        //return response()->json($categoria);
    }


    public function edit($id){
        $categoria = DB::table('categorias')->where('id',$id)->first();
        return view('admin.categorias.edit', compact('categoria'));

    }


    public function update(Request $request, $id){
        $data = array();
        $data['categoria_nome'] = $request->nome;
        DB::table('categorias')->where('id',$id)->update($data);

        Alert::success('Sucesso!', 'Categoria actualizada com êxito');
        return redirect()->route('categoria.index');
    }

    public function destroy($id){
         DB::table('categorias')->where('id',$id)->delete();
         DB::table('subcategorias')->where('categoria_id',$id)->delete();

         Alert::success('Sucesso!', 'Categoria excluido com êxito');
         return redirect()->route('categoria.index');


        }


}
