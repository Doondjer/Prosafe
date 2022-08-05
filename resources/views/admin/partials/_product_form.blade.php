
    <div>
       {{-- <h2 class="accordion-header mb-3" id="heading-1">
            <button class="accordion-button form-label required " type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true">
                Generalno
            </button>
        </h2>--}}
        <div >
            {{--   SKU Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => true,
                'label' => 'SKU',
                'tagName' => 'sku',
                'placeholder' => 'Unesite SKU Proizvoda...',
                'hint' => 'Jedinstvena SKU oznaka proizvoda. Npr. Barkod broj',
            ])
            {{--   Naziv Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => true,
                'label' => 'Naziv',
                'tagName' => 'name',
                'placeholder' => 'Unesite Naziv Proizvoda...',
                'hint' => 'Pun Naziv Proizvoda koji će biti prikazan na stranici i u pretrazi.',
            ])
            @if(isset($model) && $model->images->count() > 0)
                <div class="mb-3">
                        <label class="form-label">Uploaded Images</label>
                        <div class="row g-2">
                            @foreach($model->images as $image)
                                <div class="col-auto">
                                    <label class="form-imagecheck mb-2 w-100">
                                        <span class="form-imagecheck-figure">
                                          <img src="{{ asset(config('imagecache.route') . "/small/$image->filename") }}" alt="Breakfast served with tea, bread and eggs" class="form-imagecheck-image">
                                        </span>
                                    </label>
                                    <a href="{{ route('admin.product_images.destroy', [ 'product' => $model, 'image_delete[]' => $image->filename ]) }}" class="btn btn-warning w-100" type="submit">Obriši</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="m-3">
                        </div>
                </div>
            @endif
            {{--   Upload Slika Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => true,
                'tagType' => 'upload',
                'label' => 'Slike',
                'tagName' => 'product_image',
                'hint' => 'Odaberite slike proizvoda koje će biti prikazane na stranici i u pretrazi.',
            ])
            {{--   Slug Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => true,
                'label' => 'Slug Proizvoda',
                'tagName' => 'slug',
                'placeholder' => 'Unesite Slug Proizvoda...',
                'hint' => 'Slug Proizvoda koji će biti prikazan u traci za pretraživanje browsera. Mora biti unikatan.',
            ])

            {{--   Novi Proizvod --}}
            @include('admin.partials.form_group', [
                'tagType' => 'radio',
                'tagClass' => 'col-md-5',
                'label' => 'Novi Proizvod',
                'tagName' => 'new_at',
             //   'checked' => true,
                'placeholder' => 'Da Li Je Proizvod Nov?',
                'hint' => 'Uključite ili isključite da li će proizvod biti obeležen kao novi u ponudi?',
            ])

            {{--   Istaknut Proizvod --}}
            @include('admin.partials.form_group', [
                'tagType' => 'radio',
                'tagClass' => 'col-md-5',
                'label' => 'Istaknut Proizvod',
                'tagName' => 'featured_at',
             //   'checked' => true,
                'placeholder' => 'Da Li Je Proizvod Istaknut?',
                'hint' => 'Uključite ili isključite da li će proizvod biti obeležen kao istaknut u ponudi?',
            ])

            {{--   Status Proizvoda --}}
            @include('admin.partials.form_group', [
                'tagType' => 'radio',
                'tagClass' => 'col-md-5',
                'label' => 'Status',
                'tagName' => 'published_at',
             //   'checked' => true,
                'placeholder' => 'Da Li Je Proizvod Objavljen?',
                'hint' => 'Uključite ili isključite prikazivanje proizvoda u prodavnici.',
            ])
        </div>
    </div>
    <div>
        <h2 class="accordion-header mb-3" id="heading-2">
            <button class="accordion-button required{{ array_intersect(array_keys($errors->get('*')),['short_description','description']) ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="{{ array_intersect(array_keys($errors->get('*')),['short_description','description']) ? 'true' : 'false' }}">
                Opis
            </button>
        </h2>
        <div id="collapse-2" class="accordion-collapse collapse{{ array_intersect(array_keys($errors->get('*')),['short_description','description']) ? ' show' : '' }}" data-bs-parent="#accordion_form">

            {{--   Kratak Opis Proizvoda   --}}
            @include('admin.partials.form_group', [
                'tagType' => 'wysiwyg',
                'required' => false,
                'label' => 'Kratak Opis Proizvoda',
                'tagName' => 'short_description',
                'placeholder' => 'Kratak Opis Proizvoda...',
                'hint' => 'Ovde treba da opišete proizvod u kratkim crtama. Ovo treba samo da privuče pažnju, ili da se uopšte ne unosi. Biće prikazan na stranici proizvoda pored detaljnog opisa',
            ])

            {{--   Opis Proizvoda   --}}
            @include('admin.partials.form_group', [
                'tagType' => 'wysiwyg',
                'required' => true,
                'label' => 'Opis Proizvoda',
                'tagName' => 'description',
                'placeholder' => 'Opis Proizvoda...',
                'hint' => 'Ovde treba da opišete detaljno proizvod. Ovo treba da ubedi kupce da li da ga kupe i biće prikazan na stranici proizvoda',
            ])

        </div>
    </div>
    <div>
        <h2 class="accordion-header mb-3" id="heading-3">
            <button class="accordion-button{{ array_intersect(array_keys($errors->get('*')),['meta_title','meta_keywords','meta_description']) ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="{{ array_intersect(array_keys($errors->get('*')),['meta_title','meta_keywords','meta_description']) ? 'true' : 'false' }}">
                SEO I Meta podešavanja
            </button>
        </h2>
        <div id="collapse-3" class="accordion-collapse collapse{{ array_intersect(array_keys($errors->get('*')),['meta_title','meta_keywords','meta_description']) ? ' show' : '' }}" data-bs-parent="#accordion_form">

            {{--   Meta Title Proizvoda   --}}
            @include('admin.partials.form_group', [
                'tagType' => 'textarea',
                'required' => false,
                'label' => 'Meta Title Proizvoda...',
                'tagName' => 'meta_title',
                'placeholder' => 'Unesite Meta Title Za Ovaj Proizvod...',
                'hint' => trans('app_settings.site.meta_title'),
            ])

            {{--   Meta Keywords Proizvoda   --}}
            @include('admin.partials.form_group', [
                'tagType' => 'textarea',
                'required' => false,
                'label' => 'Meta Keywords Proizvoda...',
                'tagName' => 'meta_keywords',
                'placeholder' => 'Unesite Meta Ključne reči Za Ovaj Proizvod...',
                'hint' => trans('app_settings.site.meta_keywords'),
            ])

            {{--   Meta Opis Proizvoda   --}}
            @include('admin.partials.form_group', [
                'tagType' => 'textarea',
                'required' => false,
                'label' => 'Meta Opis Proizvoda...',
                'tagName' => 'meta_description',
                'placeholder' => 'Unesite Meta Opis Za Ovaj Proizvod...',
                'hint' => trans('app_settings.site.meta_description'),
            ])

        </div>
    </div>

    <div>
        <h2 class="accordion-header mb-3" id="heading-4">
            <button class="accordion-button required{{ array_intersect(array_keys($errors->get('*')),['price','cost','special_price','special_price_from','special_price_to']) ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="{{ array_intersect(array_keys($errors->get('*')),['price','cost','special_price','special_price_from','special_price_to']) ? 'true' : 'false' }}">
                Cena
            </button>
        </h2>
        <div id="collapse-4" class="accordion-collapse collapse{{ array_intersect(array_keys($errors->get('*')),['price','cost','special_price','special_price_from','special_price_to']) ? ' show' : '' }}" data-bs-parent="#accordion_form">

            {{--   Cena Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => true,
                'label' => 'Cena (RSD)',
                'tagName' => 'price',
                'placeholder' => 'Unesite Cenu Proizvoda...',
                'hint' => 'Regularna prodajna cena proizvoda.',
            ])

            {{--   Nabavna Cena Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'label' => 'Nabavna cena (RSD)',
                'tagName' => 'cost',
                'placeholder' => 'Unesite Nabavnu Cenu Proizvoda...',
                'hint' => 'Ukupan trošak proizvodnje ili nabavke prozvoda. (Cena za nas)',
            ])

            {{--   Akcijska Cena Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'label' => 'Akcijska Cena (RSD)',
                'tagName' => 'special_price',
                'placeholder' => 'Unesite Akcijsku Cenu Proizvoda...',
                'hint' => 'Akcijska prodajna cena proizvoda. !!! Mora se odabrati i vremenski period kada je ova Akcijska cena aktivna !!!',
            ])

            {{--   Akcijska Cena Pocetak   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'tagType' => 'datepicker',
                'label' => 'Akcijska Cena Počinje Od',
                'tagName' => 'special_price_from',
                'placeholder' => 'Akcijsku Cenu Od...',
                'hint' => 'Odaberite od kog datuma je aktivna Akcijska prodajna cena proizvoda.',
            ])

            {{--   Akcijska Cena Završetak   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'tagType' => 'datepicker',
                'label' => 'Akcijska Cena Do',
                'tagName' => 'special_price_to',
                'placeholder' => 'Akcijska Cenu Do...',
                'hint' => 'Odaberite kog datuma prestaje da važi Akcijska prodajna cena proizvoda.',
            ])
        </div>
    </div>

    <div>
        <h2 class="accordion-header mb-3" id="heading-5">
            <button class="accordion-button required{{ array_intersect(array_keys($errors->get('*')),['length','width','height','weight']) ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="{{ array_intersect(array_keys($errors->get('*')),['length','width','height','weight']) ? 'true' : 'false' }}">
                Slanje
            </button>
        </h2>
        <div id="collapse-5" class="accordion-collapse collapse{{ array_intersect(array_keys($errors->get('*')),['length','width','height','weight']) ? ' show' : '' }}" data-bs-parent="#accordion_form">

            {{--   Dužina Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'label' => 'Dužina',
                'tagName' => 'length',
                'placeholder' => 'Unesite Dužinu Proizvoda...',
                'hint' => 'Unesite Dužina proizvoda zbog kalkulacije cene slanja.',
            ])

            {{--   Širina Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'label' => 'Širina',
                'tagName' => 'width',
                'placeholder' => 'Unesite Širinu Proizvoda...',
                'hint' => 'Unesite Širinu proizvoda zbog kalkulacije cene slanja.',
            ])

            {{--   Visina Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'label' => 'Visina',
                'tagName' => 'height',
                'placeholder' => 'Unesite Visinu Proizvoda...',
                'hint' => 'Unesite Visinu proizvoda zbog kalkulacije cene slanja.',
            ])

            {{--   Težina Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => false,
                'label' => 'Težina',
                'tagName' => 'weight',
                'placeholder' => 'Unesite Težinu Proizvoda...',
                'hint' => 'Unesite Težinu proizvoda zbog kalkulacije cene slanja.',
            ])
        </div>
    </div>

    <div>
        <h2 class="accordion-header mb-3" id="heading-6">
            <button class="accordion-button required{{ $errors->has('categories') ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-6" aria-expanded="{{ $errors->has('categories') ? 'true' : 'false' }}">
                Kategorije
            </button>
        </h2>
        <div id="collapse-6" class="accordion-collapse collapse{{ $errors->has('categories') ? ' show' : '' }}" data-bs-parent="#accordion_form">

            {{--   Kategorije Proizvoda   --}}
            @include('admin.partials.form_group', [
                'required' => true,
                'tagType' => 'multi_checkbox',
                'label' => 'Kategorije',
                'tagName' => 'categories',
                'hint' => 'Odaberite Kategorije u kojima će se nalaziti proizvod',
                'data' => $categories,
            ])
        </div>
    </div>
