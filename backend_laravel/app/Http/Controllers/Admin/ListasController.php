<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cargos;
use App\Models\Departamentos;


class ListasController extends Controller
{
    //

    public function ListaCargos()
    {
        //Listamos todos los productos
        try{
            $cargos= Cargos::where('activo',1)->get();

            return response()->json(['cargos' => $cargos], 200);

        }catch (\Exception $e)
        {
            return response()->json(['error' => 'No hay datos'], 404);
        }
        
    }

    public function ListaDepartamentos()
    {
        try{
        //Listamos todos los productos
        $departamentos=Departamentos::where('activo',1)->get();

        return response()->json(['departamentos' => $departamentos], 200);
        }catch (\Exception $e)
        {
            return response()->json(['error' => 'No hay datos'], 404);
        }
    }
}
