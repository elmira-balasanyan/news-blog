<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    public $news;
    public $categories;
    public  $category;

    function __construct()
    {
        $this->news = DB::table('news')->paginate(10);
        $this->categories = Category::all();
    }

    public function index()
    {
        return view('categories.index', [
            'news' => $this->news,
            'categories' => $this->categories
        ]);
    }

    public function create()
    {
            return view('categories.create', [
                'news' => $this->news,
                'categories' => $this->categories
            ]);
    }

    public function store(Request $request)
    {
        $category = new Category($this->validateCategory());
        $category->field = $request->field;
        $category->save();

        $category->news()->sync($request->news, false);
        return redirect()->action('CategoryController@index');
    }


    public function show($id)
    {
        $category = Category::find($id);
        $tenNews = DB::table('news')->orderBy('updated_at', 'DESC')->paginate(10);
        $recentNews = DB::table('news')->orderBy('updated_at', 'DESC')->paginate(3);


        return view('categories.show', [
            'category' => $category,
            'categories' => $this->categories,
            'tenNews' => $tenNews,
            'recentNews' => $recentNews,
            'news' => $this->news
        ]);
    }


    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', [
            'news' => $this->news,
            'category' => $category,
            'categories' => $this->categories
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'field' => 'sometimes'
        ]);

        $category->update([
            'field' => $request->field,

        ]);

        return redirect()->action('CategoryController@index');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->news()->detach();
        $category->delete();

        return redirect()->action('CategoryController@index');
    }

    protected function validateCategory()
    {
        return \request()->validate([
            'field' => 'required'
        ]);
    }
}
