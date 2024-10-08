<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or retrieve the admin user
        $user = User::updateOrCreate(
            ['email' => 'sanjeev@sanmisha.com'], // Search for user by email
            [
                'name' => 'Sanjeev MiddleName Divekar',
                'password' => Hash::make('abcd123') // Hash the password
            ]
        );

        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id], // Search for user by email
            [
                'first_name' => 'Sanjeev',
                'middle_name' => 'MiddleName',
                'last_name' => 'Divekar',
                'email' => 'sanjeev@sanmisha.com'
            ]
        );


        // Create or retrieve the admin role
        $role = Role::firstOrCreate(['name' => 'admin']);
        
        // Retrieve all permissions and sync them to the admin role
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        // Assign the role to the user
        $user->syncRoles([$role->id]); // Use syncRoles to avoid duplication
    }
}
