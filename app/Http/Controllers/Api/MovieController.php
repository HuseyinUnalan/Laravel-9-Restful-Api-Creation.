<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Movie;

class MovieController extends BaseController
{
    public function index()
    {
        $movies = Movie::all();
        return $this->success("Film Listelendi", $movies);
    }

    public function detail($movieId)
    {
        if (Movie::where('id', $movieId)->count() == 0) return $this->error("Film Bulunamadı");
        $movie = Movie::where('id', $movieId)->with('images')->with('casts')->with('casts.cast')->first();
        $categories = Category::whereRaw('id REGEXP "(^|,)(' . str_replace(',', '|', $movie->categoryIds)  . ')(,|$)"')->get();
        return $this->success("Film Detatı Getirildi", [
            'data' =>  $movie,
            'categories' =>  $categories
        ]);
    }
}
