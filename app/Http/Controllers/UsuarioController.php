<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public $usuarioed;
    //MOSTRAR TODOS LOS USUARIOS
    public function mostrar_usuarios(Request $requestusuario)
    {
        $texto = $requestusuario->textousuario;
        if ($texto == null) {
            return view('administrador.usuarios', [
                'usuarios' => user::paginate(10)
            ]);
        } else {
            $usuarios = User::where('name', 'LIKE', '%' . $texto . '%')->paginate(2);
            return view('administrador.usuarios', compact('usuarios', 'texto'));
        }
    }

    //EDITAR USUARIO
    public function editar_usuario($id)
    {
        $usuario = User::find($id);
        return view('administrador.editar_usuario', compact('usuario'));
    }

    //guardar cambios
    public function save_user(Request $us, User $usuarioed)
    {
        if ($us->clave_txt == null) {
            $usuarioed->name = $us->usuario_txt;
            $usuarioed->email = $us->email_txt;
            $usuarioed->admin = $us->admin_txt;
        } else {
            $usuarioed->name = $us->usuario_txt;
            $usuarioed->email = $us->email_txt;
            $usuarioed->admin = $us->admin_txt;
            $clave = $us->clave_txt;
            $usuarioed->password = Hash::make($clave);
        }
        $usuarioed->save();

        return redirect()->route('control_user');
    }
}
