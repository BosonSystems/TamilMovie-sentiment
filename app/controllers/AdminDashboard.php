<?php

class AdminDashboard extends \BaseController {


    public function index()
    {

        $meta['title'] = "Dashboard";
        $meta['small'] = "Control panel";
        $meta['breadcrumb'] = "Dashboard";

        $data['meta'] =$meta;
        $data['user'] = DB::table('user')->count();

        /*
        $states = DB::table('states')->get();
        $_data['user'] = Auth::user()->get();
        $cities = DB::table('states_cities')->where('state_id', $_data['user']->state_id)->get();
        foreach($states as $state)
            $_data['states'][$state->state_id]=$state->state;
        foreach($cities as $city)
            $_data['cities'][$city->city_id]=$city->city;*/

        return View::make('admin.summary')->with('_data', $data);
    }

}