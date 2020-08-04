<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::with(['user', 'category', 'photo','comments' => function ($q) {$q->where('status', 1);}])->where('slug', $slug)->first();
        $categories = Category::all();
        return view('Frontend.posts.show', compact(['post', 'categories']));
    }

    public function SearchTitle()
    {

        $query = Request::input('title');
        $posts = Post::with(['user', 'category', 'photo'])
            ->where('title', 'like', "%" . $query . "%")
            ->where('status', 1)->paginate(2);
        $categories = Category::all();

        return view('frontend.posts.search', compact(['posts', 'categories', 'query']));
    }
}
