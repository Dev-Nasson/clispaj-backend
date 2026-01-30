<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servico;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class ServicoController extends Controller
{

    public function index()
    {

        $servicos = Servico::where('status', 'ativado')->latest()->get();
        return response()->json($servicos);
    }

    public function servicoservidor()
    {
        $servicos = Servico::all();
        return response()->json($servicos);
    }

    public function Servicosinglelist()
    {
        $servicolistas = Servico::limit(4)->get();
        return response()->json($servicolistas);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request) {}



    public function store(Request $request)
    {
        $path = null;
        $path_icone = null;

        // IMAGEM DO SERVIÇO (800x533)
        if ($request->hasFile('imagem')) {

            $image = $request->file('imagem');
            $name = Str::uuid() . '.jpg';

            $img = Image::make($image)
                ->fit(800, 533) // força exatamente 800x533
                ->encode('jpg', 90);

            Storage::disk('public')->put("imagens/$name", $img);

            $path = "imagens/$name";
        }

        // ÍCONE (sem redimensionar)
        if ($request->hasFile('icone')) {
            $path_icone = $request->file('icone')->store('icones', 'public');
        }


        $servico = Servico::create([
            'nome' => $request->nome,
            'tipo' => $request->tipo, // 👈 ADICIONADO
            'icone' => $path_icone,
            'imagem' => $path,
            'status' => 'ativado',
            'descricao' => $request->descricao,
        ]);


        return response()->json([
            'message' => 'Serviço criado com sucesso!',
            'servico' => $servico
        ], 200);
    }


    public function show($id)
    {
        $servico = Servico::find($id);
        return response()->json(['message' => 'Serviço', 'servico' => $servico], 200);
    }

    public function edit($id)
    {
        $servico = Servico::find($id);
        return response()->json(['message' => 'Serviço criado com sucesso!', 'servico' => $servico], 200);
    }


    public function update(Request $request, $id)
    {
        $servico = Servico::find($id);

        if (!$servico) {
            return response()->json(['message' => 'Serviço não encontrado'], 404);
        }

        if ($request->filled('nome')) {
            $servico->nome = $request->nome;
        }

        if ($request->filled('tipo')) {
            $servico->tipo = $request->tipo;
        }


        if ($request->filled('descricao')) {
            $servico->descricao = $request->descricao;
        }

        // ATUALIZAR IMAGEM (800x533)
        if ($request->hasFile('imagem')) {

            // Apaga imagem antiga
            if ($servico->imagem && Storage::disk('public')->exists($servico->imagem)) {
                Storage::disk('public')->delete($servico->imagem);
            }

            $image = $request->file('imagem');
            $name = Str::uuid() . '.jpg';

            $img = Image::make($image)
                ->fit(800, 533)
                ->encode('jpg', 90);

            Storage::disk('public')->put("imagens/$name", $img);

            $servico->imagem = "imagens/$name";
        }

        // ATUALIZAR ÍCONE
        if ($request->hasFile('icone')) {

            if ($servico->icone && Storage::disk('public')->exists($servico->icone)) {
                Storage::disk('public')->delete($servico->icone);
            }

            $servico->icone = $request->file('icone')->store('icones', 'public');
        }

        $servico->save();

        return response()->json([
            'message' => 'Serviço atualizado com sucesso',
            'servico' => $servico
        ], 200);
    }




    public function destroy($id)
    {

        $servico = Servico::find($id);

        if ($servico->status == 'ativado') {
            $servico->update([
                'status' => 'disativado'
            ]);
            return response()->json(['message' => 'Item excluído com sucesso.'], 200);
        } else {
            $servico->update([
                'status' => 'ativado'
            ]);
            return response()->json(['message' => 'Item excluído com sucesso.'], 200);
        }
    }
}
