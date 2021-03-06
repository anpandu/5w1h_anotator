<?php

class LoginController extends \BaseController {

	
	public function showLogin() {
		return View::make('pages.login');
	}

	public function doLogin() {
		$rules = array(
			'username' => 'required', // make sure the email is an actual email
			'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
		);
		$validator = Validator::make(Input::all(), $rules);
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator); // send back all errors to the login form
				// ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);
			// attempt to do the login
			if (Auth::attempt($userdata)) {
				return Redirect::to('/');
			} else {	 	
				return Redirect::to('login');
			}
		}
	}

	public function doLogout() {
		Auth::logout();
		return Redirect::to('login');
	}


}
