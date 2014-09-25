<?php

class UsersController extends \BaseController {

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
		$users = User::All();

		return Response::json(array(
			'error' => false,
			'users' => $users->toArray()),
			200
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'username' => 'required|unique:users',
			'password' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('user/create');
		} else {
			$user = new User;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			Session::flash('message', 'Successfully created user!');
			return Redirect::to('user/'.$user->id);
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
		$user = User::find($id);
		return Response::json(array(
			'error' => false,
			'username' => $user),
			200
		);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $data['user'] = User::find($id);
		// $data['roles'] = Role::All();
		// return View::make('editAccount',$data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// $rules = array(
		// 	'username' => 'unique:users'
		// );
		// $validator = Validator::make(Input::all(), $rules);

		// if ($validator->fails()) {
		// 	return Redirect::to('user/edit');
		// } else {
		// 	$user = User::find($id);
		// 	$user->username = Input::get('username', $user->username);
		// 	$user->password = (null!==Input::get('password')) ? Hash::make(Input::get('password')) : $user->password;

		// 	$user->save();

		// 	Session::flash('message', 'Successfully edited user!');
		// 	return Redirect::to('user/'.$user->id);
		// }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();
		Session::flash('message', 'Successfully deleted!');
		return Redirect::to('user');
	}


}
