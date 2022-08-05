<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            [
                'slug' => 'broj_uticnica',
                'title' => 'Broj Utitičnica',
                'validation' => 'required',
                'position' => '1',
                'is_required' => true,
                'is_link_on_show_product' => true,
            ],
            [
                'slug' => 'vrsta_kontakta',
                'title' => 'Vrsta Kontakta',
                'validation' => 'required',
                'position' => '2',
                'is_required' => true,
                'is_search_option' => true,
                'search_option_placeholder' => 'Odaberi Kontakt',
                'is_link_on_show_product' => true,
            ],
            [
                'slug' => 'presek_kabla',
                'title' => 'Presek Kabla',
                'validation' => 'required',
                'position' => '3',
                'is_required' => true,
                'is_search_option' => true,
                'search_option_placeholder' => 'Odaberi Presek',
                'is_link_on_show_product' => true,
            ],
            [
                'slug' => 'duzina_kabla',
                'title' => 'Dužina Kabla',
                'validation' => 'required',
                'position' => '4',
                'is_required' => true,
                'is_search_option' => true,
                'search_option_placeholder' => 'Odaberi Dužinu',
                'is_link_on_show_product' => true,
            ],
            [
                'slug' => 'napon',
                'title' => 'Napon',
                'validation' => '',
                'position' => '5',
                'is_required' => false,
                'is_link_on_show_product' => false,
            ],
            [
                'slug' => 'amperaza',
                'title' => 'Amperaža',
                'validation' => '',
                'position' => '6',
                'is_required' => false,
                'is_link_on_show_product' => false,
            ],
            [
                'slug' => 'boja',
                'title' => 'Boja',
                'validation' => '',
                'position' => '7',
                'is_required' => false,
                'is_link_on_show_product' => false,
            ],
        ];

        foreach ($attributes as $attribute) {
            Attribute::insert($attribute);
        }
    }
}
