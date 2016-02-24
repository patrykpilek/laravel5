<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Support\Facades\Auth;


class ArticlesController extends Controller {

    /**
     * Create a new articles controller instance.
     */
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
        $tags = Tag::lists('name', 'id');
		return view('articles.create', compact('tags'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return Response
     */
	public function store(ArticleRequest $request)
	{
//        dd($request->input('tags'));

        $this->createArticle($request);

        flash()->success('Your article has been created!');

        return redirect('articles');
	}

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
	public function show(Article $article)
	{
//        dd('show');
//        $article = Article::find($id);
//        $article = Article::findOrFail($id);

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
     * @param Article $article
     * @return Response
     */
	public function edit(Article $article)
	{
//        $article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
		return view('articles.edit', compact('article', 'tags'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response
     */
	public function update(Article $article, ArticleRequest $request)
	{
//        $article = Article::findOrFail($id);
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

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

    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
