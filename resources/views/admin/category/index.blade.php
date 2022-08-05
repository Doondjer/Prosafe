@extends('admin.layouts.form.index', [
    'cardTitle' => 'Kategorije',
    'newItemRoute' => route('kategorije.create'),
    'formAction' => route('kategorije.index'),
    'items' => $categories
])

@section('table-header')
    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all categories"></th>
    <th class="w-1">ID <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
    </th>
    <th>Naziv</th>
    <th>Pozicija</th>
    <th>Br. Proizvoda</th>
    <th>Status</th>
    <th>Akcija</th>
    <th></th>
@endsection

@section('table-content')
    @foreach($categories as $category)
        <tr>
            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select category"></td>
            <td><span class="text-muted">{{ $category->id }}</span></td>
            <td class="td-truncate">
                <div class="d-flex py-1 align-items-center">
                    <span class="avatar me-3" style="background-image: url({{ asset(config('imagecache.route') . "/tiny/$category->image") }})"></span>
                    <div class="flex-fill">
                        <div class="text-muted"><a href="{{ route('kategorije.edit', ['category' => $category->slug]) }}" class="text-reset">{{ $category->name }}</a></div>
                    </div>
                </div>
            </td>
            <td>
                {{ $category->order }}
            </td>
            <td>
                {{ $category->nb_products }}
            </td>
            <td>
                <span class="badge bg-{{ $category->published_at ? 'success' : 'warning' }} me-1"></span>
                {{ $category->published_at ? 'aktivna' : 'neaktivna' }}
            </td>
            <td>
                <div class="btn-list flex-nowrap">
                    @can('category-edit')
                        <a href="{{ route('kategorije.edit', ['category' => $category->slug]) }}" class="btn btn-white">
                            Izmeni
                        </a>
                    @endcan
                    @can('category-delete')
                        <form action="{{ route('kategorije.destroy', ['category' => $category->slug]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-white" type="submit">Obriši</button>
                        </form>
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
@endsection
