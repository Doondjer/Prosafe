<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function pricing()
    {
        return response()->file(storage_path('/app/pdf/CENOVNIK-KABLOVA-2021.pdf'));
    }

    public function catalog()
    {
        return response()->file(storage_path('/app/pdf/Prosafe-DETALJAN-KATALOG-PROIZVODA-2018.pdf'));
    }
}
