<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Horario;
use Illuminate\Support\Facades\Storage;

class HorarioController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){
        $horarios = Horario::all(); // Você pode ajustar a consulta conforme necessário
        return response()->json($horarios);
    }

      public function Detalhe(){
        $horario = Horario::first(); // Você pode ajustar a consulta conforme necessário
        return response()->json($horario);
    }

        // public function up()
        // {
        //     Schema::create('horarios', function (Blueprint $table) {
        //         $table->id();
        //         $table->string('nome')->nullable();
        //         $table->string('status')->nullable();
        //         $table->timestamps();
        //     });
        // }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    
        $horario = Horario::create([
            'nomeum' => $request->nomeum,
            'nomedois' => $request->nomedois,
            'nometres' => $request->nometres,
            'nomequatro' => $request->nomequatro,
            'status'=>'ativado',
        ]);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'horario' => $horario], 200);
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
        $horario = Horario::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'servico' => $horario], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

         $horario = Horario::find($id);

        if (!$horario) {
            return response()->json(['message' => 'Serviço não encontrado'], 404);
        }

        $horario->nomeum = $request->input('nomeum');
        $horario->nomedois = $request->input('nomedois');
        $horario->nometres = $request->input('nometres');
        $horario->nomequatro = $request->input('nomequatro');
        //$horario->icone = $request->input('icone');
        $horario->save();

        return response()->json($horario);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){

       $horario = Horario::find($id);
      if ($horario->status =='ativado') {
        $horario->update([
        'status'=>'disativado'
        ]);
        return response()->json(['message' => 'Item excluído com sucesso.'], 200);
      }else{
        $horario->update([
        'status'=>'ativado'
        ]);
        return response()->json(['message' => 'Item excluído com sucesso.'], 200);
      }

    }
}
