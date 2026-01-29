<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller{


    // Permissões
    public function index(){
        $permissaos = Permission::all();
        return view('admin.Acl.permissoes.index',compact('permissaos'));
    }

    

    public function create(){
        return view('admin.Acl.permissoes.create');
    }


    public function store(Request $request){

        Alert::warning('Atenção!', 'existem campos não validados');

        $validateData = $request->validate(

            [
                'permissao' => 'required',
                'grupo' => 'required',
            ],

            [
            'permissao.required' => 'Insira o nome da permissão',
            'grupo.required' => 'Selecione o nome do grupo',
            ],

        );

                $role = Permission::create([
                'name'=>$request->permissao,
                'group_name'=>$request->grupo
                ]);

                // $inseir = new Permission;
                // $inseir->provincia_id = $request->provincia;
                // $inseir->municipio = $request->municipio;
                // $inseir->save();

        Alert::success('Sucesso!', 'Pemissao inserida com êxito');
        return redirect()->route('permissao.index');




    }


    public function show($id){
        //
    }


    public function edit($id){

        $permissao = Permission::find($id);
        return view('admin.Acl.permissoes.edit',compact('permissao'));
    }


    public function update(Request $request, $id){

        $data = array();
        $data['name'] = $request->permissao;
        $data['group_name'] = $request->grupo;
        DB::table('permissions')->where('id',$id)->update($data);
        Alert::success('Sucesso!', 'Permissão actualizada com êxito');
        return redirect()->route('permissao.index');

    }


    public function destroy($id){

        DB::table('permissions')->where('id',$id)->delete();
        Alert::success('Sucesso!', 'Permissão excluida com êxito');
        return redirect()->route('permissao.index');

    }



    //Regras

     function RegraIndex(){
        $regras = Role::all();
        return view('admin.Acl.regras.index',compact('regras'));
     }

      function RegraCreate(){
        return view('admin.Acl.regras.create');
      }


      function RegraEdit($id){
        $regra = Role::find($id);
        return view('admin.Acl.regras.edit',compact('regra'));
      }


       function RegraPost(Request $request){

        Alert::warning('Atenção!', 'existem campos não validados');

        $validateData = $request->validate(

            ['regra' => 'required',],
            ['regra.required' => 'Insira o nome da regra',],

        );

                $role = Role::create([
                 'name'=>$request->regra,
                ]);

            Alert::success('Sucesso!', 'Regra inserida com êxito');
            return redirect()->route('regra.index');

       }

        function RegraUpdate(Request $request , $id) {
            $data = array();
            $data['name'] = $request->regra;
            DB::table('roles')->where('id',$id)->update($data);
            Alert::success('Sucesso!', 'Regra actualizada com êxito');
            return redirect()->route('regra.index');
        }

        function RegraDestroy($id)  {
            DB::table('roles')->where('id',$id)->delete();
            Alert::success('Sucesso!', 'Regra excluida com êxito');
            return redirect()->route('regra.index');

        }


        //Regras e Permissões


          function rolepermissionIndex()  {
            $regras = Role::all();
            $permissaos = Permission::all();
            $permission_groups = User::getpermissionGroups();
            return view('admin.Acl.regras.rolepermisson',compact('regras', 'permissaos','permission_groups'));
          }


            function rolepermissionCreate() {
                $regras = Role::all();
                $permissaos = Permission::all();
                $permission_groups = User::getpermissionGroups();
                return view('admin.Acl.regras.createrolepermisson',compact('regras','permissaos','permission_groups'));
            }
            

            function AdminRoleEdit($id){
                $role = Role::find($id);
                $permissions = Permission::all();
                $permission_groups = User::getpermissionGroups();
                return view('admin.Acl.regras.editrolepermisson',compact('role','permissions','permission_groups'));
            }


              function rolepermissionUpdate(Request $request, $id)  {
                $role = Role::find($id);
                $permissions = $request->permission;

                if (!empty($permissions)) {
                    
                    $role->syncPermissions($permissions);

                } else {
                    

                }
                
                 Alert::success('Sucesso!', 'Regra e Permissão actualizada com êxito');
                 return redirect()->route('rolepermission.index');

              }

          function rolepermissionStore(Request $request) {
              
                Alert::warning('Atenção!', 'existem campos não validados');

                $validateData = $request->validate(
                    ['role_id' => 'required',],
                    ['role_id.required' => 'Selecione o nome da regra',],
                );

                   $data = array();
                   $permissions = $request->permission;

                   foreach ($permissions as $key => $item) {

                  $permi = DB::table('role_has_permissions')
                  ->where('role_id',$request->role_id)
                  ->where('permission_id',$item)
                  ->first();

                  if ($permi) {
                  //  Alert::warning('Atenção!', 'Esta permissão já foi inserida');
                  } else {
                    $data['role_id'] = $request->role_id;
                    $data['permission_id'] = $item;
                    DB::table('role_has_permissions')->insert($data);
                  }
                  
                   }

    
                   Alert::success('Sucesso!', ' Regra e Permissão inserida com êxito');

                return redirect()->route('rolepermission.index');

          }



          function rolepermissionDestroy($id)  {
            
            $role = Role::find($id);

             if (!is_null($role)) {
                $role->delete();
             }
  
             Alert::success('Sucesso!', 'Regra e Permissão excluida com êxito');
             return redirect()->route('rolepermission.index');
             
          }

}
