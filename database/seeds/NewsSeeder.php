<?php
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->GetData());
    }
    public function GetData()
    {
        $objFaker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 20; $i++ ) {
            $data[] = [
                'category_id' => $objFaker->numberBetween($min = 1, $max = 5),
                'title' => $objFaker->sentence(rand(1,2)),
                'description' => $objFaker->realText(rand(20,50)),
                'text' => $objFaker->realText(rand(100,200))
            ];
        }
        return $data;
    }
}
