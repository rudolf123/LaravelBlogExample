<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function showNewsByCategory($category_id)
    {
        $category = Category::find($category_id);
        return view('news.index')->with('news', $category->news)->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category = '';
        if(request()->filled('category_id'))
            $category = Category::find(request()->category_id);
        else
            $category = Category::all()->first();
        $categories = Category::all();

        $r = '';
        if(request()->filled('r'))
            $r = request()->r;

        return view('news.create')->with('category', $category)->with('categories',$categories)->with('r', $r);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'content' => 'required',
        ]);

        $news = new News();
        $news->header = $request->get('header');
        $news->content = $request->get('content');
        $news->category_id = $request->get('category_id');
        $news->publication_time = date('Y-m-d H:i:s');

        $news->save();
        $r = '';
        if (request()->filled('r')) {
            $r = request()->r;
            return redirect($r);
        } else
            return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $category = Category::find($news->category_id);
        $categories = Category::all();

        $r = '';
        if(request()->filled('r'))
            $r = request()->r;

        return view('news.edit', compact('news'))->with('category', $category)->with('categories',$categories)->with('r', $r);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'header' => 'required',
            'content' => 'required',
        ]);

        $news->header = $request->get('header');
        $news->content = $request->get('content');
        $news->category_id = $request->get('category_id');
        $news->save();
        if (request()->filled('r')) {
            $r = request()->r;
            return redirect($r);
        } else
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect('category');
    }
}
