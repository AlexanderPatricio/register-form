<?php

namespace App\Http\Controllers;

use App\Models\Datos;
use Spatie\Dropbox\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use League\Flysystem\Filesystem;
//use Spatie\Dropbox\Client;
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
        if (!empty($datos)) {
            return redirect()->route('form.add.data', [$request->cedula]);
        }
        else {
            return back()->withInput()->with('error', 'Cedula no encontrada.');
        }
    }

    public function list_data($cedula) {
        $datos = Datos::where('cedula', $cedula)->first();
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


//        $dropboxClient = new Client(env('DROPBOX_ACCESS_TOKEN'));
//        $adapter = new DropboxAdapter($dropboxClient);
//        $filesystem = new Filesystem($adapter);

//        $client = new Client(env('DROPBOX_ACCESS_TOKEN'));
//        $adapter = new DropboxAdapter($client);
//        $filesystem = new Filesystem($adapter, ['case_sensitive' => false]);
//
//        $uploaded = $filesystem->put('/images', $request->file('comprobante_deposito'), []);
//        $links['share'] = $dropboxClient->createShareableLink($request->file('comprobante_deposito'));
//        $links['view'] = $dropboxClient->createTemporaryDirectLink($request->file('comprobante_deposito'));
//        dd($links);

        $url_enlace = '';
        if ($request->file('comprobante_deposito')) {
            $ruta_enlace = Storage::disk('dropbox')->put(
              '/',
                $request->file('comprobante_deposito')
            );
//            $aa = Storage::disk('dropbox')->putFileAs(
//                '/',
//                $request->file('comprobante_deposito'),
//                $request->file('comprobante_deposito')->getClientOriginalName()
//            );

            dd($ruta_enlace, $request->file('comprobante_deposito')->getClientOriginalName());
//            dd($aa, $ruta_enlace, $request->file('comprobante_deposito')->getClientOriginalName());
            $response = $this->dropbox->createSharedLinkWithSettings(
                $request->file('comprobante_deposito')->getClientOriginalName());
            dd($response);
//            $url = Storage::disk('dropbox')->url($ruta_enlace);
//            dd($ruta_enlace);
//            $reposnse_enlace = $this->dropbox->createSharedLinkWithSettings(
//                $ruta_enlace,
//                ["requested_visibility" => "public"]
//            );
//            $url_enlace = str_replace('dl=0', 'raw=1', $reposnse_enlace['url']);
        }

        dd($url_enlace);
//        $datos->nombres = $request->description;
//        $datos->nombres = $request->description;
//        $datos->nombres = $request->description;
        $datos->update();
        return redirect()->route('form.add.data', [$cedula])->with('success', 'Los datos fueron guardados correctamente.');
    }
}
