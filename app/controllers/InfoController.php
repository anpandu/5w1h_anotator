<?php

class InfoController extends \BaseController {

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
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$info = Info::findByArticleUser($id, Auth::user()->id);
		if ($info===null) {
			$article = Article::find($id);
			$params['article'] = $article;
			return View::make('pages.info.create', $params);
		} else {
			return Redirect::to('info/edit/'.$id);
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'article_id' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('info/create');
		} else {
			$info = new Info;
			$info->article_id = Input::get('article_id');
			$info->user_id = Auth::user()->id;
			$info->what = Input::get('what');
			$info->who = Input::get('who');
			$info->when = Input::get('when');
			$info->where = Input::get('where');
			$info->why = Input::get('why');
			$info->how = Input::get('how');
			$info->save();
			Session::flash('message', 'Successfully created info!');
			return Redirect::to('article/'.$info->article_id.'/user/'.$info->user_id);
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$info = Info::findByArticleUser($id, Auth::user()->id);
		$article = Article::find($id);
		$params['article'] = $article;
		$params['info'] = $info;
		return View::make('pages.info.edit', $params);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'article_id' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::to('info/create');
		} else {
			$info = Info::find($id);
			$info->article_id = Input::get('article_id');
			$info->user_id = Auth::user()->id;
			$info->what = Input::get('what');
			$info->who = Input::get('who');
			$info->when = Input::get('when');
			$info->where = Input::get('where');
			$info->why = Input::get('why');
			$info->how = Input::get('how');
			$info->save();
			Session::flash('message', 'Successfully created info!');
			return Redirect::to('article/'.$info->article_id.'/user/'.$info->user_id);
		}
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
