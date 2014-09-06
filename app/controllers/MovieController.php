<?php

class MovieController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
        $movie = DB::table('movie')
            ->orderBy('added_at')
            ->take(30)
            ->get();
        return View::make('movie.index')
            ->with('movie', $movie);
	}

    public function stock($isin)
	{
        $stock = DB::table('stock')->where('isin',$isin)->get();
        return View::make('stock.stock')
            ->with('stock', $stock);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('movie.add');
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $destinationPath = '';
        $filename        = '';

        if (Input::hasFile('image')) {
            $file            = Input::file('image');
            $destinationPath = public_path().'/img/';
            $filename        = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess   = $file->move($destinationPath, $filename);
        }

        $movie = (['name'       => Input::get('name'),
            'review'       => Input::get('review'),
            'img'        => $filename]);

            DB::table('movie')->insert($movie);
            return Redirect::to('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $movie = DB::table('movie')->where('id', $id)->first();
        return View::make('movie.view')->with('movie', $movie);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $movie = DB::table('movie')->where('id', $id)->first();
        return View::make('movie.edit')->with('movie', $movie);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function wordAnalysis($id)
	{
        $movie = DB::table('movie')->where('id', $id)->first();
        $movie->reviewc = count($this->mb_str_word_count($movie->name,2));
        print_r($movie->reviewc);
        return View::make('movie.word')->with('movie', $movie);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

        DB::table('movie')
            ->where('id', $id)
            ->update(array('name' => Input::get('name'),'review' => Input::get('review')));
        Session::flash('msg', "Update Sucessfully");
        return Redirect::to('/edit/'.$id);
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

    function mb_str_word_count($string, $format = 0, $charlist = '[]') {
        mb_internal_encoding( 'UTF-8');
        mb_regex_encoding( 'UTF-8');

        $words = mb_split('[^\x{0600}-\x{06FF}]', $string);
        switch ($format) {
            case 0:
                return count($words);
                break;
            case 1:
            case 2:
                return $words;
                break;
            default:
                return $words;
                break;
        }
    }

    function mb_str_para_count($string, $format = 0, $charlist = '[]') {
        mb_internal_encoding( 'UTF-8');
        mb_regex_encoding( 'UTF-8');

        $words = mb_split('[^\x{0600}-\x{06FF}]', $string);
        switch ($format) {
            case 0:
                return count($words);
                break;
            case 1:
            case 2:
                return $words;
                break;
            default:
                return $words;
                break;
        }
    }

    function mb_str_sent_count($string, $format = 0, $charlist = '[]') {
        mb_internal_encoding( 'UTF-8');
        mb_regex_encoding( 'UTF-8');

        $words = mb_split('[^\x{0600}-\x{06FF}]', $string);
        switch ($format) {
            case 0:
                return count($words);
                break;
            case 1:
            case 2:
                return $words;
                break;
            default:
                return $words;
                break;
        }
    }

}