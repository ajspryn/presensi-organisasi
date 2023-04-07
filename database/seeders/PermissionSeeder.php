<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user read',
            'user create',
            'user update',
            'user delete',
            'role read',
            'role create',
            'role update',
            'role delete',
            'organisasi read',
            'organisasi create',
            'organisasi update',
            'organisasi delete',
            'kelompok read',
            'kelompok create',
            'kelompok update',
            'kelompok delete',
            'anggota read',
            'anggota create',
            'anggota update',
            'anggota delete',
            'materi read',
            'materi create',
            'materi update',
            'materi delete',
            'dokumentasi read',
            'dokumentasi create',
            'dokumentasi update',
            'dokumentasi delete',
            'rekap presensi read',
            'rekap presensi create',
            'rekap presensi update',
            'rekap presensi delete',
            'keuangan read',
            'keuangan create',
            'keuangan update',
            'keuangan delete',
            'event read',
            'event create',
            'event update',
            'event delete',
            'agenda read',
            'agenda create',
            'agenda update',
            'agenda delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
