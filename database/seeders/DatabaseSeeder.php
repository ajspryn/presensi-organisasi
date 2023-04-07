<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Laravolt\Avatar\Facade as Avatar;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Membuat role superadmin
        $role = Role::create(['name' => 'Super Admin']);

        // Menyimpan role ke dalam database
        $role->save();

        // Membuat user dengan role superadmin
        $str = Str::random(10);
        $avatar = 'avatar/avatar-' . $str . '.png';
        Avatar::create('Super Admin')->save(storage_path(path: 'app/public/avatar/avatar-' . $str . '.png'));
        $user = User::factory()->create([
            'name' => 'admin',
            'username' => 'superadmin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'avatar' => $avatar,
        ]);

        $this->call(PermissionSeeder::class);

        // Memberikan role superadmin ke user
        $user->assignRole($role);

        // Menambahkan semua permission ke dalam role superadmin
        $permissions = \Spatie\Permission\Models\Permission::all();
        $role->givePermissionTo($permissions);
    }
}
