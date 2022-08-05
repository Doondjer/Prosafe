<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImagesController extends Controller
{
    public function destroy(Product $product, Request $request)
    {
        request()->validate([
            'image_delete' => 'array|required|max:5',
            'image_delete.*' => 'required|string|exists:App\Models\ProductImage,filename',
        ]);


        $delete = ProductImage::whereProductId($product->id)->whereIn('filename', request()->get('image_delete'))->delete();
        $filesDeleted = 0;

        foreach (request()->get('image_delete') as $imageName){
            if(Storage::disk('image')->delete("/product/$imageName")) {
                $filesDeleted++;
            };
        }

        return redirect()->back()->with('success', "Uspešno obrisano $delete slika iz baze podataka i $filesDeleted slika sa diska.");
    }
}
