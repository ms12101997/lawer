<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'mostafa', 
            'email' => 'ms12101997@yahoo.com',
            'password' => bcrypt('123456'),
            'roles_name' => ["owner"],
            'Status' => 'مفعل',
        ]);
      
            $role = Role::create(['name' => 'owner']);
             
            $role->syncPermissions(Permission::query()->get());
       
            $user->assignRole([$role->id]);
    }
}
