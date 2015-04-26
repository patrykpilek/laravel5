<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except' => 'index']);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
//        return \Auth::user()->name;
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index',compact('articles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('articles.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
	public function store(ArticleRequest $request)
	{
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);
        return redirect('articles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
//        dd('show');
//        $article = Article::find($id);
        $article = Article::findOrFail($id);

//        dd($article->created_at->addDays(8)->diffForHumans());
//        dd($article->published_at);

//        if(is_null($article)){
//            abort(404);
//        }

        return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $article = Article::findOrFail($id);
		return view('articles.edit', compact('article'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ArticleRequest $request
     * @return Response
     */
	public function update($id, ArticleRequest $request)
	{
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
