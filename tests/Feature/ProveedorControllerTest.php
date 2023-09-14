<?php

namespace Tests;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProveedorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_creando_usuario_de_prueba_luego_loguearse_y_probar_crud_proveedores(): void
    {
        $user = User::factory()->create([
            'username' => 'creando',
            'password' => Hash::make('otrapassword'),
        ]);

        $response = $this->post('/login', [
            'username' => 'creando',
            'password' => ('otrapassword'),
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
 
        // Define el valor máximo permitido para el ID
        $maxId = 100;

        // Obtiene el último ID utilizado en la tabla de proveedores (ajusta el nombre de la tabla según sea necesario)
        $lastId = DB::table('proveedores')->max('id');

        // Verifica si el último ID utilizado supera el valor máximo permitido
        if ($lastId >= $maxId) {
            // Se lanzará una excepción
            throw new \Exception("Se ha alcanzado el límite máximo de IDs para los proveedores.");
        }

        // Incrementa el último ID para la siguiente inserción
        $nextId = $lastId + 1;

        $response1 = $this->get('/proveedor');

        $response1->assertStatus(200);
        //creando nuevo proveedor  
        $response2 = $this->get('/crear-proveedor');
        $response2->assertStatus(200);
        //creando nuevo proveedor
        $response3 = $this->post('/proveedor', [
            'id' => $nextId, // Aquí se utiliza el ID incrementado
            'empresa' => 'empresa',
            'name' => 'name',
            'ruc' => '123456789',
            'dv' => '1',
            'direccion' => 'direccion',
            'barrio' => 'barrio',
            'callelateral' => 'callelateral',
            'referencia' => 'referencia',
            'telefono' => '123456789',
            'email' => '',
        ]); 
        $response3->assertStatus(302);
        //editando proveedor
        $response4 = $this->get("/editar-proveedor/{$nextId}");
        $response4->assertStatus(200);
        //editando proveedor
        $response5 = $this->put("/editar-proveedor/{$nextId}", [
            'empresa' => 'empresa',
            'name' => 'name',
            'ruc' => '123456789',
            'dv' => '1',
            'direccion' => 'direccion',
            'barrio' => 'barrio',
            'callelateral' => 'callelateral',
            'referencia' => 'referencia',
            'telefono' => '123456789',
            'email' => '',
        ]);
        $response5->assertStatus(302);
        //eliminando proveedor
        $response6 = $this->delete("/proveedor/delete/{$nextId}");
        $response6->assertStatus(302);

    }


}