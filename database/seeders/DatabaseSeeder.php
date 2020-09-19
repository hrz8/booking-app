<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Webpatser\Uuid\Uuid;

use App\Models\Permission;
use App\Models\User;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Permission
        $permission1 = Permission::create([
            'id' => Uuid::generate(4)->string,
            'code' => 'viewBooking',
            'name' => 'View Booking',
            'description' => 'Permission for view booking reports',
        ]);
        $permission2 = Permission::create([
            'id' => Uuid::generate(4)->string,
            'code' => 'viewUserBooking',
            'name' => 'View User Booking',
            'description' => 'Permission for view users\' bookings\'',
        ]);
        
        // Admin User
        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'adminroot',
            'password' => Hash::make('12345678')
        ]);
        $admin->permissions()->saveMany([$permission1, $permission2]);

        // Users & Booking
        User::factory(10)
            ->has(Booking::factory()->count(3))
            ->create();
    }
}
