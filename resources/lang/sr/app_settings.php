<?php
/**
 * Ovo je opis za podesavanja aplikacije
 * koji ce se ukoliko postoji prikazati
 * u admin delu prilikom unosenja
 */
return [
    'site' => [
        'section:name'      => 'Generalna Podešavanja',
        'product_default_image' => 'Podrazumevana slika koja ce biti prikazana u nedostku slike za proizvod.',
        'category_default_image' => 'Podrazumevana slika koja ce biti prikazana u nedostku slike za Kategoriju.',
        'favicon_url'       => 'Absolutna putanja za iconu stranice',
        'logo_url'          => 'Absolutna putanja za logo stranice',
        'app_name'          => 'Ime aplikacije',
        'business_name'     => 'Puno poslovno ime na koga je moguće i adresirati pismo. Deo adrese u footeru i kontakt formi i još na par drugih mesta',
        'street_address'    => 'Adresa ulica i broj u kojoj se nalazi sedište firme. Deo adrese u footeru i kontakt formi',
        'city_address'      => 'Grad u kojem se nalazi sedište firme. Deo adrese u footeru i kontakt formi',
        'sales_phone'       => 'Broj telefona za prodaju. Biće prikazan u headeru i footeru',
        'customer_service_phone' => 'Broj telefona za podršku kupcima. Biće prikazan u headeru i footeru',
        'nb_popular_products_in_slider'      => 'Broj popularnih proizvoda koji će biti prikazan u slideru na početnoj stranici',
        'nb_popular_categories_in_slider'      => 'Broj popularnih kategorija koje će biti prikazane u slideru na početnoj stranici',
        'meta_title'        => 'Tekst koji će biti prikazan na rezultatima pretrage pretraživača poput Googla, na tabu browsera,
                                    kada neko stavi sajt u "bookamrks" ili "favorites" da označi naslov naše stranice.
                                    Staviti razuman i kratak naslov do 55-60 karaktera do 15 reči.',
        'meta_description'  => 'Tag u kojem se nalazi glavni opis sadržaja vaše strane. Ovaj tag podržavaju svi pretraživači ali najviše ga upotrebljavaju
                                AltaVista, AllTheWeb i Teoma. Google i Yahoo ga ponekad koriste ali uglavnom sami kreiraju svoj opis koji kupe sa web strane.
                                Obično je prikazan ispod title tag-a na rezultatima pretrage i treba da da razlog korisniku da klikne. Treba da bude jedinstven u skladu sa ključnim rečima
                                i između 120-160 karaktera.',
        'meta_keywords'     => 'Predstavlja seriju ključnih fraza koje se nalaze na vašem sajtu. Ovde možete staviti sve specifične fraze koje reprezentuju vaš sajt
                                ali ih treba uskladiti tako da to budu i reči koje bi neko ukucao u pretraživac ukoliko želi da pronađe informacije koje sadrži vaš sajt.
                                Preporučljivo je da u ovom tagu ne bude više od 250 karaktera; ovaj tag ne podržavaju Google, AllTheWeb i AltaVista, dok ga Tehoma I Yahoo podržavaju.',
    ],
    'email' => [
        'section:name'      => 'Email Podešavanja',
        'admin_email'       => 'Email adresa administratora za primanje email-ova.',
        'admin_name'        => 'Ovo ime će biti prikazano u svim email-ovima administratora',
        'shop_email'        => 'Email adresa za slanje email-ova korisnicima.',
        'email_sender_name' => 'Ovo ime će biti prikazano u korisničkom inbox-u',
    ],
    'content' => [
        'show_categories_rich_snippets'  => 'Uključi ili isključi "Rich Snippets" prikaz za kategoriju u pretrazi proizvoda.',
        'show_product_rich_snippets'  => 'Uključi ili isključi "Rich Snippets" prikaz za proizvode.',
        'show_product_rich_snippets_sku'  => 'Uključi ili isključi sku u "Rich Snippets" prikazu za proizvode.',
        'show_product_rich_snippets_weight'  => 'Uključi ili isključi težinu u "Rich Snippets" prikazu za proizvode.',
        'show_product_rich_snippets_categories'  => 'Uključi ili isključi kategorije u "Rich Snippets" prikazu za proizvode.',
        'show_product_rich_snippets_images'  => 'Uključi ili isključi slike u "Rich Snippets" prikazu za proizvode.',
        'show_product_rich_snippets_aggregate_rating'  => 'Uključi ili isključi ocene u "Rich Snippets" prikazu za proizvode.',
        'show_product_rich_snippets_reviews'  => 'Uključi ili isključi recenzije u "Rich Snippets" prikazu za proizvode.',
        'show_product_rich_snippets_offers'  => 'Uključi ili isključi cenu u "Rich Snippets" prikazu za proizvode.',
        'section:name'      => 'Modifikacija Sadržaja',
        'custom_css'        => '',
        'custom_javascript' => '',
    ],
    'pages' => [
        'section:name'      => 'SEO Podešavanja Stranice',
        'contact_us_meta_title'        => 'Tekst koji će biti prikazan na rezultatima pretrage pretraživača poput Googla, na tabu browsera,
                                    kada neko stavi sajt u "bookamrks" ili "favorites" da označi naslov naše stranice.
                                    Staviti razuman i kratak naslov do 55-60 karaktera do 15 reči.',
        'contact_us_meta_description'  => 'Tag u kojem se nalazi glavni opis sadržaja vaše strane. Ovaj tag podržavaju svi pretraživači ali najviše ga upotrebljavaju
                                AltaVista, AllTheWeb i Teoma. Google i Yahoo ga ponekad koriste ali uglavnom sami kreiraju svoj opis koji kupe sa web strane.
                                Obično je prikazan ispod title tag-a na rezultatima pretrage i treba da da razlog korisniku da klikne. Treba da bude jedinstven u skladu sa ključnim rečima
                                i između 120-160 karaktera.',
        'contact_us_meta_keywords'     => 'Predstavlja seriju ključnih fraza koje se nalaze na vašem sajtu. Ovde možete staviti sve specifične fraze koje reprezentuju vaš sajt
                                ali ih treba uskladiti tako da to budu i reči koje bi neko ukucao u pretraživac ukoliko želi da pronađe informacije koje sadrži vaš sajt.
                                Preporučljivo je da u ovom tagu ne bude više od 250 karaktera; ovaj tag ne podržavaju Google, AllTheWeb i AltaVista, dok ga Tehoma I Yahoo podržavaju.',
    ],
];
