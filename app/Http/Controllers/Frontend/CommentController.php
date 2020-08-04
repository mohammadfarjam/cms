<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {

      $post=Post::findorfail($postId);
      if ($post){

          $comment = new Comment();
          $comment->description = $request->input('description');
          $comment->status = 0;
          $comment->post_id =$post->id;
          $comment->save();
      }


        Session::flash('add_comment','نظر با موفقیت ثبت شد و در انتظار تایید مدیر قرار گرفت');
        return back();

    }

}
