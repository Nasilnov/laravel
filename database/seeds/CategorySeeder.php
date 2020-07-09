<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

        {
            DB::table('categories')->insert($this->GetData());
        }

        public function GetData()
    {
        $objFaker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 5; $i++ ) {
            $data[] = [
                'id' => $i + 1,
                'name' => $objFaker->sentence(rand(1,2))
            ];
        }
        return $data;
    }

}
