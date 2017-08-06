<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class AdminCommentsController extends Controller
{
     /**
     * Display a listing of all the Comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments=Comment::paginate(10);
        return view('admin.comments.index',compact('comments'));
    }
   /**
     * Remove the specified Comment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $comment=Comment::findOrFail($id);
        $comment->delete();
        return redirect('/admin/comments')->with(['message'=>'comment Deleted succefully']);
    }
}
