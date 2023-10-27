<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = new \App\Models\posts();
        // $posts->name = "How-to-Use-Laravel";
        // $posts->save();
        return $posts::paginate(8);
    }
}
