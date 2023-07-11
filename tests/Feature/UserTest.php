<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    public function testCrearUsuario()
    {
        // Datos del usuario a crear
        $usuario = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password123',
            'telefono' => '123456789',
            'cedula' => '1234567890',
            'direccion' => 'Calle Principal 123',
        ];

        // Envía una solicitud POST para crear el usuario
        $response = $this->post('/register', $usuario);

        // Verifica que se haya creado correctamente (código de estado 201)
        $response->assertStatus(201);

        // Verifica que el usuario se haya guardado en la base de datos
        $this->assertDatabaseHas('users', ['email' => $usuario['email']]);
    }
}







}
