<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(){
        $users= User::all();
        $news = News::all();
        $categories = Category::all();

        return view('admin/index', ['categories' => $categories, 'news' => $news, 'users' => $users]);
    }
}
