<?php

namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->orderBy('created_at', 'desc')->paginate(30);
        return view('admin.comments.index', compact(['comments']));
    }


    public function actions(Request $request, $id)
    {

        if ($request->has('action')) {
            if ($request->input('action') == 'approved') {
                $comment = Comment::findorfail($id);
                $comment->status = 1;
                $comment->save();
                Session::flash('approve_comment', 'نظر تایید شد');
            } else {
                $comment = comment::findorfail($id);
                $comment->status = 0;
                $comment->save();
                Session::flash('reject_comment', 'نظر عدم تایید شد');
            }

        }

        return redirect('admin/comments');
    }


    public function edit($id)
    {
        $comment=Comment::findorfail($id);
        return view('admin.comments.edit',compact(['comment']));

    }

    public function update(Request $request, $id)
    {
        $comment=Comment::findorfail($id);
        $comment->description=$request->input('description');
        $comment->save();

        Session::flash('update_comment','متن نظر با موفقیت ویرایش شد');
        return redirect('admin/comments');
    }

    public function destroy(Request $request ,$id)
    {
        $comment=Comment::findorfail($id);
        $comment->delete();

        Session::flash('delete_comment',' نظر با موفقیت حذف گردید');
        return redirect('admin/comments');
    }
}
