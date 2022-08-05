@extends('admin.layouts.form.index', [
    'cardTitle' => 'Dodatne Stranice',
    'newItemRoute' => Auth::user()->can('page-create') ? route('stranice.create') : null,
    'formAction' => route('stranice.index'),
    'items' => $pages
])

@section('table-header')
    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all categories"></th>
    <th class="w-1">ID <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
    </th>
    <th>Naslov</th>
    <th>Slug</th>
    <th>Akcija</th>
    <th></th>
@endsection

@section('table-content')
    @foreach($pages as $page)
        <tr>
            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select category"></td>
            <td><span class="text-muted">{{ $page->id }}</span></td>
            <td class="td-truncate">
                <div class="text-truncate">{{ $page->title }}</div>
            </td>
            <td>
                {{ $page->slug }}
            </td>
            <td>
                <div class="btn-list flex-nowrap">
                    <a href="{{ route('pages.show', ['page' => $page->slug]) }}" class="btn btn-white">
                        Prikaži
                    </a>
                    @can('page-edit')
                        <a href="{{ route('stranice.edit', ['page' => $page->slug]) }}" class="btn btn-white">
                            Izmeni
                        </a>
                    @endcan
                    @can('page-delete')
                        <form action="{{ route('stranice.destroy', ['page' => $page->slug]) }}" method="POST">
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
