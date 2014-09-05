<?php

class Admin extends \Eloquent {
	protected $fillable = array('username','email','password','name','type','status');
    protected $table = 'admin';
}