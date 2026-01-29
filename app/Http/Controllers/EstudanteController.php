<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Estudante;
use App\Models\Curriculum;
use App\Models\User;
use App\Models\UsuarioEmpresa;
use App\Models\OfertaEmprego;
use App\Models\OfertaEstagio;
use App\Notifications\OfertarEmprego;
use App\Notifications\OfertarEstagio;
use App\Models\DadosAcademico;
use App\Models\IdentificacaoEstudante;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SituacaoEmprego;
use App\Models\Curriculum\Idioma;
use App\Models\Curriculum\Educacao;
use App\Models\Curriculum\Competencia;
use App\Models\Curriculum\Interesse;
use App\Models\Curriculum\Profissional;
use Illuminate\Support\Facades\Storage;
//Dados academicos
use App\Models\Academico\Curso;
use App\Models\Academico\DataInicio;
use App\Models\Academico\DataTermino;
use App\Models\Academico\Grau;
use App\Models\Academico\Instituicao;

use Illuminate\Support\Facades\Notification;


class EstudanteController extends Controller{

        public function index(){
            $estudantes = Estudante::orderBy('id', 'desc')->get();
            return view('admin.estudantes.index', compact('estudantes'));
        }

        public function create(){

            $id = request('id');
            $usuario = User::find($id);
            $role = Role::where('name','Estudante')->first();
            return view('admin.estudantes.create',compact('usuario','role'));

        }

        function ofertaempregocreate($id)  {

            $user_id = auth()->user()->id;
            $estudante =Estudante::find($id);
            $emprego = UsuarioEmpresa::where('user_id',$user_id)->first();
            return view('admin.estudantes.creatofertaemprego',compact('estudante','emprego'));
        }

        function ofertaempregoStore(Request $request , $id)  {

            $estudante = Estudante::find($id);
            $user_id = auth()->user()->id;
            $empresa = UsuarioEmpresa::where('user_id',$user_id)->first();

             $user = User::where('role','Estudante')->where('id',$estudante->user_id)->first();

            $pega_ofertaEmpego = OfertaEmprego::where('user_id',$estudante->user_id)
            ->where('empresa_id',$empresa->empresa_id);

                 if ($pega_ofertaEmpego->count()==1) {

                    Alert::warning('Atenção!', ' Já adicionaste emprego a este Estudante');

                 } else {

                    $ofertaEmpego = OfertaEmprego::create([
                        'user_id' => $estudante->user_id,
                        'empresa_id' =>$empresa->empresa_id,
                        'funcao' => $request->funcao,
                    ]);

                      Notification::send($user, new OfertarEmprego($user->id));
                      Alert::success('Sucesso!', 'Emprego ofertado com êxito');

                 }


               return redirect()->route('estudante.index');

        }

        function ofertaestagiocreate($id) {

            $user_id = auth()->user()->id;
            $estudante =Estudante::find($id);
            $emprego = UsuarioEmpresa::where('user_id',$user_id)->first();
            return view('admin.estudantes.createofertastagio',compact('estudante','emprego'));
        }

         function ofertaestagioStore(Request $request , $id) {

            $estudante = Estudante::find($id);
            $user_id = auth()->user()->id;
            $empresa = UsuarioEmpresa::where('user_id',$user_id)->first();

             $user = User::where('role','Estudante')->where('id',$estudante->user_id)->first();

            $pega_ofertaEstagio = OfertaEstagio::where('user_id',$estudante->user_id)
            ->where('empresa_id',$empresa->empresa_id);

                 if ($pega_ofertaEstagio->count()==1) {

                    Alert::warning('Atenção!', ' Já adicionaste estágio a este Estudante');

                 } else {

                    $ofertaEmpego = OfertaEstagio::create([
                        'user_id' => $estudante->user_id,
                        'empresa_id' =>$empresa->empresa_id,
                        'funcao'=> $request->funcao,
                    ]);

                      Notification::send($user, new OfertarEstagio($user->id));
                      Alert::success('Sucesso!', 'Estágio ofertado com êxito');

                 }


                return redirect()->route('estudante.index');


         }

