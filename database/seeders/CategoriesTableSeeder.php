<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [ 'name' => 'Audio line', 'slug' => 'audio-line-kablovi', 'order' => '1', 'published_at' => Carbon::now(), 'image' => 'ProAudio-94e9b5d6-d186-49e6-9f6a-74f8735bbf09.jpg' ],
            [ 'name' => 'Office & Home', 'slug' => 'office-and-home-kablovi', 'order' => '2', 'published_at' => Carbon::now(), 'image' => 'ProRek-94e28a96-af54-46ff-9bb8-ea6b3e6a92e8.jpg' ],
            [ 'name' => 'Professional & Industry', 'slug' => 'professional-and-industry-kablovi', 'order' => '3', 'published_at' => Carbon::now(), 'image' => 'ProIndustry-94e28a96-3e5d-494f-bd32-7950e51a2ca9.jpg' ],
            [ 'name' => 'Smart connect', 'slug' => 'smart-connect-line-kablovi', 'order' => '4', 'published_at' => Carbon::now(), 'image' => 'ProDigital-94e9b5d6-dbb0-4e9b-8557-98292edf2703.jpg' ],
           /* [ 'name' => 'Specijalni modeli', 'slug' => 'specijalni-modeli-kablova', 'order' => '5' ],*/
        ];

        Category::insert($categories);
        $page = Page::first();

        foreach (Category::all() as $category) {
            $category->pages()->attach($page->id);
        }
    }
}
