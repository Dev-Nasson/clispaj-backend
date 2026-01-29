<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Estudante;
use App\Models\Curriculum;
use App\Models\DadosAcademico;
use App\Models\IdentificacaoEstudante;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Image;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SituacaoEmprego;
use App\Models\Curriculum\Idioma;
use App\Models\Curriculum\Educacao;
use App\Models\Curriculum\Competencia;
use App\Models\Curriculum\Interesse;
use App\Models\Curriculum\Profissional;

//Dados academicos
use App\Models\Academico\Curso;
use App\Models\Academico\DataInicio;
use App\Models\Academico\DataTermino;
use App\Models\Academico\Grau;
use App\Models\Academico\Instituicao;


use Illuminate\Support\Facades\Storage;

use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers{

    use PasswordValidationRules;

    public function create(array $input){

        Alert::warning('Atenção!', 'existem campos não validados');


         Validator::make($input, [

            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255', Rule::unique(User::class),],
            'password' => $this->passwordRules(),

            //estudante
            'nome'=>'required',
             'genero' => 'required',
             'nascimento' => 'required|date|before_or_equal:' . now()->subYears(18)->format('Y-m-d'),
            // 'nascimento' => 'required',
            'pais' => 'required',
            'municipio' => 'required',
            'provincia' => 'required',
            'bairro' => 'required',
            'telefoneum' => 'required',
            'telefonedois' => 'required',

            //identifcacao
            'nacionalidade' => 'required',

            //dados academicos
            // 'graus'=>'required',
            'situacaoemprego'=>'required',
         ],

         [
            'nome.required' => 'Insira o nome',
            'genero.required' => 'Selecione o género por favor',
             'nascimento.required' => 'Insira a data de nascimento',
             'nascimento.before_or_equal' =>'Vocé é menor de idade',
            'pais.required' => 'Insira o país',
            'municipio.required' => 'Insira o município',
            'provincia.required' => 'Insira a provincia',
            'bairro.required' => 'Insira o bairro',
            'telefoneum.required' => 'Insira o  número de telefone 1',
            'telefonedois.required' => 'Insira o  número de telefone 2',

            'nacionalidade.required' => 'Insira a nacionalidade',
           // 'graus.required' => 'O grau é obrigatório',
            'situacaoemprego.required' => 'Selecione a situação de emprego',

        ],


        )->validate();

        $user = User::create([

            'name' => $input['nome'],
            'role'=>'Estudante',
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'estado'=>'usuario'

        ]);

        if ($input['role']) {
            $user->assignRole($input['role']);
        }

        $userId = $user->id;

        $estudante =  Estudante::create([
            'user_id'=>$userId,
            'nome'=>$input['nome'],
             'genero'=>$input['genero'],
            'nascimento'=>$input['nascimento'],
            'pais'=>$input['pais'],
            'municipio'=>$input['municipio'],
            'provincia'=>$input['provincia'],
            'bairro'=>$input['bairro'],
            'telefoneum'=>$input['telefoneum'],
            'telefonedois'=>$input['telefonedois'],
             //'foto'=>$nm_100_um,
             //'sobre'=>$input['sobre'],
        ]);

         if ($estudante) {

              $estudante_id = $estudante->id;


                if (isset($input['bipassaporte'])) {
                    $bi_passaporte = Storage::disk('public')->putFile('documentos', $input['bipassaporte']);
                }else {
                    $bi_passaporte = '';
                }


                $identifcacao = IdentificacaoEstudante::create([
                'estudante_id'=>$estudante_id,
                'tipo'=>$input['tipo'],
                'nacionalidade'=>$input['nacionalidade'],
                'num_identificacao'=>$input['numero_identificacao'],
                'arquivo'=> $bi_passaporte,

                ]);

               /*$situacaoemprego = SituacaoEmprego::create([
                 'estudante_id'=>$estudante_id,
                 'nome_situacao'=>$input['situacaoemprego'],
               ]); */

                $dadosacademicos = DadosAcademico::create([
                'estudante_id'=>$estudante_id,
                'universidade_id'=>0,
                // 'grau_academico'=>$input['grau_academico'],
                // 'instituicao'=>$input['instituicao'],
                // 'curso'=>$input['curso'],
                // 'data_inicio'=>$input['data_inicio'],
                // 'data_termino'=>$input['data_termino'],
                 'situacao_emprego'=>$input['situacaoemprego'],


              ]);

              $dadosacademicos_id = $dadosacademicos->id;
              $graus = $input['graus'];
              $instituicaos = $input['instituicaos'];
              $cursos = $input['cursos'];
              $data_inicios = $input['data_inicios'];
              $data_terminos = $input['data_terminos'];



              foreach ($graus as  $grau) {
                $inserir_grau = Grau::create([
                  'dados_academico_id'=>$dadosacademicos_id,
                  'grau'=>$grau,
                ]);
              }


              foreach ($instituicaos as  $instituicao) {
                $inserir_curso = Instituicao::create([
                  'dados_academico_id' => $dadosacademicos_id,
                  'instituicao' => $instituicao,
                ]);
              }


              foreach ($cursos as  $curso) {
                $inserir_curso = Curso::create([
                  'dados_academico_id' => $dadosacademicos_id,
                  'curso' => $curso,
                ]);
              }


              foreach ($data_inicios as  $data_inicio) {
                $inserir_dtinicio = DataInicio::create([
                  'dados_academico_id' => $dadosacademicos_id,
                  'data_inicio'=>$data_inicio,
                ]);
              }


              foreach ($data_terminos as  $data_termino) {
                $inserir_dttermino = DataTermino::create([
                  'dados_academico_id' => $dadosacademicos_id,
                  'data_termino'=>$data_termino,
                ]);
              }







         }

        $user->estudante()->save($estudante);
        // Alert::success('Success Title', 'Estudante inserido com êxito');
        Alert::success('Sucesso', 'Estudante inserido com êxito');
        return $user;
    }

}
