<?php namespace App\Controllers;
/**
 * @author Umar Riaz
 */
use App\Models\UIData;
use App\Models\Page;

class Home extends BaseController
{

	public function index()
	{
		return view('Home/index');
	}

}