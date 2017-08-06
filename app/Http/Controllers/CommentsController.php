<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class CommentsController extends Controller
{

       public function __construct()
       {

        $this->middleware('subscriber')->except([]);
       
       }
   

  

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  Post model via $post->id
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        //
        $this->validate(request(),[
            'body'=>'required',
            ]);
        $post->comments()->create(['body'=>request('body'),'user_id'=>auth()->user()->id]);
        return back()->with('message','Comment Posted');

    }

  
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment=Comment::findorFail($id);
        $comment->delete();
        return back()->with('message','your comment deleted');
    }
}