        public function curriculum(Request $request , $id){

            Alert::warning('Atenção!', 'existem campos não validados');


                $validateData = $request->validate(

                        [
                        'curso' =>'required',
                        'idiomas' =>'required',
                        ],

                        [
                        'curso.required' => 'Selecione o curso',
                        'idiomas.required' => 'Selecione os idiomas ',
                        ],

                    );


                    $user_id = auth()->user()->id;
                    $conta_cv = Curriculum::where('estudante_id',$id);

                    if ($conta_cv->count()==1) {

                        Alert::warning('Atenção!', ' já foi adicionado um corrículum a este estudante!');
                        return redirect('auth/curriculum/'.$id);

                    }else{



                        if ($request->hasFile('curriculum')) {
                            $cv = $request->file('curriculum')->store('public/documentos/curriculum');

                        } else {
                            $cv = '';
                        }


                        $inseir = new Curriculum;
                        $inseir->estudante_id = $id;
                        $inseir->curso = $request->curso;
                        $inseir->media = $request->media;
                        $inseir->sobre = $request->sobre;
                        $inseir->curriculum = $cv;
                        $inseir->save();

                        $idiomas = $request->idiomas;
                        $educacaos = $request->educacaos;
                        $profissionais = $request->experiencias;
                        $competencias = $request->competencias;
                        $interesses = $request->interesses;

                        $curreculum = Curriculum::where('estudante_id',$id)->first();

                            foreach ($educacaos as  $educacao) { //Educação
                                $Educacao = Educacao::create([
                                'estudante_id'=>$id,
                                'curricula_id'=>$curreculum->id,
                                'educacao'=> $educacao
                            ]);
                        }

                                foreach ($idiomas as  $idioma) {  // Idiomas
                                    $Linguagem = Idioma::create([
                                        'estudante_id'=>$id,
                                        'curricula_id'=>$curreculum->id,
                                        'idiomas'=> $idioma
                                    ]);
                            }


                                foreach ($profissionais as  $profissional) {  // Profissional
                                    $prof = Profissional::create([
                                        'estudante_id'=>$id,
                                        'curricula_id'=>$curreculum->id,
                                        'profissional'=>$profissional
                                    ]);
                            }


                            foreach ($competencias as  $competencia) {  //competencias
                                $prof = Competencia::create([
                                    'estudante_id'=>$id,
                                    'curricula_id'=>$curreculum->id,
                                    'competencia'=>$competencia
                                ]);
                        }


                                    foreach ($interesses as  $interesse) {  //interesses
                                $inter = Interesse::create([
                                    'estudante_id'=>$id,
                                    'curricula_id'=>$curreculum->id,
                                    'interesse'=>$interesse
                                ]);
                        }


                    }

                    Alert::success('Success Title', 'Currículum inserido com êxito');
                    $estado = Auth::user()->estado;

                    if ($estado=='admin' || $estado=='funcionario') {


                    return redirect()->route('estudante.index');

                    }else {

                    return redirect('perfil/inicio');

                    }






        }

        public function curriget($id){


            if (Auth::check()) { // se está autenticado


                $usuario = auth()->user()->role;

                $estudante = DB::table('estudantes')->where('id',$id)->first();

                if ($usuario !=='Estudante' || $usuario =='SuperAdmin') {

               // if ($estado=='SuperAdmin' || $estado=='funcionario') {

                    return view('admin.estudantes.curriculum',compact('estudante'));

                }else {

                    return view('job.perfil.curriculum',compact('estudante'));

                }

            } else { // se não está autenticado

                return view('job.perfil.curriculum',compact('estudante'));


            }


        }

