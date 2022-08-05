<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagesRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index','store']]);
        $this->middleware('permission:page-create', ['only' => ['create','store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
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

        $pages = Page::where('title', 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{$query}%")
            ->paginate($perPage);

        return view('admin.page.index', compact('pages', 'query'));
    }

    /**
     * Show specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Page $page)
    {
        return view('page.show', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Page $page
     * @param PagesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Page $page, PagesRequest $request)
    {
        $page = Page::create($request->validated());

        return redirect()->back()->with('success', "Dodatna Stranica '$page->title' je uspešno kreirana.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', ['model' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Page $page
     * @param PagesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Page $page, PagesRequest $request)
    {
        $page->update($request->validated());

        return redirect()->back()->with('success', "Stranica '$page->title' je uspešno izmenjena.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->back()->with('success', 'Dodatna Stranica je uspešno obrisana!');
    }
}
