<?php

use Illuminate\Database\Seeder;
use App\Models\index\Banner;

class TestBannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!Banner::where('name','測試Banner1')->first()){
            $Banners = [
                // test banner
                [
                    'sort' => '1',
                    'name' => '測試Banner1',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '2',
                    'name' => '測試Banner2',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '3',
                    'name' => '測試Banner3',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '4',
                    'name' => '測試Banner4',
                    'status' => '1',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '5',
                    'name' => '測試Banner1',
                    'status' => '4',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '6',
                    'name' => '測試Banner2',
                    'status' => '4',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '7',
                    'name' => '測試Banner3',
                    'status' => '4',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],
                [
                    'sort' => '8',
                    'name' => '測試Banner4',
                    'status' => '4',
                    'start_time' => time(),
                    'end_time' => 0,
                    'cover' => '2019_03_08_16_58_21_5c822ead16751.jpg',
                ],

                

            ];
            foreach ($Banners as $key => $value) {
                Banner::create($value);
            }
        }
    }
}
