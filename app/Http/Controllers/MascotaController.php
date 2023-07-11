<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class MascotaController
 * @package App\Http\Controllers
 */
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mascotas_usuarios($usuario)
    {
        $mascotas = Mascota::where('id_user', '=', $usuario)->paginate();
        return view('administrador.mascotas_usuarios', compact('mascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $mascotas->perPage());
    }
    public function admin(Request $request)
    {
        $texto = $request->texto;
        $mascotas = null;
        if ($texto == null) {
            $mascotas = Mascota::paginate();
        } else {
            $mascotas = DB::table('mascotas')
                ->where('nombre', 'LIKE', '%' . $texto . '%')
                ->paginate(10);
        }
        return view('administrador.mascotas', compact('mascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $mascotas->perPage());
    }

    public function index()
    {
        $mascotas = Mascota::where('id_user', '=', Auth::user()->id)->paginate();
        return view('mascota.index', compact('mascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $mascotas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascota = new Mascota();
        return view('mascota.create', compact('mascota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mascota::$rules);

        $mascota = Mascota::create($request->all());

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::where("mascota_id", "=", $id)->first();

        return view('mascota.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::where('mascota_id', '=', $id)->firstOrFail();

        if ($mascota->id_user !== auth()->id()) {
            abort(403, 'Parace que esa no es su mascota');
        } else {
            return view('mascota.edit', compact('mascota'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mascota $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $mascota_id = $request->input('mascota_id');
        $nombre = $request->input('nombre');
        $edad = $request->input('edad');
        $raza = $request->input('raza');
        $condicion = $request->input('condicion');
        $genero = $request->input('genero');

        Mascota::where('mascota_id', $mascota_id)
            ->update([
                'nombre' => $nombre,
                'edad' => $edad,
                'raza' => $raza,
                'condicion' => $condicion,
                'genero' => $genero,
                // Actualiza aquí los demás atributos según tus necesidades
            ]);

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mascota = Mascota::where('mascota_id', '=', $id)
                   ->where('id_user', '=', auth()->id())
                   ->delete();


        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota deleted successfully');
    }
}
