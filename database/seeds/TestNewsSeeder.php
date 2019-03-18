<?php

use Illuminate\Database\Seeder;
use App\Models\index\News;

class TestNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!News::where('title','測試最新消息1')->first()){
            $News = [
                // role action
                [
                    'title' => '測試最新消息1',
                    'type' => '1',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'content' => 'test data',
                    'file' => '',
                    'top' => rand(0,1),
                ],
                [
                    'title' => '測試最新消息2',
                    'type' => '2',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'content' => 'test data',
                    'file' => '',
                    'top' => rand(0,1),
                ],
                [
                    'title' => '測試最新消息3',
                    'type' => '3',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'content' => 'test data',
                    'file' => '',
                    'top' => rand(0,1),
                ],
                [
                    'title' => '測試最新消息4',
                    'type' => '4',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'content' => 'test data',
                    'file' => '',
                    'top' => rand(0,1),
                ]

            ];
            foreach ($News as $key => $value) {
                News::create($value);
            }
        }
    }
}
