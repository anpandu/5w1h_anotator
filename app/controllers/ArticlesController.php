<?php

class articlesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        $this->beforeFilter('auth');
    }

	public function index()
	{
		$articles = Article::all();
		$params['articles'] = $articles;
		return View::make('pages.article.index', $params);
	}

	public function lists()
	{
		$articles = Article::paginate(10);
		$user = User::find(Auth::user()->id);
		$owned_article_ids = array_map(function($x) {return $x["article_id"];}, $user->infos()->get()->toArray());
		$params['articles'] = $articles;
		$params['owned_article_ids'] = $owned_article_ids;
		return View::make('pages.article.list', $params);
	}

	public function all($id)
	{
		$article = Article::find($id);
		$infos = Info::where('article_id', '=', $id)->orderBy('user_id')->get();
		$params['article'] = $article;
		$params['infos'] = $infos;
		$params['users'] = array_merge([''], array_map(function($x) {return $x['username'];}, User::all()->toArray()));
		return View::make('pages.article.all', $params);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pages.article.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title' => 'required',
			'text' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('article/create');
		} else {
			$article = new Article;
			$article->title = Input::get('title');
			$article->text = Input::get('text');
			$article->save();
			Session::flash('message', 'Successfully created article!');
			return Redirect::to('article/'.$article->id);
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = Article::find($id);
		$infos = Info::where('article_id', '=', $id)->orderBy('user_id')->get();
		$params['article'] = $article;
		$params['infos'] = $infos;
		return View::make('pages.article.show', $params);
	}


	public function info($article_id, $user_id)
	{
		$article = Article::find($article_id);
		$info = Info::findByArticleUser($article_id, $user_id);
		$params['article'] = $article;
		$params['info'] = $info;
		if ($article==null || $info==null)
			App::abort(404);
		else
			return View::make('pages.article.info', $params);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::find($id);
		$article->delete();
		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('article');
	}


}
