<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Group;
use App\Models\Page;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Nette\Utils\Image;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = User::first();
        $page = Page::first();

        $products =
            [
                [
                 //   'cost' => '',
                 //   'depth' => '',
                    'description' => 'ProSklop je model strujne letve bez kabla (podsklop) sa jedinstvenim keramičkim jezgrom pogodan za montažu kablova do 4mm2 i fiksiranje na radnu površinu, zid ili druge elemente. Fiksiranje se vrši lepljenjem kućišta na površinu ili bušenjem aluminijuma i fiksiranje šrafovima.',
                    'height' => '4',
                    'length' => '15',
                    'name' => 'ProSklop',
                    'price' => '1090',
                    'published_at' => Carbon::now(),
                    'short_description' => 'ProSklop je model strujne letve bez kabla (podsklop) sa jedinstvenim keramičkim jezgrom pogodan za montažu kablova do 4mm2 i fiksiranje na radnu površinu, zid ili druge elemente.',
                    'sku' => 'prosklop',
                    'slug' => 'pro-sklop',
                    'weight' => '0.5',
                    'width' => '6',
                    'user_id' => $user->id,
                    'images' => [
                        'prosklop.png',
                        'prosklop-1.jpg',
                        'prosklop-2.jpg',
                    ]
                    ],
                [
                 //   'cost' => '',
                 //   'depth' => '',
                    'description' => 'Svi produžni kablovi firme prosafe sadrže inplementirano inovativno keramičko jezgro koje ne sadrži ni jedan drugi produžni kabal na tržištu. Ta inovacija nam je obezbedila oznaku duple zaštite (kocka u kocki) na našim proizvodima atestiranim i sertifikovanim od strane elektrotehničkog instituta „Nikola Tesla“ Beograd i instituta „Vinča“. Keramičko jezgro je savršen izolator i odvodnik toplote tako da je zagrevanje bakarnih kontakata zanemarivo, a mogućnost kuršlusa, kratkog spoja i drugih kvarova svedena na minimum. Upravo zbog keramičkog jezgra i kanala od samogasive plastike i kvaliteta ostalih komponenti naši kablovi podržavaju opterećenje i preko 4000W. Proizvod proker je model produžnog kabla bez prekidača i osigurača sa kablom 3×1,5 ili 3×2,5 -(ProKerStrong) i dužinom samog kabla od 2,3,5 i 10 metara. Izradjuje se u varijanti od 3 do 12 utičnih mesta.',
                    'height' => '4',
                    'length' => '15',
                    'name' => 'ProKer',
                    'price' => '1490',
                    'published_at' => Carbon::now(),
                    'short_description' => 'ProKer je model produžnog kabla sa keramičkim jezgrom i priključnim kablom preseka 3×1,5 ili 3×2,5 od čistog bakra, dužina kabla 2,3,5,10 metara. Izrađuje se u varijantama od 3 do 10 utičnih mesta.',
                    'sku' => 'proker',
                    'slug' => 'pro-ker',
                    'weight' => '0.5',
                    'width' => '6',
                    'user_id' => $user->id,
                    'images' => [
                        'proker.jpg',
                        'proker-1.jpg',
                        'proker-2.jpg',
                    ]
                    ],
                [
                 //   'cost' => '',
                 //   'depth' => '',
                    'description' => 'ProSwitch je model produžnog kabla sa keramičkim jezgrom i kvalitetnim prekidačem 16A i priključnim kablom dužina 2,3,5,10 metara. Izrađuje se u varijantama od 3 do 12 utičnih mesta.',
                    'height' => '4',
                    'length' => '15',
                    'name' => 'ProSwitch',
                    'price' => '1790',
                    'published_at' => Carbon::now(),
                    'short_description' => 'ProSwitch je model produžnog kabla sa keramičkim jezgrom i kvalitetnim prekidačem 16A i priključnim kablom dužina 2,3,5,10 metara. Izrađuje se u varijantama od 3 do 12 utičnih mesta.',
                    'sku' => 'proswitch',
                    'slug' => 'pro-switch',
                    'weight' => '0.5',
                    'width' => '6',
                    'user_id' => $user->id,
                    'images' => [
                        'proswitch.jpg',
                        'proswitch-1.jpg',
                    ]
                    ],
                [
                  //  'cost' => '',
                 //   'depth' => '',
                    'description' => 'ProFuse je model produžnog kabla sa keramičkim jezgrom i prekostrujnom zaštitom u vidu brzog staklenog osigurača 6,3A/10A/16A. Dužina kabla 2,3,5,10 metara. Broj utičnih mesta od 3 do 12.',
                    'height' => '4',
                    'length' => '15',
                    'name' => 'ProFuse',
                    'price' => '1790',
                    'published_at' => Carbon::now(),
                    'short_description' => 'ProFuse je model produžnog kabla sa keramičkim jezgrom i prekostrujnom zaštitom u vidu brzog staklenog osigurača 6,3A/10 Ampera. Dužina kabla 2,3,5 metara. Broj utičnih mesta od 3 do 10. Namenjen za manje potrošače ukupne snage do 3KW',
                    'sku' => 'profuse',
                    'slug' => 'pro-fuse',
                    'weight' => '0.5',
                    'width' => '6',
                    'user_id' => $user->id,
                    'images' => [
                        'profuse.jpg',
                        'profuse-1.jpg',
                        'profuse-2.jpg',
                    ]
                    ],
                [
                 //   'cost' => '',
                //    'depth' => '',
                    'description' => 'ProSafe je model produžnog kabla sa keramičkim jezgrom, prekidačem, osiguračem, prenaponskom i prekostrujnom zaštitom u vidu mov varistorskih komponenti. Radi se isključivo sa presekom kabla 3×1,5. Dužina kabla 2,3i 5 metara. Broj utičnih mesta od 3 do 10. Namenjen je isključivo uređajima manje potrošnje kao što su računarska i TV oprema ukupne snage do 2,5KW',
                    'height' => '4',
                    'length' => '15',
                    'name' => 'ProSafe',
                    'price' => '1090',
                    'published_at' => Carbon::now(),
                    'short_description' => 'ProSafe je model produžnog kabla sa keramičkim jezgrom, prekidačem, osiguračem, prenaponskom i prekostrujnom zaštitom u vidu mov varistorskih komponenti. Radi se isključivo sa presekom kabla 3×1,5. Dužina kabla 2,3i 5 metara. Broj utičnih mesta od 3 do 10. Namenjen je isključivo uređajima manje potrošnje kao što su računarska i TV oprema ukupne snage do 2,5KW',
                    'sku' => 'prosafe',
                    'slug' => 'pro-safe',
                    'weight' => '0.5',
                    'width' => '6',
                    'user_id' => $user->id,
                    'images' => [
                        'prosafe.jpg',
                        'prosafe-1.jpg',
                        'prosafe-2.jpg',
                    ]
                    ],
            ];

        $categories = Category::all();
        $attributes = Attribute::all();
        $shippingMethods = Shipping::all();

        foreach ($products as $array) {
            $product = $user->products()->create(Arr::except($array, 'images'));

            $product->categories()->attach($categories->random());
            $product->shippingMethods()->attach($shipp = $shippingMethods->random());

            foreach ($array['images'] as $image) {
                $product->images()->create([
                    'filename' => $image,
                    'original_filename' => $image,
                    'mime' => 'jpg',
                    'size' => 0,
                ]);
            }
            foreach ($attributes as $attribute) {
                $product->attributes()->attach($attribute, [
                    'value' => $this->getValue($attribute->slug)
                ]);
            }
        }


        $products = Product::all();

        foreach ($products as $product) {

            $product->crossSeling()->attach(Product::all()->random(3));

            $slug = $product->slug;
            $sku = $product->sku;
            //dump($prod);
            for ($i=1; $i < 10; $i++) {
             //   dump($prod);
                $product->slug = $slug . "-$i";
                $product->sku = $sku . "-$i";
                $product->parent_id = $product->id;
               // dd($product->toArray());
                $productVariant = $user->products()->create(Arr::except($product->toArray(), ['id', 'images', 'categories', 'attributes']));

                $productVariant->categories()->attach($product->categories->first());
                $productVariant->shippingMethods()->attach($shipp);

                foreach ($product->images as $image) {
                    $productVariant->images()->create([
                        'filename' => $image->filename,
                        'original_filename' => $image->filename,
                        'mime' => 'jpg',
                        'size' => 0,
                    ]);
                }

                foreach ($attributes as $attribute) {
                    $productVariant->attributes()->attach($attribute, [
                        'value' => $this->getValue($attribute->slug)
                    ]);
                }
                $productVariant->crossSeling()->attach(Product::all()->random(3));

            }

        }


    }

    public function getValue($slug)
    {
        if ($slug === 'duzina_kabla') {
            $array = [
                '2 metra',
                '3 metra',
                '5 metara',
            ];
            $key = array_rand($array);
            return $array[$key];
        } elseif ($slug === 'amperaza') {
            return rand(1,10) . ' A';
        } elseif ($slug === 'boja') {
            return 'Crna';
        } elseif ($slug === 'napon') {
            return '220 V';
        } elseif ($slug === 'vrsta_kontakta') {
            return 'CU-ZN14';
        } elseif ($slug === 'presek_kabla') {

            $array = [
                '3 x 1,5',
                '3 x 2,5',
            ];
            $key = array_rand($array);
            return $array[$key];
        } elseif ($slug === 'broj_uticnica') {
            $array = [
                'sa 3 rupe',
                'sa 4 rupe',
                'sa 5 rupa',
                'sa 6 rupa',
                'sa 7 rupa',
                'sa 8 rupa',
                'sa 9 rupa',
                'sa 10 rupa',
            ];
            $key = array_rand($array);
            return $array[$key];
        }

        return rand(5,15);
    }
}
