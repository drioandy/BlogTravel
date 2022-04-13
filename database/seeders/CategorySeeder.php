<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Location',
                'url_key'=> $this->getUrlKeyByField('Location'),
            ],
            [
                'name' => 'Tips',
                'url_key'=> $this->getUrlKeyByField('Tips'),

            ]
        ];
        foreach ($data as $item){
            DB::table('categories')->insert($item);
        }

    }
    public function getUrlKeyByField($field)
    {
        $milliseconds = round(microtime(true) * 1000);
        $urlKey = $milliseconds . "-" . str_slug($field, '-');
        return $urlKey;
    }
}
