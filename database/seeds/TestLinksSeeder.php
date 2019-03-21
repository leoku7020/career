<?php

use Illuminate\Database\Seeder;
use App\Models\index\Links;

class TestLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(!Links::where('material_id','1')->first()){
            $Links = [
                // test Links
                [
                    'sort' => '1',
                    'material_id' => '1',
                    'status' => '0',
                ],
                [
                    'sort' => '2',
                    'material_id' => '2',
                    'status' => '0',
                ],
                [
                    'sort' => '3',
                    'material_id' => '3',
                    'status' => '0',
                ],
                [
                    'sort' => '4',
                    'material_id' => '4',
                    'status' => '0',
                ],
                [
                    'sort' => '5',
                    'material_id' => '1',
                    'status' => '0',
                ],
                [
                    'sort' => '6',
                    'material_id' => '2',
                    'status' => '0',
                ],
                [
                    'sort' => '7',
                    'material_id' => '3',
                    'status' => '0',
                ],
                [
                    'sort' => '8',
                    'material_id' => '4',
                    'status' => '0',
                ], 

            ];
            foreach ($Links as $key => $value) {
                Links::create($value);
            }
        }
    }
}
