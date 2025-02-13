<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class PublicController extends Controller
{
    public function index()
    {
    	$blogs = Blog::orderBy('id', 'DESC')->get()->take(3);
    	return view('pag',['blogs' => $blogs]);
    }
}
