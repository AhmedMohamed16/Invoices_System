<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'name' => 'AhmedMohamed', 
            'email' => 'admin@admin.com',
            'password' => bcrypt('111111111'),
            'roles_name' => ["admin"],
            'Status' => 'مفعل',    
            ]);
      
            $role = Role::create(['name' => 'admin']);
       
            $permissions = Permission::pluck('id','id')->all();
      
            $role->syncPermissions($permissions);
       
            $user->assignRole([$role->id]);
    
    }
}
