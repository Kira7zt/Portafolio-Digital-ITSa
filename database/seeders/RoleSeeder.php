<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $admin = Role::firstOrCreate(['name' => 'Administrador']);
        $docente = Role::firstOrCreate(['name' => 'Docente']);

        // Crear permisos básicos
        $permisos = [
            'gestionar usuarios',
            'gestionar roles',
            'subir documentacion',
            'ver documentacion',
            'eliminar documentacion',
        ];

        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso]);
        }

        // Asignar permisos a cada rol
        $admin->givePermissionTo(['gestionar usuarios',
            'gestionar roles', 'ver documentacion']); // Admin tiene todos los permisos
        $docente->givePermissionTo(['subir documentacion', 'ver documentacion', 'eliminar documentacion']);
    }
}
