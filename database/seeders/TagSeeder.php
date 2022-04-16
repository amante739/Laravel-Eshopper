<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=3; $i++)
        {
            Tag::create([
                'tag_title' => "tag".$i
            ]);
        }
    }
}
