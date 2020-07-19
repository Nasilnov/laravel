<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
//use App\Models\Category;
use App\Models\News;
//use App\Models\NewsToCategory;
use Illuminate\Http\Request;
use Cookie;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.add' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $dataNewCat = [];
        foreach ($request->input('category_id_m') as $cat) {
            $dataNewCat[] = $cat;
        }

        $data = [
            'title' => $request->input('title'),
            'description' =>  $request->input('description'),
            'text' =>  $request->input('text')
        ];

        $id = News::create($data)->id;

        $news = News::query()->where('id', $id)->first();
        $news->categories()->attach($dataNewCat);

        if ( $id === NULL ) {
            return back();
        }
        return redirect()->route('news.edit', ['news' => $news] )->with('message', 'Сохранено');
//        return view('news.edit', ['news' => $news]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewsRequest $request, News $news)
    {
//        $news->title =  $request->input('title');
//        $news->description =  $request->input('description');
//        $news->text =  $request->input('text');
        $news->fill($request->validated());
        if (!$news->save()) {
            return back();
        }
        $dataNewCat = [];
        foreach ($request->input('category_id_m') as $cat) {
            $dataNewCat[] = $cat;
        }
        $news->categories()->sync($dataNewCat);

        return redirect()->route('news.edit', ['news' => $news] )->with('message', 'Сохранено');

//        return view('news.edit', ['news' => $news]) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->categories()->detach();
        $news->delete();
        return view('news.delete');
    }
}
