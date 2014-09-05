<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
        echo "Muhtu";
		return View::make('hello');
	}

    public function dashboard() {
        $movie = DB::table('movie')
            ->orderBy('added_at')
            ->take(1)
            ->get();
        echo "<pre>";
        print_r($movie);
    }

}
