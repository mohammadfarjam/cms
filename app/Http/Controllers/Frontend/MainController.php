<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MainController extends Controller
{
    public function str(){
       $str=Str::class;
    }
    public function index()
    {
        $posts=Post::with('user','photo','category')
            ->where('status',1)
            ->orderBy('created_at','desc')
            ->paginate(2);
        $categories=Category::all();
        return view('frontend.main.index',compact(['posts','categories']));
    }
}
