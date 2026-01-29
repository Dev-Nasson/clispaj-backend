<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profissional;
use Illuminate\Support\Facades\Storage;

class ProfissionalController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       $profissionals = Profissional::where('status','ativado')->get(); // Você pode ajustar a consulta conforme necessário
        return response()->json($profissionals);
    }

        public function profissionalservidor(){

       $profissionals = Profissional::all(); // Você pode ajustar a consulta conforme necessário
        return response()->json($profissionals);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function create(Request $request){

        // $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'icone' => 'required|string|max:255',
        //     'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'descricao' => 'required|string',
        // ]);
        // $path = $request->file('imagem')->store('public/imagens');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $path = $request->file('imagem')->store('imagens');
       $profissional = Profissional::create([
            'nome' => $request->nome,
            'imagem' => $path,
            'area' => $request->descricao,
            'status' =>'ativado'
        ]);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'profissional' =>$profissional], 200);
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
       $profissional = Profissional::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'profissional' =>$profissional], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

       $profissional = Profissional::find($id);

        if (!$profissional) {
            return response()->json(['message' => 'Serviço não encontrado'], 404);
        }

       $profissional->nome = $request->input('nome');
    //    $profissional->icone = $request->input('icone');
       $profissional->area = $request->input('area');

        if ($request->hasFile('imagem')) {
            // Remover a imagem antiga, se necessário
            if ($profissional->imagem) {
                Storage::delete($profissional->imagem);
            }

           $path = $request->file('imagem')->store('imagens');
           $profissional->imagem = $path;
        }

       $profissional->save();

        return response()->json($profissional);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

       $profissional = Profissional::find($id);


                if ($profissional->status =='ativado') {
                    $profissional->update([
                    'status'=>'disativado'
                    ]);
                    return response()->json(['message' => 'Item excluído com sucesso.'], 200);

                }else{
                    $profissional->update([
                    'status'=>'ativado'
                    ]);
                    return response()->json(['message' => 'Item excluído com sucesso.'], 200);

                }

        // if ($profissional) {
        //    $profissional->delete();
        //     return response()->json(['message' => 'Item excluído com sucesso.'], 200);
        // }
        // return response()->json(['message' => 'Item não encontrado.'], 404);

    }
}
