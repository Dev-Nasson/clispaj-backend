<?php

/* use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\v1\CategoriaController;
use App\Http\Controllers\API\v1\ProdutoController;
use App\Http\Controllers\Api\TesteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CountryCrontoller;
use Illuminate\Routing\RouteGroup;
*/
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});

*/
// Route::get('/teste',[TesteController::class,'index']);
// Route::get('/country',[CountryCrontoller::class,'index']);
// Route::post('/teste/store',[TesteController::class,'store']);
// Route::put('/teste/update',[TesteController::class,'update']);
// Route::group(['middleware'=>'api','prefix'=>'auth'],function ($router) {
//     Route::post('login',[AuthController::class,'login']);
//     Route::post('refresh', [AuthController::class,'refresh']);
//     Route::post('logout', [AuthController::class,'logout']);
//     Route::post('register',[AuthController::class,'register']);
// });

Route::group(['middleware'=>'api','prefix'=>'auth'],function ($router) {

         Route::post('login', 'Api\AuthController@login');
        //Rotas do Serviço
        Route::get('servico', 'Api\ServicoController@index');
        Route::get('servicoservidor', 'Api\ServicoController@servicoservidor');
        Route::get('servicosinglelist', 'Api\ServicoController@Servicosinglelist');

        Route::post('servico/store', 'Api\ServicoController@store');
        Route::get('servico/servicoedit/{id}', 'Api\ServicoController@edit');
        Route::post('servico/update/{id}', 'Api\ServicoController@update');
        Route::delete('servico/{id}','Api\ServicoController@destroy');
        Route::get('servicosingle/{id}','Api\ServicoController@show');

        //Rotas do profissional
        Route::get('profissional', 'Api\ProfissionalController@index');
        Route::get('profiservidor', 'Api\ProfissionalController@profissionalservidor');

        Route::post('profissional/store', 'Api\ProfissionalController@store');
        Route::get('profissional/profissionaledit/{id}', 'Api\ProfissionalController@edit');
        Route::post('profissional/update/{id}', 'Api\ProfissionalController@update');
        Route::delete('profissional/{id}','Api\ProfissionalController@destroy');

        //Rotas do galeria
        Route::get('galeria', 'Api\GaleriaController@index');
        Route::get('galeriaservidor', 'Api\GaleriaController@galeriaservidor');
        Route::post('galeria/store', 'Api\GaleriaController@store');
        Route::get('galeria/galeriaedit/{id}', 'Api\GaleriaController@edit');
        Route::post('galeria/update/{id}', 'Api\GaleriaController@update');
        Route::delete('galeria/{id}','Api\GaleriaController@destroy');

        //Rotas do Bannner
        Route::get('banner','Api\BannerController@index');
        Route::get('bannerservidor','Api\BannerController@bannerservidor');

        Route::post('banner/store', 'Api\BannerController@store');
        Route::get('banner/banneredit/{id}', 'Api\BannerController@edit');
        Route::post('banner/update/{id}', 'Api\BannerController@update');
        Route::delete('banner/{id}','Api\BannerController@destroy');

        //Rotas do Contacto
        Route::get('contacto','Api\ContactoController@index');
        Route::post('contacto/store', 'Api\ContactoController@store');
        Route::get('contacto/contactoedit/{id}', 'Api\ContactoController@edit');
        Route::post('contacto/update/{id}', 'Api\ContactoController@update');
        Route::delete('contacto/{id}','Api\ContactoController@destroy');

        //Rotas do Horário
        Route::get('horario','Api\HorarioController@index');
        Route::get('horario/detalhe','Api\HorarioController@Detalhe');
        Route::post('horario/store', 'Api\HorarioController@store');
        Route::get('horario/horarioedit/{id}', 'Api\HorarioController@edit');
        Route::post('horario/update/{id}', 'Api\HorarioController@update');
        Route::delete('horario/{id}','Api\HorarioController@destroy');

        //Rotas de Testemunhos
        Route::get('testemunho','Api\TestemunhoController@index');
        Route::get('testemunhoservidor','Api\TestemunhoController@testemunhoservidor');
        Route::get('testemunho/detalhe','Api\TestemunhoController@Detalhe');
        Route::post('testemunho/store', 'Api\TestemunhoController@store');
        Route::get('testemunho/horarioedit/{id}', 'Api\TestemunhoController@edit');
        Route::post('testemunho/update/{id}', 'Api\TestemunhoController@update');
        Route::delete('testemunho/{id}','Api\TestemunhoController@destroy');

        //testemunhoservidor
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');



});

