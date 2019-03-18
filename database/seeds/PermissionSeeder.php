<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!Permission::whereName('Index-carousel')->first()){
            $permission = [
                // role action
                [
                    'name' => 'Index-carousel',
                    'display_name' => '首頁輪播',
                    'description' => '首頁輪播權限'
                ],
                [
                    'name' => 'Advertise',
                    'display_name' => '全版廣告',
                    'description' => '全版廣告權限'
                ],
                [
                    'name' => 'News',
                    'display_name' => '最新消息',
                    'description' => '最新消息權限'
                ],
                [
                    'name' => 'Offer',
                    'display_name' => '優惠卷',
                    'description' => '優惠卷權限'
                ],
                [
                    'name' => 'Event',
                    'display_name' => '訊息推播',
                    'description' => '訊息推播權限'
                ],
                [
                    'name' => 'Copywriting',
                    'display_name' => '文案管理',
                    'description' => '文案管理權限'
                ],
                [
                    'name' => 'threshold',
                    'display_name' => '申辦會員門檻設定',
                    'description' => '申辦會員門檻設定權限'
                ],
                [
                    'name' => 'Praise-right',
                    'display_name' => '禮讚會員權益',
                    'description' => '禮讚會員權益權限'
                ],
                [
                    'name' => 'VIP-right',
                    'display_name' => '尊榮會員權益',
                    'description' => '尊榮會員權益權限'
                ],
                [
                    'name' => 'Booking',
                    'display_name' => '俱樂部訂位',
                    'description' => '俱樂部訂位權限'
                ],
                [
                    'name' => 'User-manage',
                    'display_name' => '系統帳號',
                    'description' => '系統帳號權限'
                ],
                [
                    'name' => 'Role-manage',
                    'display_name' => '權限角色',
                    'description' => '權限角色權限'
                ],

            ];
            foreach ($permission as $key => $value) {
                Permission::create($value);
            }
        }
    }
}
