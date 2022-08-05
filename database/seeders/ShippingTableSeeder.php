<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Seeder;

class ShippingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippings = [
            [
                'carrier' => 'post_ekspress',
                'carrier_title' => 'Post Ekspress',
                'method' => 'besplatno',
                'method_title' => 'Besplatno',
                'method_description' => '',
                'price' => '0',
            ],
        ];

        foreach ($shippings as $shipping) {
            Shipping::insert($shipping);
        }
    }
}
