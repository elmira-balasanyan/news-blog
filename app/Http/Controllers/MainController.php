<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\User;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class MainController extends Controller
{
    public function index(){
        $users= User::all();
        $threeNews = DB::table('news')->orderBy('created_at', 'DESC')->paginate(3);
        $news = News::all();
        $randomNews1 = News::all()->random();
        $randomNews2 = News::all()->random();
        $randomNews3 = News::all()->random();
        $randomNews4 = News::all()->random();
        $categories = Category::all();

        return view('index', [
            'categories' => $categories,
            'threeNews' => $threeNews,
            'users' => $users,
            'news' => $news,
            'randomNews1' => $randomNews1,
            'randomNews2' => $randomNews2,
            'randomNews3' => $randomNews3,
            'randomNews4' => $randomNews4,
        ]);
    }
}