        public function store(Request $request){


                Alert::warning('Atenção!', 'existem campos não validados');

                $validateData = $request->validate(



                    [

                        'genero'=>'required',
                        'nascimento'=>'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
                        'situacaoemprego'=>'required',
                        'tipo' =>'required',
                        'nacionalidade'=>'required',
                        'numero_identificacao'=>'required',
                        'pais'=>'required',
                        'municipio'=>'required',
                        'provincia'=>'required',
                        'bairro'=>'required',
                        'email'=>['required','string','email','max:255'],
                        'telefoneum'=>'required',
                        'graus'=>'required',
                        'instituicaos'=>'required',
                        'cursos'=>'required',
                        'data_inicios' =>'required',
                        'data_terminos' =>'required',
                        ],

                        [

                        'genero.required'=>'Selecione o género por favor',
                        'nascimento.required'=>'Insira a data de nascimento',
                        'nascimento.before_or_equal'=>'Vocé é menor de idade',
                        'situacaoemprego.required'=>'Selecione a situação de emprego',
                        'tipo.required'=>'Insira o tipo de documento',
                        'nacionalidade.required'=>'Insira a nacionalidade',
                        'numero_identificacao.required'=>'Número de identificação',
                        'pais.required'=>'Insira o país',
                        'municipio.required'=>'Insira o município',
                        'provincia.required'=>'Insira a provincia',
                        'bairro.required'=>'Insira o bairro',
                        'email.required'=>'Insira o seu email por favor',
                        'telefoneum.required'=>'Insira o  número de telefone 1',
                        'graus.required'=>'Insira o grau acadêmico',
                        'instituicaos.required'=>' Insira a instituição ',
                        'cursos.required'=>'Insira o curso',
                        'data_inicios.required'=>'Insira a data de início',
                        'data_terminos.required'=>'Insira a data de terminos'

                        ],

                );

                    $user_id = $request->user_id;
                    $conta_estudante  = Estudante::where('user_id',$user_id);

                if ($conta_estudante->count()==1) { // verifica se o  estudande já foi cadastrado
                    Alert::warning('Atenção!', 'este estudante já foi cadastrado!');
                    return redirect('auth/estudante/create?id='.$user_id);

                }else{


                        if (!empty($request->file('foto'))) {
                            // IMAGEM 1
                            $img_um = $request->file('foto');
                            $nome_100_um = hexdec(uniqid()) . '.' . $img_um->getClientOriginalExtension();
                            Image::make($img_um)->resize(200,200)->save('admin/assets/images/estudantes/estudante_' . $nome_100_um);
                            $nm_100_um = 'admin/assets/images/estudantes/estudante_' . $nome_100_um;

                            } else {
                            $nm_100_um = '';
                            }

                            // $inserir_user = User::create([
                            // 'foto'=>$nm_100_um,
                            // 'name'=>$request->nome,
                            //  $user->role = 'admin';
                            // 'email'=>$request->email,
                            // 'password' => Hash::make($request->password),
                            // 'estado'=>'estudante'
                            // ]);

                            // $inserir_user = new User();
                            // $inserir_user->foto = $nm_100_um;
                            // $inserir_user->name = $request->nome;
                            // $inserir_user->role = 'Estudante';
                            // $inserir_user->email = $request->email;
                            // $inserir_user->password = Hash::make($request->password);
                            // $inserir_user->estado = 'active';
                            // $inserir_user->save();

                            // $inseir = new Estudante;
                            // $inseir->user_id = $user_id;
                            // $inseir->nome = $request->nome;
                            // $inseir->genero = $request->genero;
                            // $inseir->nascimento = $request->nascimento;
                            // $inseir->pais = $request->pais;
                            // $inseir->municipio = $request->municipio;
                            // $inseir->provincia = $request->provincia;
                            // $inseir->bairro = $request->bairro;
                            // $inseir->telefoneum = $request->telefoneum;
                            // $inseir->telefonedois = $request->telefonedois;
                            // $inseir->foto = $nm_100_um;
                            // $inseir->save();

                            // if ($request->role) {
                            //     $inserir_user->assignRole($request->role);
                            // }


                        // $pega_usuario = User::where('email','=',$request->email)->first();

                        $user_id = auth()->user()->id;
                        $usuario = auth()->user();
                        $estudante = Estudante::where('user_id',$user_id)->first();

                        $user['telefone'] = $request->telefoneum;
                        $user['foto'] = $usuario->foto=='' ? $nm_100_um : $usuario->foto;
                        $atualizarar_usuario = DB::table('users')->where('id',$user_id)->update($user);

                        $data['nome'] = $request->nome;
                        $data['genero'] = $request->genero;
                        $data['nascimento'] = $request->nascimento;
                        $data['pais'] = $request->pais;
                        $data['municipio'] = $request->municipio;
                        $data['provincia'] = $request->provincia;
                        $data['bairro'] = $request->bairro;
                        $data['email2'] = $request->email;
                        $data['telefoneum'] = $request->telefoneum;
                        $data['telefonedois'] = $request->telefonedois;
                        $atualizarar_estudante = DB::table('estudantes')->where('user_id',$user_id)->update($data);


                        if ($atualizarar_estudante) {

                            $tipo = $request->tipo;
                            $user_id = auth()->user()->id;
                            $identifcacao = $request->numero_identificacao;
                            $estudante = Estudante::where('user_id',$user_id)->first();



                            $SituacaoEmprego = $request->situacaoemprego;
                            $situacaoemprego = SituacaoEmprego::create([
                                'estudante_id'=>$estudante->id,
                                'nome_situacao'=>$SituacaoEmprego
                            ]);


                            if (isset($request->bipassaporte)) {

                                $bi_passaporte = Storage::disk('public')->putFile('documentos', $request->bipassaporte);

                            }else {

                                $bi_passaporte = '';
                            }

                            $identifcacao = IdentificacaoEstudante::create([
                            'estudante_id'=>$estudante->id,
                            'tipo'=>$request->tipo,
                            'nacionalidade'=>$request->nacionalidade,
                            'num_identificacao'=>$request->numero_identificacao,
                            'arquivo'=> $bi_passaporte,

                            ]);

                            $dadosacademicos = DadosAcademico::create([
                            'estudante_id'=>$estudante->id,
                            'universidade_id'=>0,
                            'situacao_emprego'=>$request->situacaoemprego,

                            ]);

                            $dadosacademicos_id = $dadosacademicos->id;
                            $graus = $request->graus;
                            $instituicaos = $request->instituicaos;
                            $cursos = $request->cursos;
                            $data_inicios = $request->data_inicios;
                            $data_terminos = $request->data_terminos;

                            foreach ($graus as  $grau) {
                            $inserir_grau = Grau::create([
                            'dados_academico_id'=>$dadosacademicos_id,
                            'grau'=>$grau,
                            ]);
                            }

                            foreach ($instituicaos as  $instituicao) {
                            $inserir_curso = Instituicao::create([
                            'dados_academico_id'=>$dadosacademicos_id,
                            'instituicao'=>$instituicao,
                            ]);
                            }

                            foreach ($cursos as  $curso) {
                            $inserir_curso = Curso::create([
                            'dados_academico_id'=>$dadosacademicos_id,
                            'curso' =>$curso,
                            ]);
                            }

                            foreach ($data_inicios as  $data_inicio) {
                            $inserir_dtinicio = DataInicio::create([
                            'dados_academico_id'=>$dadosacademicos_id,
                            'data_inicio'=>$data_inicio,
                            ]);
                            }

                            foreach ($data_terminos as  $data_termino) {
                            $inserir_dttermino =DataTermino::create([
                            'dados_academico_id'=>$dadosacademicos_id,
                            'data_termino'=>$data_termino,
                            ]);
                        }

                        }

                        Alert::success('Success Title', 'Estudante inserido com êxito');
                        return redirect()->route('perfil.perfil');

        }// fim veirica se o estudante já foi cadastrado

        }

