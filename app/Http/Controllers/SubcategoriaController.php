<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategoria;
use Image;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
class SubcategoriaController extends Controller{

    public function index(){


       $subcategorias = DB::table('subcategorias')
        ->join('categorias','subcategorias.categoria_id','categorias.id')
        ->select('categorias.categoria_nome','subcategorias.*')
       ->orderBy('subcategorias.id','DESC')
       ->get();

        return view('admin.subcategorias.index',compact('subcategorias'));

       }

     public function listasubcategoriaget($id){
        $subcategorias = Subcategoria::where('categoria_id',$id)->get();
        return response()->json($subcategorias);
     }


     public function DropDownSubcategoria(Request  $request){

        $subcategorias = Subcategoria::where('categoria_id',$request->categoria_id)->get();
        return response()->json($subcategorias);
     }


   // public function empregoGet($id){}



    public function create(){

        return view('admin.subcategorias.create');
    }

    public function store(Request $request){

        Alert::warning('Atenção!', 'existem campos não validados');

        $validateData = $request->validate(

            [
            'nome' => 'required',
            'categoria' => 'required',
            ],

            [
            'nome.required' => 'Insira o nome da subcategoria',
            'categoria.required' => 'Selecione a categoria',
            ],

            );

            $inseir = new Subcategoria;
            $inseir->categoria_id = $request->categoria;
            $inseir->nome = $request->nome;
            $inseir->save();

            Alert::success('Sucesso!', 'Subcategoria inserida com êxito');
            return redirect()->route('subcategoria.index');

        }



    public function show($id){

        $subcategoria = DB::table('subcategorias')->where('id',$id)->first();
        return response()->json($subcategoria);
    }


    public function edit($id){
        $subcategoria = DB::table('subcategorias')->where('id',$id)->first();
        return view('admin.subcategorias.edit', compact('subcategoria'));
    }


    public function update(Request $request, $id){

        $data = array();
        $data['nome'] = $request->nome;
        DB::table('subcategorias')->where('id',$id)->update($data);
        Alert::success('Sucesso!', 'subcategoria actualizada com êxito');
        return redirect()->route('subcategoria.index');

    }


    public function destroy($id){

         DB::table('subcategorias')->where('id',$id)->delete();
         Alert::success('Sucesso!', 'Categoria excluido com êxito');
         return redirect()->route('subcategoria.index');
    }




}
