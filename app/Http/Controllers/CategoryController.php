<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public $categories;
    public $category;

    function __construct()
    {
        $this->categories = Category::all();
    }

    public function index()
    {
        return view('categories.index', [
            'categories' => $this->categories
        ]);
    }

    public function create()
    {
        return view('categories.create', [
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


    public function show(Category $category)
    {
        $tenNews = DB::table('news')->orderBy('updated_at', 'DESC')->limit(10)->get();
        $recentNews = DB::table('news')->orderBy('updated_at', 'DESC')->limit(3)->get();
        $news = $category->news()->paginate(3);

        return view('categories.show', [
            'category' => $category,
            'categories' => $this->categories,
            'tenNews' => $tenNews,
            'recentNews' => $recentNews,
            'news' => $news
        ]);
    }


    public function edit(Category $category)
    {
        $news = $category->news;
        return view('categories.edit', [
            'news' => $news,
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
        return request()->validate([
            'field' => 'required'
        ]);
    }
}