        public function estudantestore(Request $request , $id){

            $validateData = $request->validate(

                [
                'nome' => 'required',
                'genero' => 'required',
                'nascimento' => 'required',
                'telefoneum' => 'required',
                'telefonedois' => 'required',
                'municipio' => 'required',
                'bairro' => 'required',
                'pais' => 'required',
                'residencia' => 'required',
                'nacionalidade' => 'required',
                'universidade' => 'required',
                'nivel' => 'required',
                'curso' => 'required',
                ],

            [
                'nome.required' => 'Insira o nome do estudante por favor',
                'genero.required' => 'Selecione o género por favor',
                'nascimento.required' => 'Insira a data de nascimento',
                'telefoneum.required' => 'Insira o  número de telefone 1',
                'telefonedois.required' => 'Insira o  número de telefone 2',
                'municipio.required' => 'Insira o município',
                'bairro.required' => 'Insira o bairro',
                'pais.required' => 'Insira o país',
                'residencia.required' => 'Insira a residência',
                'nacionalidade.required' => 'Insira a nacionalidade',
                'universidade.required' => 'Insira a universidade do estudante',
                'nivel.required' => 'Insira o nível do estudante',
                'curso.required' => 'Insira o curso do estudante',
            ],

            );

            if ($request->foto) {

                $position = strpos($request->foto,';');
                $sub = substr($request->foto,0, $position);
                $ext = explode('/', $sub)[1];
                $name = time().".".$ext;
                $img = Image::make($request->foto)->resize(240,200);
                $upload_path = 'admin/assets/images/estudantes/';
                $image_url = $upload_path.$name;
                $img->save($image_url);

                $inseir = new Estudante;
                $inseir->user_id = $id;
                $inseir->nome = $request->nome;
                $inseir->genero = $request->genero;
                $inseir->nascimento = $request->nascimento;
                $inseir->telefoneum = $request->telefoneum;
                $inseir->telefonedois = $request->telefonedois;
                $inseir->email1 = $request->email1;
                $inseir->email2 = $request->email2;
                $inseir->municipio = $request->municipio;
                $inseir->bairro = $request->bairro;
                $inseir->pais = $request->pais;
                $inseir->residencia = $request->residencia;
                $inseir->nacionalidade = $request->nacionalidade;
                $inseir->foto = $image_url;
                $inseir->nivel = $request->nivel;
                $inseir->curso = $request->curso;
                $inseir->sobre = $request->sobre;
                $inseir->universidade = $request->universidade;
                $inseir->universidade2 = $request->universidade2;
                $inseir->universidade3 = $request->universidade3;
                $inseir->idiomas = $request->idiomas;
                $inseir->experiencia1 = $request->experiencia1;
                $inseir->experiencia2 = $request->experiencia2;
                $inseir->experiencia3 = $request->experiencia3;
                $inseir->experiencia4 = $request->experiencia4;
                $inseir->experiencia5 = $request->experiencia5;
                $inseir->experiencia6 = $request->experiencia6;
                $inseir->experiencia7 = $request->experiencia7;
                $inseir->competencia1 = $request->competencia1;
                $inseir->competencia2 = $request->competencia2;
                $inseir->competencia3 = $request->competencia3;
                $inseir->competencia4 = $request->competencia4;
                $inseir->competencia5 = $request->competencia5;
                $inseir->competencia6 = $request->competencia6;
                $inseir->competencia7 = $request->competencia7;
                $inseir->interesse1 = $request->interesse1;
                $inseir->interesse2 = $request->interesse2;
                $inseir->interesse3 = $request->interesse3;
                $inseir->interesse4 = $request->interesse4;
                $inseir->interesse5 = $request->interesse5;
                $inseir->interesse6 = $request->interesse6;
                $inseir->interesse7 = $request->interesse7;
                $inseir->save();

            }else{

                $inseir = new Estudante;
                $inseir->user_id = $id;
                $inseir->nome = $request->nome;
                $inseir->genero = $request->genero;
                $inseir->nascimento = $request->nascimento;
                $inseir->telefoneum = $request->telefoneum;
                $inseir->telefonedois = $request->telefonedois;
                $inseir->email1 = $request->email1;
                $inseir->email2 = $request->email2;
                $inseir->municipio = $request->municipio;
                $inseir->bairro = $request->bairro;
                $inseir->pais = $request->pais;
                $inseir->residencia = $request->residencia;
                $inseir->nacionalidade = $request->nacionalidade;
                $inseir->nivel = $request->nivel;
                $inseir->curso = $request->curso;
                $inseir->sobre = $request->sobre;
                $inseir->universidade = $request->universidade;
                $inseir->universidade2 = $request->universidade2;
                $inseir->universidade3 = $request->universidade3;
                $inseir->idiomas = $request->idiomas;
                $inseir->experiencia1 = $request->experiencia1;
                $inseir->experiencia2 = $request->experiencia2;
                $inseir->experiencia3 = $request->experiencia3;
                $inseir->experiencia4 = $request->experiencia4;
                $inseir->experiencia5 = $request->experiencia5;
                $inseir->experiencia6 = $request->experiencia6;
                $inseir->experiencia7 = $request->experiencia7;
                $inseir->competencia1 = $request->competencia1;
                $inseir->competencia2 = $request->competencia2;
                $inseir->competencia3 = $request->competencia3;
                $inseir->competencia4 = $request->competencia4;
                $inseir->competencia5 = $request->competencia5;
                $inseir->competencia6 = $request->competencia6;
                $inseir->competencia7 = $request->competencia7;
                $inseir->interesse1 = $request->interesse1;
                $inseir->interesse2 = $request->interesse2;
                $inseir->interesse3 = $request->interesse3;
                $inseir->interesse4 = $request->interesse4;
                $inseir->interesse5 = $request->interesse5;
                $inseir->interesse6 = $request->interesse6;
                $inseir->interesse7 = $request->interesse7;
                $inseir->save();
            }






        }

