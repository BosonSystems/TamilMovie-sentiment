<?php

class UserController extends \BaseController {

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
        return View::make('index');

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

        $validator = Validator::make(Input::all(), $this->rules);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'username' 	=> Input::get('username'),
                'password' 	=> Input::get('password'),
            );

            // attempt to do the login
            if (Auth::user()->attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)

                return Redirect::to('dashboard');
            } else {

                // validation not successful, send back to form
                Session::flash('msg', "Username and Password doesn't Match");
                return Redirect::to('login');
            }
        }
    }

    public function logout()
    {
        Auth::user()->logout();
        return Redirect::to('login');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        echo "Show";
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

	public function listAll()
	{
        $meta['title'] = "User Management";
        $meta['small'] = "List";
        $meta['breadcrumb'] = "User Management";
        $data['meta'] =$meta;
        $usr = User::take(10)
            ->get();
        $data['usr'] = $usr;
//        if()

        return View::make('admin.userlist')
            ->with('_data', $data);
	}




	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $states = DB::table('states')->get();
        $_data['user'] = Auth::user()->get();
        $cities = DB::table('states_cities')->where('state_id', $_data['user']->state_id)->get();
        foreach($states as $state)
            $_data['states'][$state->state_id]=$state->state;
        foreach($cities as $city)
            $_data['cities'][$city->city_id]=$city->city;

        return View::make('profile.index')
            ->with('_data', $_data);
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
        'name'  => 'required|alpha_dash|min:3|max:20',
        'email'  => 'required|email',
        'mobile'  => 'required|digits:10'
    );
        //
        $validator = Validator::make(Input::all(), $rules);
        //echo $id;
        // process the login
        if ($validator->fails()) {
            return Redirect::to('profile')
                ->withErrors($validator);
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

            if ( Request::get('phone') )
            {
                $usr->tel = Request::get('phone');
            }

            if ( Request::get('dob') )
            {
                $usr->dob = Request::get('dob');
            }

            if ( Request::get('street') )
            {
                $usr->address1 = Request::get('street');
            }
            if ( Request::get('location') )
            {
                $usr->address2 = Request::get('location');
            }
            if ( Request::get('city') )
            {
                $usr->city_id  = Request::get('city');
            }
            if ( Request::get('state') )
            {
                $usr->state_id = Request::get('state');
            }

            $usr->save();
            Session::flash('msg', 'Successfully Updated!');
            return Redirect::to('user/43/edit');
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

        //$usr->delete();

        return Redirect::to('profile');
	}
}
