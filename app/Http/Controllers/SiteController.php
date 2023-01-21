<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;

use Spatie\FlysystemDropbox\DropboxAdapter;


class SiteController extends Controller
{
    public function __construct() {
    }

    public function index() {
        return view('validar_ci_form');
    }

    public function validate_ci(Request $request) {
        $datos = Datos::where('cedula', $request->cedula)->first();
        if (!empty($datos) && !empty($datos->codigo_dactilar)) {
            return redirect()->route('form.list.data', [$request->cedula]);
        }
        else {
            return back()->withInput()->with('error', 'Registro no encontrado.');
        }
    }

    public function list_data($cedula) {
        $datos = Datos::where('cedula', $cedula)->first();
        if (!empty($datos) && empty($datos->codigo_dactilar)) {
            return redirect()->route('form.ci.query', [$cedula])->with('info', 'Aún no se registra los datos.');
        }
        if (!empty($datos)) {
            return view('form-list', compact('datos'));
        }
        else {
            return back()->withInput()->with('error', 'Cedula no encontrada.');
        }
    }

    public function add_data($cedula) {
        $datos = Datos::where('cedula', $cedula)->first();
        if (!empty($datos)) {
            if (!empty($datos->codigo_dactilar)) {
                return redirect()->route('form.list.data', [$cedula])->with('info', 'Datos enviados anteriormente.');
            } else {
                $provinces = json_decode(file_get_contents(public_path() . "/json_data/provincias.json"), true);
                return view('form', compact('provinces', 'cedula'));
            }
        }
        else {
            return redirect()->route('form.ci')->with('error', 'Cedula no encontrada.');
        }
    }

    public function store($cedula, Request $request)
    {
        $datos = Datos::where('cedula', $cedula)->first();
        if (!empty($datos) && !empty($datos->codigo_dactilar)) {
            return redirect()->route('form.list.data', [$cedula])->with('info', 'Datos enviados anteriormente.');
        }
        $datos->codigo_dactilar = $request->codigo_dactilar;
        $datos->nombres = $request->nombres;
        $datos->provincia = $request->provincia;
        $datos->canton = $request->canton;
        $datos->parroquia = $request->parroquia;
        $datos->direccion = $request->direccion;
        $datos->correo = $request->correo;
        $datos->celular = $request->celular;
        $datos->convencional = $request->convencional;
        $datos->estado_civil = $request->estado_civil;
        $datos->cedula_conyuge = $request->cedula_conyuge;
        $datos->nombres_conyuge = $request->nombres_conyuge;
        $datos->numero_hijos = $request->numero_hijos;
        $datos->update();
        return redirect()->route('form.list.data', [$cedula])->with('success', 'Los datos fueron guardados correctamente.');
    }
}
