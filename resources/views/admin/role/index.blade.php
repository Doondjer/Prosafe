@extends('admin.layouts.form.index', [
    'cardTitle' => 'Uloge(Roles)',
    'newItemRoute' => Auth::user()->can('role-create') ? route('uloge.create') : null,
    'formAction' => route('uloge.index'),
    'items' => $roles
])

@section('table-header')
    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all categories"></th>
    <th class="w-1">ID <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
    </th>
    <th>Naziv</th>
    <th>Akcija</th>
    <th></th>
@endsection

@section('table-content')
    @foreach($roles as $role)
        <tr>
            <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select roles"></td>
            <td><span class="text-muted">{{ $role->id }}</span></td>
            <td class="td-truncate">
                <div class="text-truncate">{{ $role->name }}</div>
            </td>
            <td>
                <div class="btn-list flex-nowrap">
                    @if($role->name !== 'super_admin')
                        @can('role-edit')
                            <a href="{{ route('uloge.edit', ['role' => $role->id]) }}" class="btn btn-white">
                                Izmeni
                            </a>
                        @endcan
                        @can('role-delete')
                            <form action="{{ route('uloge.destroy', ['role' => $role->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-white" type="submit">Obriši</button>
                            </form>
                        @endcan
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
@endsection

