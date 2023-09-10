<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'read_ormas']);
        Permission::create(['name' => 'tambah_ormas']);
        Permission::create(['name' => 'validasi_ormas']);
        Permission::create(['name' => 'edit_ormas']);
        Permission::create(['name' => 'selesai_ormas']);
        Permission::create(['name' => 'tolak_ormas']);
        Permission::create(['name' => 'tolak_ibadah']);
        Permission::create(['name' => 'validasi_ibadah']);
        Permission::create(['name' => 'selesai_ibadah']);
        Permission::create(['name' => 'read_keramaian']);
        Permission::create(['name' => 'tambah_keramaian']);
        Permission::create(['name' => 'edit_keramaian']);
        Permission::create(['name' => 'validasi_keramaian']);
        Permission::create(['name' => 'tolak_keramaian']);
        Permission::create(['name' => 'view_surat']);
        Permission::create(['name' => 'selesai_keramaian']);

        

        Role::create(['name' => 'admin'])->givePermissionTo(['read_ormas','tambah_ormas','validasi_ormas','edit_ormas','selesai_ormas','tolak_ormas']);
        Role::create(['name' => 'validator']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'user2']);
        
    }
}
