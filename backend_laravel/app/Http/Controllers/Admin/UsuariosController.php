<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Log;

class UsuariosController extends Controller
{
    //

    public function index()
    {
        try{
            //$users=Users::where()->get();
            $users = Users::with('cargos.departamentos') // Carga las relaciones
                    ->get();

            return response()->json(['usuarios' => $users], 200);
        }catch (\Exception $e)
        {
            return response()->json(['error' => $e], 404);
        }

    }

    public function store(Request $request)
    {  try{
               // Validación de datos
        $request->validate([
            'usuario' => 'required|string',
            'primerNombre' => 'required|string',
            'segundoNombre' => 'required|string',
            'primerApellido' => 'required|string',
            'segundoApellido' => 'required|string',
            'idDepartamento' => 'required|int',
            'idCargo' => 'required|int',
        ]);

            // Crear un nuevo objeto del modelo Post con los datos del formulario
            $user = new Users;
            $user->usuario = $request->input('usuario');
            $user->primerNombre = $request->input('primerNombre');
            $user->segundoNombre = $request->input('segundoNombre');
            $user->primerApellido = $request->input('primerApellido');
            $user->segundoApellido = $request->input('segundoApellido');
            $user->idDepartamento = $request->input('idDepartamento');
            //$user->created_at = date('Y-m-d H:i:s');
            $user->idCargo = $request->input('idCargo');

        // Guardar el nuevo registro en la base de datos
            $user->save();

        // Redireccionar a la página deseada después de la inserción

           return response()->json(['msg' => 'Transaccion realizada'], 200);
        }catch (\Exception $e)
        {
            return response()->json(['error' => $e], 404);
        }
    }

    public function update(Request $request)
    {  try{
               // Validación de datos
            // Crear un nuevo objeto del modelo Post con los datos del formulario
            //$user = Users::find('mmrs');
            Log::alert("666--" . $request);
            $id=$request->newuser;
            Log::alert("666--" . $id);
            $user = Users::where('usuario',$id)->get();
            Log::alert("666--" . $user);
            $user->usuario = $request->usuario;
            Users::where('usuario', $request->newuser)
            ->update([
                'usuario' => $request->usuario,
                'primerNombre'=> $request->primerNombre,
                'segundoNombre'=>  $request->segundoNombre,
                'primerApellido'=>  $request->primerApellido,
                'segundoApellido'=>  $request->segundoApellido,
                'idDepartamento'=>  $request->idDepartamento,
                'idCargo'=>$request->idCargo,

            ]);
          /*  $user->primerNombre = $request->primerNombre;
            $user->segundoNombre = $request->segundoNombre;
            $user->primerApellido = $request->primerApellido;
            $user->segundoApellido = $request->segundoApellido;
            $user->idDepartamento = $request->idDepartamento;
            $user->idCargo = $request->idCargo;*/
            //$user->save();

        // Redireccionar a la página deseada después de la inserción

           return response()->json(['msg' => 'Transaccion realizada'], 200);

        }catch (\Exception $e)
        { Log::alert("falla mostrra el listado--" . $e);
            return response()->json(['error' => $e], 404);
        }
    }

    public function edit(Request $request)
    {  try{

           $id=$request->input('usuario');

            // Crear un nuevo objeto del modelo Post con los datos del formulario
            $user = Users::where('usuario',$id)->get();
            return response()->json(['usuario' => $user], 200);

        }catch (\Exception $e)
        {
            return response()->json(['error' => $e], 404);
        }
    }


}
