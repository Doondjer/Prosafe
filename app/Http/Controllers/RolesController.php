<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function index()
    {
        $perPage = request()->get('per_page', 10);
        $query = request()->get('q', '');

        $roles = Role::where('name', 'LIKE', "%{$query}%")->paginate($perPage);

        return view('admin.role.index', [
            'roles' => $roles,
            'query' => $query,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|alpha_dash|max:20|unique:roles,name',
            'permission' => 'required|array',
            'permission.*' => 'string|exists:Spatie\Permission\Models\Permission,name'
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        return redirect()->route('uloge.index')
            ->with('success', 'Uloga je uspešno kreirana.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.role.edit', [ 'model' => $role, 'permissions' => $permissions ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => [ 'required', 'string', 'alpha_dash', 'max:20', Rule::unique('roles')->ignore($role->id), 'prohibited_if:name,super_admin' ],
            'permission' => 'required|array|prohibited_if:name,super_admin',
            'permission.*' => 'string|exists:Spatie\Permission\Models\Permission,name|prohibited_if:name,super_admin'
        ]);

        $role->update(['name' => $request->get('name')]);

        $role->syncPermissions($request->get('permission'));

        return redirect()->route('uloge.index')
            ->with('success', 'Uloga je uspešno izmenjena.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        if ($role->name === 'super_admin') {
            return redirect()->back()->with('error', 'Nije moguće obrisati Super Administratora!');
        }

        $role->delete();

        return redirect()->back()->with('success', 'Uloga je uspešno obrisana.');
    }
}
