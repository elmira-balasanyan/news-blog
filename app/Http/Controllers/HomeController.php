<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $threeNews = DB::table('news');
        $threeNews->orderBy('created_at', 'DESC')->paginate(3);
        $categories = Category::all();
        return view('index', ['categories' => $categories, 'threeNews' => $threeNews]);
    }
}
