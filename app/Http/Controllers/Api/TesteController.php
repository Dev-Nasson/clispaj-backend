<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teste;
use Intervention\Image\Facades\Image;



class TesteController extends Controller {

    /**
     * Display a listing of the resource.
     */

    public function index(){
        $testes = Teste::all();
        return response()->json($testes);
    }


    public function create(){
        //
    }


    public function store(Request $request){

        if($request->hasfile('images')){
           foreach ($request->file('images') as $file) {
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('images'), $name);
            // $producto->images()->create(['filename'=> $name]);
            // $imagem = $request->images;
            //return response()->json(["nome"=>$nome, 'imagem'=> $name]);
           }
        }

          return response()->json(['message' =>'Produto criado com sucesso nasson']);


    }



    public function show(string $id){
        //
    }

    public function edit($id){
       $editprojecto = Teste::find($id);
       return response()->json($editprojecto);
    }


    public function update(Request $request){

        $AtualizarProjecto = Teste::find($request->id);

        $AtualizarProjecto->update([
            'nome'=>$request->nome,
            'descricao'=>$request->descricao,
        ]);
        return response()->json($AtualizarProjecto);

    }


    public function destroy(string $id){
        //
    }

}
