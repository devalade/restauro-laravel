<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Categorie::query()->where('created_by', Auth::user()->id)->get()
        ]);
    }
}
