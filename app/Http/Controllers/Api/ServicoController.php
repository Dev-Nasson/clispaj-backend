<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use Illuminate\Support\Facades\Storage;

class ServicoController extends Controller {
   

        public function index(){

            $servicos = Servico::where('status','ativado')->latest()->get();
            return response()->json($servicos);
        }

        public function servicoservidor(){
            $servicos = Servico::all();
            return response()->json($servicos);
        }

       public function Servicosinglelist(){
        $servicolistas = Servico::limit(4)->get();
        return response()->json($servicolistas);
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
   

        public function store(Request $request){

            $path = null;
            $path_icone = null;

            if ($request->hasFile('imagem')) {
                $path = $request->file('imagem')->store('imagens');
            }

            if ($request->hasFile('icone')) {
                $path_icone = $request->file('icone')->store('imagens');
            }

            $servico = Servico::create([
                'nome' => $request->nome,
                'icone' => $path_icone,
                'imagem' => $path,
                'status' => 'ativado',
                'descricao' => $request->descricao,
            ]);

            return response()->json(['message' => 'Serviço criado com sucesso!', 'servico' => $servico], 200);
    
        }




    public function show($id){
        $servico = Servico::find($id);
        return response()->json(['message'=>'Serviço','servico'=>$servico], 200);
    }

   

    public function edit($id){
        $servico = Servico::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'servico' => $servico], 200);

    }

  
    // public function update(Request $request, $id){

    //     $servico = Servico::find($id);

    //     if (!$servico) {
    //         return response()->json(['message' => 'Serviço não encontrado'], 404);
    //     }

    //     $servico->nome = $request->input('nome');
    //     // $servico->icone = $request->input('icone');
    //     $servico->descricao = $request->input('descricao');

    //     if ($request->hasFile('imagem')) {
    //         // Remover a imagem antiga, se necessário
    //         if ($servico->imagem) {
    //             Storage::delete($servico->imagem);
    //         }

    //         $path = $request->file('imagem')->store('imagens');
    //         $servico->imagem = $path;
    //     }


    //        if ($request->hasFile('icone')) {
    //         // Remover a icone antiga, se necessário
    //         if ($servico->icone) {
    //             Storage::delete($servico->icone);
    //         }

    //         $path_icone = $request->file('icone')->store('imagens');
    //         $servico->icone = $path_icone;
    //     }

    //     $servico->save();

    //     return response()->json($servico);

    // }

    public function update(Request $request, $id)
{
    $servico = Servico::find($id);

    if (!$servico) {
        return response()->json(['message' => 'Serviço não encontrado'], 404);
    }

    $servico->nome = $request->input('nome');
    $servico->descricao = $request->input('descricao');

    // Atualizar imagem se enviada
    if ($request->hasFile('imagem')) {
        if ($servico->imagem && Storage::disk('public')->exists($servico->imagem)) {
            Storage::disk('public')->delete($servico->imagem);
        }

        $path = $request->file('imagem')->store('imagens', 'public');
        $servico->imagem = $path;
    }

    // Atualizar ícone se enviado
    if ($request->hasFile('icone')) {
        if ($servico->icone && Storage::disk('public')->exists($servico->icone)) {
            Storage::disk('public')->delete($servico->icone);
        }

        $path_icone = $request->file('icone')->store('icones', 'public');
        $servico->icone = $path_icone;
    }

    $servico->save();

    return response()->json(['servico' => $servico], 200);
}




    public function destroy($id){

        $servico = Servico::find($id);

      if ($servico->status =='ativado') {
        $servico->update([
        'status'=>'disativado'
        ]);
        return response()->json(['message' => 'Item excluído com sucesso.'], 200);

      }else{
        $servico->update([
        'status'=>'ativado'
        ]);
        return response()->json(['message' => 'Item excluído com sucesso.'], 200);

      }


        // if ($servico) {
        //     $servico->delete();
        //     return response()->json(['message' => 'Item excluído com sucesso.'], 200);
        // }
        // return response()->json(['message' => 'Item não encontrado.'], 404);

    }
}
