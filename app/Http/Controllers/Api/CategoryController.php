<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Category;
use App\Models\Movie;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        return $this->success('Kategori Listelendi', $categories);
    }

    public function detail($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $movies = Movie::whereRaw('categoryIds REGEXP "(^|,)(' . $categoryId . ')(,|$)"')->get();
        return $this->success('Kategori Listelendi', [
            'category' => $category,
            'movies' => $movies
        ]);
    }
}
