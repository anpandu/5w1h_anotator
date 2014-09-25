<?php

class articlesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        // $this->beforeFilter('auth');
    }

	public function index()
	{
		$articles = Article::all();
		$params['articles'] = $articles;
		return View::make('pages.article.index', $params);
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
		$params['article'] = $article;
		return View::make('pages.article.show', $params);
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
