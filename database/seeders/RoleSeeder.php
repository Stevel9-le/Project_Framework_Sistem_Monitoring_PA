<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Reset cache permission (Wajib agar tidak error)
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        // role dengan huruf kecil
        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleStaff = Role::firstOrCreate(['name' => 'staff']);

        // Buat Akun ADMIN
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Cek email biar gak duplikat
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'), // Passwordnya: password
            ]
        );
        $admin->assignRole($roleAdmin); // <-- Kasih jabatan Admin

        // Buat Akun STAFF
        $staff = User::firstOrCreate(
            ['email' => 'staff@gmail.com'],
            [
                'name' => 'Staff',
                'password' => Hash::make('password'),
            ]
        );
        $staff->assignRole($roleStaff); // <-- Kasih jabatan User
    }
}
