<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'title' => 'Slanje & Vraćanje',
                'meta_title' => 'Slanje & Vraćanje',
                'slug' => 'slanje-i-vracanje',
                'size' => 'small',
                'content' => json_encode('<p><strong>Priprema i Slanje</strong></p><ul><li>Sve porudžbine se obrađuju i šalju u roku od 3-5 radnih dana</li><li>Porez je uključen u cenu proizvoda</li><li>Roba se šalje iz Aranđelovca</li><li>Ukoliko vam je potrebna brža dostava, pošaljite nam email ili pozovite&nbsp;</li></ul><p><strong>Opcije Za Slanje</strong></p><ul><li>Post Ekspress danas za danas</li><li>Post Ekspress danas za sutra</li><li>AKS&nbsp;</li><li>BEKS</li></ul><p><strong>Besplatna Isporuka - Promocija</strong></p><ul><li>Porudžbine od 7000 RSD i više se kvalifikuju za besplatnu isporuku na teritoriji Republike Srbije.</li><li>Besplatna isporuka se ne vrši na teritoriji republike Kosovo</li></ul><p><strong>&nbsp;Pravila Za Povraćaj Robe</strong></p><ul><li>Proizvod mora biti nekorišćen i u neotvorenom, neoštećenom stanju.</li><li>Nije moguće vratiti proizvode kupljene na akciji ili popustu(osim u slučaju neispravnosti)</li><li>Povraćaj robe se vrši o trošku kupca tj kupac snosi troškove poštarine i ostale troškove ukoliko postoje</li></ul><p><br><strong>Informacije</strong></p><ul><li>Pošaljite Email na: <a href="mailto:' . config('app_settings.values.shop_email') . '" title="Email Kontakt">' . config('app_settings.values.shop_email') . '</a></li><li>Pozovite na: <a href="tel:' . config('app_settings.values.customer_service_phone') . '">' . config('app_settings.values.customer_service_phone') . '</a></li><li>Obavezno navedite naziv proizvoda i potpune informacije za kontak</li><li>Povraćaj novca se vrši posle prijema i provere stanja proizvoda</li><li>Posle 90 dana više nije moguće vratiti proizvod.</li></ul><p><br>&nbsp;</p>'),
            ],
            [
                'title' => 'O Nama',
                'meta_title' => 'O Nama',
                'slug' => 'o-nama',
                'size' => 'small',
                'content' => json_encode('<p>U fokusu naše delatnosti je proizvodnja elektro opreme i visoko kvalitetnih produžnih kablova koji će ispuniti sve zahteve i potrebe naših klijenata.</p><p><br>Kao rezultat našeg dugogodišnjeg rada i istraživanja napravili smo izuzetno kvalitetan produžni kabal čime smo rešili probleme hiljadama nezadovoljnih korisnika koji zahtevaju kvalitet, sigurnost i ekonomičnost uredjaja. Za kratak vremenski period smo se izdvojili na tržištu sa inovativnim i visoko kvalitetnim produžnim kablom i postavili najbolji odnos cene i kvaliteta. Kompanija planira da svoj proizvodni program proširi na proizvodnju modularnog programa prekidača, utičnica i LED rasvete visokog kvaliteta.</p><p><br>ProSafe je mlada kompanija koja je nastala na temeljima dugogodišnjeg iskustva u oblasti energetike, elektronike i mašinstva.</p>'),
            ],
            [
                'title' => 'O ProSafe Produznim Kablovima',
                'meta_title' => 'O ProSafe Produznim Kablovima',
                'slug' => 'o-nasim-produznim-kablovima',
                'size' => 'small',
                'content' => json_encode('<div class="uk-panel">&nbsp; &nbsp; <img alt="Poprečni Presek" src="http://prosafe.test/images/original/poprecni_presek.png" class="uk-align-right uk-margin-remove-adjacent uk-width-2-3">&nbsp; &nbsp; <div class="uk-dropcap"><p>Proizvodi kompanije ProSafe su kompletno domaće proizvodnje izrađeni od visokokvalitetnih domaćih sirovina koje se mogu reciklirati. Naše proizvode odlikuje izuzetan kvalitet samih komponenti, preciznost izrade, prepoznatljiv dizajn, inovativnost tehnologije, visok stepen sigurnosti, veoma dug garantni rok, pristupačnost cene po cemu se ProSafe izdvaja od konkurencije kako na domaćem i stranom tržištu. Asortiman naših proizvoda je raznovrstan od profesionalih HI-Fi i industriskih kablova do kablova za široku upotrebu i prenaponskih zastita ProSafe.&nbsp;</p><p>Svi produžni kablovi i strujne letve sadrže jedinstveno KERAMIČKO JEZGRO i izradjeni su u kućištu od čvrstog ALUMINIJUMA otpornog na mehaničke udarce i oštećenja. Dodatni izolacioni kanal od SAMOGASIVE TERMO-OTPORNE PLASTIKE koji pored same keramike obezbeđuje dodatnu zaštitu zbog čega smo u sertifikatu dobili znak uredjaja sa duplom zaštitom. Sami bakarni kontakti su izuzetno visokog kvaliteta što dozvoljava opterećenje od 4000W.</p><p>Svi elementi su nezapaljivi do T=550C. Podržana jačina struje 16A i napon “220-250V / 50-60 Hz. Poklopci utičnica izradjeni od galanteriske ABS PLASTIKE i zakrenuti su za 45%. Proizvodi su sertifikovani i atestirani od strane Elektrotehničkog instituta “Nikola Tesla” Beograd i instituta Vinča.</p><p>&nbsp;Naš proizvod je otporan na mehanička oštećenja.</p>&nbsp; &nbsp; </div></div>'),
            ],
            [
                'title' => 'Poslovna politika i odnos prema klijentima',
                'meta_title' => 'Poslovna politika i odnos prema klijentima',
                'slug' => 'poslovna-politika-i-odnos-prema-klijentima',
                'size' => 'small',
                'content' => json_encode('<p>ProSafe kompanija &nbsp;nastoji da u narednom period postane lider na komercijalnom tržištu, kao proizvođač orijentisan praćenju i ispunjenju zahteva krajnjeg korisnika, nudeći mu ne samo proizvode, već i sistemska rešenja u skladu sa njegovim potrebama. Mi ne prodajemo samo proizvode, mi nudimo rešenja.&nbsp;</p><p>Politika kvaliteta je sastavni deo poslovne politike kompanije ProSafe &nbsp;I okvir za definisanje ciljeva kvaliteta, a zasniva se na uspostavljanju marketinški orjentisanog menadžment sistema koji se stalno poboljšava.</p><p>U tom cilju utvrđeni su sljedeći principi politike kvaliteta:</p><ul><li>Zadovoljstvo kupaca naša je najveća vrednost u odnosima sa konkurencijom, a preduzeću osigurava budućnost;</li><li>Kupci su naši &nbsp;uvaženi partneri koji odlučuju o uspehu preduzeća i kroz njihovo zadovoljstvo želimo postići utvrđene ciljeve preduzeća i zadovoljstvo zaposlenih;</li><li>Preduzeće je opredeljeno da prepoznaje želje i buduće zahteve kupaca i da ih ispunjava po kvalitetu i pouzdanosti, ekonomičnosti i poštovanju termina isporuke;</li><li>Kontinuirano unapređivanje kvaliteta i bezbednosti proizvoda i procesa, zasnovanih na zahtjevima EU direktiva i EN standarda, i poštovanju propisa i zahteva kupaca;</li><li>Podizanje produktivnosti rada osavremenjivanjem tehnološkog procesa, inovacijama i unapređenjem postupaka rada;</li><li>Obezbeđenje kvaliteta i bezbednosti gotovih proizvoda kroz nadzor nad bitnim karakteristikama proizvoda i procesa;</li><li>Stručnost, motivisanost i podsticanje inicijativa zaposlenih je osnovni uslov za uspeh preduzeća;</li><li>Odgovoran odnos prema društvu,zaštiti životne sredine, okolini, bezbednosti, zdravlju i primjeni etičkih normi prema zaposlenim I klijentima;</li></ul>'),
            ]
        ];

        foreach ($pages as $page) {
            Page::insert($page);
        }
    }
}
