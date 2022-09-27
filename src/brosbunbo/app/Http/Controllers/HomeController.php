<?php namespace BunBo\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController {

    public function index()
    {
        return view('adminhome');
    }
}
