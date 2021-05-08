<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function listallcomment(){
        $comments = Comment::where('status','=',0)->get();
        return view('admin.comment.comment-list',compact('comments'));
    }

    public function approve(Request $request,$id)
    {
        $status = $request->status;
        $comment = Comment::where('id','=',$id)->update(['status' => $status]);
        return $status;
    }
}
