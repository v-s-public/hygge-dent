<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::query()->truncate();

        Language::create([
            'language_name' => 'Українська',
            'language_label' => 'укр',
            'language_locale_id' => 'ua',
            'language_flag_image' => 'ukr.jpg',
            'language_status' => true
        ]);

        Language::create([
            'language_name' => 'English',
            'language_label' => 'англ',
            'language_locale_id' => 'en',
            'language_flag_image' => 'gbr.jpg',
            'language_status' => true
        ]);

        Language::create([
            'language_name' => 'Русский',
            'language_label' => 'рус',
            'language_locale_id' => 'ru',
            'language_flag_image' => 'rus.jpg',
            'language_status' => true
        ]);
    }
}
