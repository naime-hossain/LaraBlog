<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Photo;
use App\Category;
use Image;
use Illuminate\Support\Facades\File;
class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::paginate(10);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $categories=Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input=$request->all();
        $user=Auth::user();
             if ($file=$request->file('photo_id')) {
            # code...
           
             $filename= rand(0,time()).$file->getClientOriginalName();
          Image::make($file)->fit(300, 200)->save('images/thumbnails/'.$filename);
          Image::make($file)->fit(700, 500)->save('images/'.$filename);

             $photo=Photo::create(['image'=>$filename]);
             $input['photo_id']=$photo->id;
        }
        $new_post=new Post($input);

       if ($user->posts()->save($new_post)) {
         
        return redirect('/admin/adposts')->with('message', 'Post  Created succefully');
   }else{
         return redirect('/admin/adposts')->with('message', 'Post not Created succefully');
       }
        



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories=Category::pluck('name','id')->all();
        $post=Post::findOrFail($id);
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $post=Post::findOrFail($id);
         $input=$request->all();
        $user=Auth::user();
            if ($file=$request->file('photo_id')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history
          if ($post->photo_id) {
              # code...
        File::delete('images/'.$post->photo->image);
        File::delete('images/thumbnails/'.$post->photo->image);
        
        // $old_photo=Photo::find($post->photo_id)->delete();
          }

          //create new photo
          Image::make($file)->fit(300, 200)->save('images/thumbnails/'.$filename);
          Image::make($file)->fit(700, 500)->save('images/'.$filename);
        
         $photo=Photo::find($post->photo_id)->update(['image'=>$filename]);
        
        //excluding the image from input array
        // unset($input['image']);
         unset($input['photo_id']);
        }
        //$user->posts()->whereId($id)->update($input);

       if ($post->update($input)) {
         
        return redirect('/admin/adposts')->with('message', 'Post  updated succefully');
   }else{
         return redirect('/admin/adposts')->with('message', 'Post not updated succefully');
       }
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
            $post=Post::findOrFail($id);
       
        if ($post->photo) {

            File::delete('images/'.$post->photo->image);
            File::delete('images/thumbnails/'.$post->photo->image);
            $old_photo=Photo::find($post->photo_id)->delete();
             

        }
        $post_delete=$post->delete();
        return back()->with('message', 'User  deleted succefully');
    }
    }

