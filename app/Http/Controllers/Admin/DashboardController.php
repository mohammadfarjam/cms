<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $postscount=Post::count();
        $categoriescount=Category::count();
        $userscount=User::count();
        $photoscount=Photo::count();
        $posts=Post::orderBy('created_at','desc')->limit(5)->get();
        $users=User::orderBy('created_at','desc')->limit(5)->get();
        return view('admin.dashboard.index',compact(['users','posts','postscount','categoriescount','userscount','photoscount']));
    }
}
