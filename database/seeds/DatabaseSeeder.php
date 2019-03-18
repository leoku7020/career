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
        // //通知事項
        // $this->call(TestOperationRecordsSeeder::class);
        // //首頁輪播
        // $this->call(TestCarouselSeeder::class);
        // //素材庫
        // $this->call(TestMaterialSeeder::class);
        
        // //全版廣告
        // $this->call(TestAdSeeder::class);
        // //最新活動類別
        // $this->call(TestCategorySeeder::class);
        // //文案管理
        // $this->call(TestCopywritingSeeder::class);
        // //最新消息歷史紀錄
        // $this->call(TestNewsRecordsSeeder::class);
        // //禮讚會員權益
        // $this->call(TestPraseRightSeeder::class);
        // //活動公告
        // $this->call(TestEventSeeder::class);
        // //發票金額門檻
        // $this->call(TestMoneyLevelSeeder::class);
        // //活動代碼
        // $this->call(TestActivitySeeder::class);
        // //尊榮會員權益
        // $this->call(TestVIPRightSeeder::class);
        // //優惠卷
        // $this->call(TestOfferSeeder::class);
        // //歷史優惠卷
        // $this->call(TestOfferRecordsSeeder::class);
        // //優惠卷使用紀錄
        // $this->call(TestOfferUseRecordsSeeder::class);
        // //推播會員
        // $this->call(TestMemberSeeder::class);
        // //俱樂部訂位紀錄
        // $this->call(TestBookingRecordsSeeder::class);
        // //俱樂部預約時段
        // $this->call(TestBookingScheduleSeeder::class);
        
    }
}
