<?php

class Movie extends \Eloquent {
	protected $fillable = array('name','img','review');
    protected $table = 'movie';
}