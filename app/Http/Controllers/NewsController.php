<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    public $news;
    public $categories;
    public  $category;

    function __construct()
    {
        $this->news = News::all();
        $this->categories = Category::all();
    }

    public function index()
    {
        return view('news.index', [
            'news' => $this->news,
            'categories' => $this->categories
        ]);
    }


    public function create()
    {
        return view('news.create', [
//            'news' => $this->news,
            'categories' => $this->categories
        ]);
    }

    public function store(Request $request)
    {
        $news = new News($this->validateNews());

        $input = $request->all();
        if ($request->hasFile('image')) {
            $news->title = $request->title;
            $news->text = $request->text;
            $news->save();

            $file_extension = $news->id . '.jpg';
            $news->image = $file_extension;
            $news->save();;
            $destination_path = public_path() . '\images';
            $filename = $file_extension;
            $request->file('image')->move($destination_path, $filename);
            $input['image'] = $filename;
        }

        $news->categories()->sync($request->categories, false);
        return redirect()->action('NewsController@index');
    }



    public function show(News $news)
    {
//        $singleNews = News::find($id);
        $tenNews = DB::table('news')->orderBy('updated_at', 'DESC')->paginate(10);
        $recentNews = DB::table('news')->orderBy('updated_at', 'DESC')->paginate(3);

        return view('news.show', [
            'news' => $news,
            'categories' => $this->categories,
            'tenNews' => $tenNews,
            'recentNews' => $recentNews
        ]);
    }


    public function edit(News $news)
    {
//        $singleNews = News::find($id);

        return view('news.edit', [
            'news' => $news,
            'categories' => $this->categories
        ]);
    }


    public function update(Request $request, News $news, Category $category)
    {
        $request->validate([
            'title' => 'sometimes',
            'text' => 'sometimes',
            'description' => 'sometimes',
            'image' => 'sometimes',
            'field' => 'sometimes'
        ]);

        $news->update([
            'title' =>  $request->title,
            'text' =>  $request->text,
            'description' =>  $request->description,
            'image' =>  $news->id . '.jpg'
        ]);

        $news->categories()->detach();

        $category->update([
            'field' => $request->field
        ]);

        $news->categories()->sync($request->categories, false);

        return redirect()->action('NewsController@index');
    }

    public function destroy(News $news)
    {
//        $news = News::find($id);
        $news->categories()->detach();
        $news->delete();

        return redirect()->action('NewsController@index');
    }

    protected function validateNews()
    {
        return \request()->validate([
            'title' => 'required',
            'text' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
    }
}