        public function academico($id){

            $estudante = DB::table('estudantes')->where('id',$id)->first();
            return view('admin.estudantes.academico',compact('estudante'));

        }

        public function academicostore(Request $request , $id){


            $validateData = $request->validate(

                        [
                        'universidade' => 'required',
                        'curso' => 'required',
                        'nivel' => 'required',
                        'datainicio' => 'required',
                        'datatermino' => 'required',
                        ],

                        [
                            'universidade.required' => 'Selecione a universidade',
                            'curso.required' => 'Selecione o curso',
                            'nivel.required' => 'Selecione o nível academico',
                            'datainicio.required' => 'Selecione a data de inicio',
                            'datatermino.required' => 'Selecione a data de termino',

                        ],

                        );


                            $inseir = new DadosAcademico;
                            $inseir->estudante_id = $id;
                            $inseir->universidade_id = $request->universidade;
                            $inseir->curso = $request->curso;
                            $inseir->nivel_academico = $request->nivel;
                            $inseir->data_inicio = $request->datainicio;
                            $inseir->data_termino = $request->datatermino;
                            $inseir->media = $request->media;
                            $inseir->arquivo = $request->arquivo;
                            $inseir->save();

                            Alert::success('Success Title', 'Dados academicos foi cadastrado com êxito');
                            return redirect()->route('estudante.index');

        }

