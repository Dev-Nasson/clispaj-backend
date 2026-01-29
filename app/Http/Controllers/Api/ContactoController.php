<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacto;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
             $contactos = Contacto::where('status','ativado')->get(); // Você pode ajustar a consulta conforme necessário
        return response()->json($contactos);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

            $contacto = Contacto::create([
            'nome' => $request->nome,
            'imail' => $request->imail,
            'numero' => $request->numero,
            'assunto' => $request->assunto,
            'status' =>'ativado',
            'descricao' => $request->descricao,
        ]);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'contacto' =>$contacto], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
           $contacto = Contacto::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'contacto' =>$contacto], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

        $contacto = Contacto::find($id);
            if (!$contacto) {
                return response()->json(['message' => 'Serviço não encontrado'], 404);
            }
            $contacto->nome = $request->input('nome');
            $contacto->imail = $request->input('imail');
            $contacto->numero = $request->input('numero');
            $contacto->assunto = $request->input('assunto');
            $contacto->descricao = $request->input('descricao');
            $contacto->save();
           return response()->json($contacto);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
               
       $contacto = Contacto::find($id);

                if ($contacto->status =='ativado') {
                $contacto->update([
                'status'=>'disativado'
                ]);
                return response()->json(['message' => 'Item excluído com sucesso.'], 200);

            }else{
                $contacto->update([
                'status'=>'ativado'
                ]);
                return response()->json(['message' => 'Item excluído com sucesso.'], 200);

            }


        // if ($contacto) {
        //    $contacto->delete();
        //     return response()->json(['message' => 'Item excluído com sucesso.'], 200);
        // }
    
        // return response()->json(['message' => 'Item não encontrado.'], 404);


    }
}
