<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public $rules = array(
        'username'  => 'required|alpha_dash|min:3|max:20',
        'password'  => 'required|min:4|max:20'
    );

	public function index()
	{
		//

        return View::make('admin.index');

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function create()
	{
		//
        $validator = Validator::make(Input::all(), $this->rules);
        // process the login
        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'Message' => $validator->messages()),
                200
            );
        } else {

            //Store
            $usr = new User;

            $usr->username  = Request::get('username');
            $usr->email     = Request::get('email');
            $usr->password  = Hash::make(Request::get('password'));

            // Seriously, I'm a bad person for leaving that out.

            $usr->save();

            return Response::json(array(
                    'error' => false,
                    'users' => $usr->toArray()),
                200
            );
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
            'username'  => 'required|alpha_dash|min:3|max:20',
            'password'  => 'required|min:4|max:20'
        );

        $validator = Validator::make(Input::all(), $rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password'),
            );

            // attempt to do the login
            if (Auth::admin()->attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return Redirect::to('admin/dashboard');
            } else {

                // validation not successful, send back to form
                Session::flash('msg', "Username and Password doesn't Match");
                return Redirect::to('admin/login');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('user');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // Make sure current user owns the requested resource
        $usr = User::where('id', $id)
            ->take(1)
            ->get();

        return Response::json(array(
                'error' => false,
                'users' => $usr->toArray()),
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        //
        $validator = Validator::make(Input::all(), $this->rules);
        //echo $id;
        // process the login
        if ($validator->fails()) {
            return Response::json(array(
                    'error' => true,
                    'Message' => $validator->messages()),
                200
            );
        } else {

            $usr = User::find($id);

            if ( Request::get('password') )
            {
                $usr->password = Hash::make(Request::get('password'));
            }

            if ( Request::get('email') )
            {
                $usr->email = Request::get('email');
            }

            if ( Request::get('mobile') )
            {
                $usr->mobile = Request::get('mobile');
            }

            $usr->save();

            return Response::json(array(
                    'error' => false,
                    'message' => 'User updated'),
                200
            );
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
        $usr = User::where('id', $id);

        $usr->delete();

        return Response::json(array(
                'error' => false,
                'message' => 'User deleted'),
            200
        );
	}
}
