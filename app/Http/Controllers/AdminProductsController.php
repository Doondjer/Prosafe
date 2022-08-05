<?php

namespace App\Http\Controllers;

use App\Acme\Traits\UploadTrait;
use App\Events\ProductIsChanged;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminProductsController extends Controller
{
    use UploadTrait;

    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
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

        $products = Product::where('name', 'LIKE', "%{$query}%")->paginate($perPage);

        return view('admin.product.index', [
            'products' => $products,
            'query' => $query,
        ]);
    }

    /**
     * Display form to create new product
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name', 'slug')->toArray();

        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store newly created product in database
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function store(ProductRequest $request)
    {
        $product = Auth::user()->products()->create($request->validated());

        $categories = Category::whereIn('slug', request()->get('categories'))->get();

        $product->categories()->attach($categories);

        if($request->file('product_image')) {

            $this->attachImages($product, $request->file('product_image'));
        }

        event(new ProductIsChanged($product));

        return redirect()->back()->with('succes', "Proizvod '$product->name' je uspešno kreiran.");
    }

    /**
     * Display form to edit existing product
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name', 'slug')->toArray();

        return view('admin.product.edit', [
            'model' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update current resource
     *
     * @param ProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        $categories = Category::whereIn('slug', request()->get('categories'))->get();

        $product->categories()->sync($categories);

        if($request->file('product_image')) {

            $this->attachImages($product, $request->file('product_image'));
        }

        event(new ProductIsChanged($product));

        return redirect()->route('proizvodi.index')->with('success', "Proizvod '$product->name' je uspešno izmenjen.");
    }

    /**
     * Delete current product
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        event(new ProductIsChanged($product));

        return redirect()->back()->with('success', 'Proizvod je uspešno obrisan!');
    }

    /**
     * Handle Image upload. Save to storage and database
     *
     * @param Product $product
     * @param $images
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function attachImages(Product $product, $images)
    {
        foreach ($images as $image) {
            $originalFilename = $image->getClientOriginalName();
            $originalMime = $image->getClientMimeType();

            $filename = $this->generateName($image);
            $size = $image->getSize();

            $image = Image::make($image)->orientate();

            $image->resize(null,1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // $image->fit(1920,1080);
            //$watermark = Intervention::make(public_path('watermark.png'));
            //$image->insert($watermark, 'center');

            Storage::disk('image')->put('/product/'. $filename,$image->encode());

            $productImages[] = [
                'filename' => $filename,
                'original_filename' => $originalFilename,
                'mime' => $originalMime,
                'size' => $size,
            ];
        }

        return $product->images()->createMany($productImages);
    }
}