        public function show($id){


            $curreculum_conta = Curriculum::where('estudante_id',$id);
            $estudante = Estudante::find($id);


            if ($curreculum_conta->count()==0) {


                return view('admin.estudantes.perfil', compact('curreculum_conta','estudante'));

            } else {

                $academico = DadosAcademico::where('estudante_id',$id)->first();
                $DataInicio = DataInicio::where('dados_academico_id',$academico->id)->first();
                $DataTermino = DataTermino::where('dados_academico_id',$academico->id)->first();
                $GrauAcademico = Grau::where('dados_academico_id',$academico->id)->first();
                $Instituicao = Instituicao::where('dados_academico_id',$academico->id)->first();

                $curreculum = Curriculum::where('estudante_id',$id)->first();
                $educacaos =  Educacao::where('curricula_id',$curreculum->id)->get();
                $profissionais = Profissional::where('curricula_id',$curreculum->id)->get();
                $competencias = Competencia::where('curricula_id',$curreculum->id)->get();
                return view('admin.estudantes.perfil',compact('estudante','curreculum','curreculum_conta','academico','educacaos','profissionais','competencias','DataInicio','DataTermino','GrauAcademico','Instituicao'));


            }






        }

        public function edit($id){

            $estudante = DB::table('estudantes')->where('id',$id)->first();
            $identifcacao = IdentificacaoEstudante::where('estudante_id',$id)->first();
            $situacaoemprego = SituacaoEmprego::where('estudante_id',$id)->first();
            return view('admin.estudantes.edit', compact('estudante','identifcacao','situacaoemprego'));

        }

