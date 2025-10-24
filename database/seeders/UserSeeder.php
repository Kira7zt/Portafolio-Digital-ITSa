<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Administrativo;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. USUARIO ADMINISTRADOR
        $userAdmin = User::firstOrCreate(
            ['email' => 'jose007suarez@gmail.com'],
            [
                'name' => 'Administrador',
                'password' => bcrypt('kira12345'),
            ]
        );
        $userAdmin->assignRole('Administrador');
        
        // 💡 PASO 2: Crear el registro en la tabla administrativos para el Administrador
        Administrativo::firstOrCreate(
            ['ci' => '8690995'], // Usar un campo unique como CI/Cédula
            [
                'usuario_id' => $userAdmin->id, // ¡Vinculación vital!
                'nombre' => 'José',
                'apellido' => 'Suárez',
                'ci' => '8690995', 
                'fecha_nacimiento' => '2006-04-06',
                'telefono' => '76412670',
                'direccion' => 'Calle Jacaranda',
                'profesion' => 'Desarrollador-Web',
            ]
        );


        // 2. USUARIO DOCENTE
        $userDocente = User::firstOrCreate(
            ['email' => 'mantenimientojs2025@gmail.com'],
            [
                'name' => 'DocentePrueba',
                'password' => bcrypt('docente12345'),
            ]
        );
        $userDocente->assignRole('Docente');

        // 💡 PASO 2: Crear el registro en la tabla administrativos para el Docente
        Administrativo::firstOrCreate(
            ['ci' => '1234567'], // Usar un campo unique como CI/Cédula
            [
                'usuario_id' => $userDocente->id, // ¡Vinculación vital!
                'nombre' => 'Docente',
                'apellido' => 'Prueba',
                'ci' => '1234567',
                'fecha_nacimiento' => '1979-03-13',
                'telefono' => '76977140',
                'direccion' => 'Puntiti Chico',
                'profesion' => 'Licenciado en Contaduria General',
            ]
        );
    }
}