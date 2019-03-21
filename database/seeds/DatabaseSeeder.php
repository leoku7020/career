<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //權限
        $this->call(PermissionTableSeeder::class);
        if(!Role::whereName('admin')->exists()){
            //1) Create Admin Role
            $role = ['name' => 'admin', 'display_name' => 'Admin', 'description' => 'Full Permission' ,'status' => '1'];
            $role = Role::create($role);

            //2) Set Role Permissions
            // Get all permission, swift through and attach them to the role
            $permission = Permission::get();
            foreach ($permission as $key => $value) {
                $role->attachPermission($value);
            }
            // DB::table('users')->delete();
            if(!User::whereEmail('adminuser@test.com')->exists()){
                //3) Create Admin User
                // $this->call(UsersTableSeeder::class);
                
                //larvata
                $user = ['name' => 'lavata', 'email' => 'larvata@larvata.com', 'password' => Hash::make('Larvata888!!Ya') , 'status'=>'1'];
                $user = User::create($user);
                //4) Set User Role
                $user->attachRole($role);

                //admin
                $user = ['name' => 'admin', 'email' => 'adminuser@test.com', 'password' => Hash::make('12345678') ,'status' => '1'];
                $user = User::create($user);
                //4) Set User Role
                $user->attachRole($role);
            }
        }
        //橫幅
        $this->call(TestBannersSeeder::class);
        //最新消息
        $this->call(TestNewsSeeder::class);
        //連結
        $this->call(TestLinksSeeder::class);
        //連結素材
        $this->call(TestMaterialSeeder::class);
        
    }
}
