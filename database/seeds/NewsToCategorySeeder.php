<?php

use Illuminate\Database\Seeder;

class NewsToCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_to_categories')->insert($this->GetData());
    }

    public function GetData()
    {
        $objFaker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 21; $i < 22; $i++ ) {
            $data[] = [
                'category_id' => $objFaker->numberBetween($min = 1, $max = 5),
                'news_id' => $i+1,
            ];
        }
        return $data;
    }
}
