<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $banners = Banner::where('status','ativado')->get(); // Você pode ajustar a consulta conforme necessário
        return response()->json($banners);
    }

        public function bannerservidor(){
        $banners = Banner::all(); // Você pode ajustar a consulta conforme necessário
        return response()->json($banners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    public function store(Request $request){
    // Verifica se a imagem foi enviada
    $path = $request->hasFile('imagem') && $request->file('imagem')->isValid()
        ? $request->file('imagem')->store('imagens')
        : null;

    $path_icone_um = $request->hasFile('iconeum') && $request->file('iconeum')->isValid()
        ? $request->file('iconeum')->store('imagens')
        : null;

    $path_icone_dois = $request->hasFile('iconedois') && $request->file('iconedois')->isValid()
        ? $request->file('iconedois')->store('imagens')
        : null;

    $path_icone_tres = $request->hasFile('iconetres') && $request->file('iconetres')->isValid()
        ? $request->file('iconetres')->store('imagens')
        : null;

    // Criação do banner com os dados validados
    $banner = Banner::create([
        'imagem' => $path,
        'tituloum' => $request->tituloum,
        'titulodois' => $request->titulodois,
        'titulotres' => $request->titulotres,
        'iconeum' => $path_icone_um,
        'iconedois' => $path_icone_dois,
        'iconetres' => $path_icone_tres,
        'status' =>'ativado',
        'descricao' => $request->descricao,
    ]);

    return response()->json(['message' => 'Serviço criado com sucesso!', 'banner' => $banner], 200);
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

        $banner = Banner::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'banner' =>$banner], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
              $banner = Banner::find($id);

        if (!$banner) {
            return response()->json(['message' => 'Serviço não encontrado'], 404);
        }

              $banner->tituloum = $request->input('tituloum');
              $banner->titulodois = $request->input('titulodois');
            //   $banner->titulotres = $request->input('titulotres');
              $banner->descricao = $request->input('descricao');


        if ($request->hasFile('imagem')) {
            // Remover a imagem antiga, se necessário
            if ($banner->imagem) {
                Storage::delete($banner->imagem);
            }

           $path = $request->file('imagem')->store('imagens');
           $banner->imagem = $path;
        }

          $banner->save();
           return response()->json($banner);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

               $banner = Banner::find($id);

                // if ($banner) {
                // $banner->delete();
                //     return response()->json(['message' => 'Item excluído com sucesso.'], 200);
                // }
                // return response()->json(['message' => 'Item não encontrado.'], 404);

                if ($banner->status =='ativado') {
                $banner->update([
                'status'=>'disativado'
                ]);
                return response()->json(['message' => 'Item excluído com sucesso.'], 200);

            }else{
                $banner->update([
                'status'=>'ativado'
                ]);
                return response()->json(['message' => 'Item excluído com sucesso.'], 200);

            }
    }
}
