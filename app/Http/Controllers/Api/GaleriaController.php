<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galeria;
use Illuminate\Support\Facades\Storage;


class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       $galerias = Galeria::where('status','ativado')->get(); // Você pode ajustar a consulta conforme necessário
        return response()->json($galerias);
    }

        public function galeriaservidor(){
       $galerias = Galeria::all(); // Você pode ajustar a consulta conforme necessário
        return response()->json($galerias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function create(Request $request){

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $path = $request->file('imagem')->store('imagens');
       $galeria = Galeria::create([
            // 'nome' => $request->nome,
            // 'icone' => $request->icone,
            'imagem' => $path,
            'status' =>'ativado'
            // 'descricao' => $request->descricao,
        ]);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'galeria' =>$galeria], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
       $galeria = Galeria::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'galeria' =>$galeria], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

       $galeria = Galeria::find($id);

        if (!$galeria) {
            return response()->json(['message' => 'Serviço não encontrado'], 404);
        }

        if ($request->hasFile('imagem')) {
            // Remover a imagem antiga, se necessário
            if ($galeria->imagem) {
                Storage::delete($galeria->imagem);
            }

           $path = $request->file('imagem')->store('imagens');
           $galeria->imagem = $path;
        }

       $galeria->save();

        return response()->json($galeria);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

       $galeria = Galeria::find($id);



      if ($galeria->status =='ativado') {
        $galeria->update([
        'status'=>'disativado'
        ]);
        return response()->json(['message' => 'Item excluído com sucesso.'], 200);

      }else{
        $galeria->update([
        'status'=>'ativado'
        ]);
        return response()->json(['message' => 'Item excluído com sucesso.'], 200);

      }


        // if ($galeria) {
        //    $galeria->delete();
        //     return response()->json(['message' => 'Item excluído com sucesso.'], 200);
        // }
        // return response()->json(['message' => 'Item não encontrado.'], 404);


    }
}
