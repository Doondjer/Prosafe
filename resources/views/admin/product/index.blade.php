@extends('admin.layouts.form.index', [
    'cardTitle' => 'Proizvodi',
    'newItemRoute' => route('proizvodi.create'),
    'formAction' => route('proizvodi.index'),
    'items' => $products
])

@section('table-header')
    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all categories"></th>
    <th class="w-1">ID <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
    </th>
    <th>Proizvod</th>
    <th>Status</th>
    <th>Cena</th>
    <th>Količina</th>
    <th>Akcija</th>
    <th></th>
@endsection

@section('table-content')

    @foreach($products as $product)
        <tr>
            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select category"></td>
            <td><span class="text-muted">{{ $product->id }}</span></td>
            <td class="td-truncate">
                <div class="d-flex py-1 align-items-center">
                    <span class="avatar me-2" style="background-image: url({{ asset(config('imagecache.route') . "/tiny/$product->baseImage") }})"></span>
                    <div class="flex-fill">
                        <div class="font-weight-medium">{{ $product->sku }}</div>
                        <div class="text-muted"><a href="{{ route('proizvodi.edit', ['product' => $product->slug]) }}" class="text-reset">{{ $product->name }}</a></div>
                    </div>
                </div>
            </td>
            <td>
                <span class="badge bg-{{ $product->is_published ? 'success' : 'warning' }} me-1"></span>
                {{ $product->is_published ? 'aktivan' : 'neaktivan' }}
            </td>
            <td>
                {{ $product->price }}   {{ $product->currency }}
            </td>
            <td>
                0 {{--Ovo Treba napraviti u mysql pa na dalje--}}
            </td>
            <td>
                <div class="btn-list flex-nowrap">
                    @can('product-edit')
                        <a href="{{ route('proizvodi.edit', ['product' => $product->slug]) }}" class="btn btn-white">
                            Izmeni
                        </a>
                    @endcan
                    @can('product-delete')
                        <form action="{{ route('proizvodi.destroy', ['product' => $product->slug]) }}" method="POST">
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