        public function update(Request $request, $id){


                    if (!empty($request->file('foto'))) {

                    // IMAGEM 1
                    $img_um = $request->file('foto');
                    $nome_100_um = hexdec(uniqid()) . '.' . $img_um->getClientOriginalExtension();
                    Image::make($img_um)->resize(200,200)->save('admin/assets/images/estudantes/estudante_' . $nome_100_um);
                    $nm_100_um = 'admin/assets/images/estudantes/estudante_' . $nome_100_um;

                    } else {
                        $nm_100_um = '';
                    }

                    $estudante  = DB::table('estudantes')->where('id',$id)->first();

                    $data = array();
                    $data['nome'] = $request->nome;
                    $data['genero'] = $request->genero;
                    $data['nascimento'] = $request->nascimento;
                    $data['pais'] = $request->pais;
                    $data['municipio'] = $request->municipio;
                    $data['provincia'] = $request->provincia;
                    $data['bairro'] = $request->bairro;
                    $data['telefoneum'] = $request->telefoneum;
                    $data['telefonedois'] = $request->telefonedois;
                    $data['foto'] = $nm_100_um;
                    //$data['sobre'] = $request->sobre;

                    if ($nm_100_um=='') {

                        $data['foto'] = $estudante->foto;

                    }else{

                        $data['foto'] = $nm_100_um;
                    }

                    $Atualizar_estudante  = DB::table('estudantes')->where('id',$id)->update($data);

                    if (isset($request->bipassaporte)) {
                        $bi_passaporte = Storage::disk('public')->putFile('documentos', $request->bipassaporte);
                    }else {
                        $identifcacao = IdentificacaoEstudante::where('estudante_id',$id)->first();
                        $bi_passaporte = $identifcacao->arquivo;
                    }

                    $ident = array();
                    $ident['tipo'] = $request->tipo;
                    $ident['num_identificacao'] = $request->numero_identificacao;
                    $ident['nacionalidade'] = $request->nacionalidade;
                    $ident['arquivo'] = $bi_passaporte;
                    $atualizar_identificacao_emprego  = DB::table('identificacao_estudantes')->where('estudante_id',$id)->update($ident);


                    $situacaoemprego = array();
                    $situacaoemprego['nome_situacao'] = $request->situacaoemprego;
                    $atualizar_situacao_emprego  = DB::table('situacao_empregos')->where('estudante_id',$id)->update($situacaoemprego);


                    $dadosacademicos = array();
                    $dadosacademicos['situacao_emprego']=$request->situacaoemprego;
                    $atualizar_dados_academicos = DB::table('dados_academicos')->where('estudante_id',$id)->update($dadosacademicos);
                    $pega_dados_acamedicos = DadosAcademico::where('estudante_id',$id)->first();

                    $dadosacademicos_id = $pega_dados_acamedicos->id;
                    $graus = $request->graus;
                    //$instituicaos = $request->instituicaos;
                    //$cursos = $request->cursos;
                    //$data_inicios = $request->data_inicios;
                    //$data_terminos = $request->data_terminos;




                Alert::success('Sucesso!', 'Estudante atualizado com êxito');
                return redirect()->route('estudante.index');


                /*if (!empty($request->file('foto'))) {
                    $img_um = $request->file('foto');
                    $nome_100_um = hexdec(uniqid()) . '.' . $img_um->getClientOriginalExtension();
                    Image::make($img_um)->resize(200,200)->save('admin/assets/images/estudantes/estudante_' . $nome_100_um);
                    $nm_100_um = 'admin/assets/images/estudantes/estudante_' . $nome_100_um;

                    } else {
                    $nm_100_um = '';
                    }

                $inserir_user = User::create([
                'foto'=>$nm_100_um,
                'name'=>$request->nome,
                'email'=>$request->email,
                'password' => Hash::make($request->password),
                'estado'=>'estudante'
                ]);

                $pega_usuario = User::where('email','=',$request->email)->first();

                $inseir = new Estudante;
                $inseir->user_id = $pega_usuario->id;
                $inseir->nome = $request->nome;
                $inseir->genero = $request->genero;
                $inseir->nascimento = $request->nascimento;
                $inseir->pais = $request->pais;
                $inseir->municipio = $request->municipio;
                $inseir->provincia = $request->provincia;
                $inseir->bairro = $request->bairro;
                $inseir->telefoneum = $request->telefoneum;
                $inseir->telefonedois = $request->telefonedois;
                $inseir->foto = $nm_100_um;
                //$inseir->sobre = $request->sobre;
                $inseir->save();

                if ($inseir) {





                    foreach ($instituicaos as  $instituicao) {
                    $inserir_curso = Instituicao::create([
                    'dados_academico_id'=>$dadosacademicos_id,
                    'instituicao'=>$instituicao,
                    ]);
                    }

                    foreach ($cursos as  $curso) {
                    $inserir_curso = Curso::create([
                    'dados_academico_id'=>$dadosacademicos_id,
                    'curso' =>$curso,
                    ]);
                    }

                    foreach ($data_inicios as  $data_inicio) {
                    $inserir_dtinicio = DataInicio::create([
                    'dados_academico_id'=>$dadosacademicos_id,
                    'data_inicio'=>$data_inicio,
                    ]);
                    }

                    foreach ($data_terminos as  $data_termino) {
                    $inserir_dttermino =DataTermino::create([
                    'dados_academico_id'=>$dadosacademicos_id,
                    'data_termino'=>$data_termino,
                    ]);
                } */





        }

        public function destroy($id){

            $estudante = DB::table('estudantes')->where('id',$id)->first();
            $photo = $estudante->foto;
            if ($photo) {
            unlink($photo);
            DB::table('estudantes')->where('id',$id)->delete();

                Alert::success('Sucesso!', 'Estudante excluido com êxito');
                return redirect()->route('estudante.index');

            }else{

            DB::table('estudantes')->where('id',$id)->delete();

                Alert::success('Sucesso!', 'Estudante excluido com êxito');
                return redirect()->route('estudante.index');
            }

        }

}
