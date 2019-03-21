<?php

use Illuminate\Database\Seeder;
use App\Models\index\Material;

class TestMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!Material::where('name','測試素材1')->first()){
            $materials = [
                // test Links
                [
                    'type' => '1',
                    'name' => '測試素材1',
                    'cover' => 'material01.jpg',
                    'link' => 'https://www.google.com/',
                ],
                [
                    'type' => '2',
                    'name' => '測試素材2',
                    'cover' => 'material02.jpg',
                    'link' => 'https://www.google.com/',
                ],
                [
                    'type' => '3',
                    'name' => '測試素材3',
                    'cover' => 'material03.jpg',
                    'link' => 'https://www.google.com/',
                ],
                [
                    'type' => '4',
                    'name' => '測試素材4',
                    'cover' => 'material04.jpg',
                    'link' => 'https://www.google.com/',
                ],
                [
                    'type' => '5',
                    'name' => '測試素材5',
                    'cover' => 'material05.jpg',
                    'link' => 'https://www.google.com/',
                ],
 

            ];
            foreach ($materials as $key => $value) {
                Material::create($value);
            }
        }
    }
}
