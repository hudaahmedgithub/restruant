<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Item;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
		$sliders=Slider::all();
		$items=Item::all();
		$categories=Category::all();
        return view('welcome',compact('sliders','items','categories'));
    }
}








