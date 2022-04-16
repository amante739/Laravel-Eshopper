<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'faq_title' => 'this is faq title',
            'faq_description' => 'This is demo faq description',
            'faq_status' => 1
        ]);
    }
}
