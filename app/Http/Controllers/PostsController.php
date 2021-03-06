<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Photo;
use App\Category;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\File;
class PostsController extends Controller
{

    public function __construct(){

        //create and userPosts method is secured via author midleware,others are public
        $this->middleware('author')->except(
            ['show',
            'index',
            'authorArchive',
            'timeArchive',
            'categoryArchive'
          
             ]);
       
    }
    /**
     * Display a listing of  the recent posts .
     * 10 posts per page
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index',compact('posts'));
    }


    /**
     * Display a listing of the specific user posts.
     *@param string $name
     * @return \Illuminate\Http\Response
     */
    public function userPosts($name)
    {
        //find the user
        $user=User::whereName($name)->firstOrFail();
        if ($user) {

        $posts=$user->posts;
        return view('user.index',compact('posts','user'));

        }else{
             return redirect('/posts');
        }
       
    }

        /**
     * Display a listing of the specific Author posts.
     *@param string $name
     * @return \Illuminate\Http\Response
     */
    public function authorArchive($name)
    {
        //find the author by name
        $user=User::whereName($name)->firstOrFail();
     
        if ($user) {
            # code...
        $posts=$user->posts()->paginate(10);
        return view('posts.archive.author',compact('posts','user'));

        }else{
            return redirect('/posts')->with('message', 'This user does not exist');
        }
       
    }

           /**
     * Display a listing of the specific category posts.
     *@param category name string $name
     * @return \Illuminate\Http\Response
     */
    public function categoryArchive($name)
    {
        //
        $category=Category::whereName($name)->firstOrFail();
        if ($category) {
            
        $posts=$category->posts()->paginate(10);
        return view('posts.archive.category',compact('posts','category'));

        }else{
             return redirect('/posts')->with('message', 'This category does not exist');
        }
       
    }
       /**
     * Display a listing of the specific time posts.
     *@param string $name
     * @return \Illuminate\Http\Response
     */
    public function timeArchive()
    {
        
        $posts=Post::latest();
       if ($posts) {
           
      
       if ( $month=request('month')) {
           $posts->whereMonth('created_at', Carbon::parse($month)->month);
       }
         if ( $year=request('year')) {
           $posts->whereYear('created_at', Carbon::parse($year)->year);
       }

         
       $posts=$posts->get();

   return view('posts.archive.time',compact('posts','month','year'));

        }else{
            return redirect('/posts')->with('message', 'No post found to for this time');
        }
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //list sll cstegories by name and id
        $categories=Category::pluck('name','id')->all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        
        $input=$request->all();
        //there is no category in datbase then create a uncategorized category
    if ($request->category_id==0) {
       
        $category=Category::Create(['name'=>'uncategorized']);
        $input['category_id']=$category->id;

      }
      //if add a new category
        if (trim($request->new_cat)=='') {
            // $input=$request->except('new_cat');
            unset($input['new_cat']);
        }else{
            //cheeck if the category is already exist or not
            $existing_cat=Category::whereName($input['new_cat'])->first();
          if ($existing_cat) {
              # code...
            return back()->with('message', 'this category already existed');
          }else{
            $category=Category::Create(['name'=>$input['new_cat']]);
           $input['category_id']=$category->id;
           unset($input['new_cat']);
          }
           
         }

        $user=Auth::user();
        //upload image using intervention image
             if ($file=$request->file('photo_id')) {
            # code...
             $filename= $user->name.rand(0,time()).$file->getClientOriginalName();
             Image::make($file)->fit(300, 200)->save('images/thumbnails/'.$filename);
             Image::make($file)->fit(700, 500)->save('images/'.$filename);
             // $file->move('images',$filename);
             $photo=Photo::create(['image'=>$filename]);
             $input['photo_id']=$photo->id;
        }


        $new_post=new Post($input);

       if ($user->posts()->save($new_post)) {
         
        return redirect('/posts')->with('message', 'Post  Created succefully');
   }else{
         return redirect('/posts')->with('message', 'Post not Created succefully');
       }
        



    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $post=Post::whereSlug($slug)->firstOrFail();
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $categories=Category::pluck('name','id')->all();
        $post=Post::findOrFail($id);
            if ($post) {
                # code...
                   $user_id=Auth::user()->id;
                    //check the post is belong to logedin user or not
                    if ($user_id==$post->user_id) {
                        # code...
                        return view('posts.edit',compact('post','categories'));
                    }else{
                       return redirect(route('user.posts',Auth::user()->name))->with('message', 'you are not allowed to edit this post');;
                    }
            }else{
                return redirect('/posts')->with('message', 'No post found to edit');

            }
     
        
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

        $user_id=Auth::user()->id;
        //check the post is belong to logedin user or not
        if ($user_id==$post->user_id) {
        if ($file=$request->file('photo_id')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history if new image select
          if ($post->photo_id) {
              # code...
        File::delete('images/'.$post->photo->image);
        File::delete('images/thumbnails/'.$post->photo->image);
        
        
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
         
        return redirect('/posts')->with('message', 'Post  updated succefully');
   }else{
         return redirect('/posts')->with('message', 'Post not updated succefully');
       }
   }else{
      return redirect('/posts');
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
$user_id=Auth::user()->id;
    //check the post is belong to logedin user or not
    if ($user_id==$post->user_id)
     {
      if ($post)
             {
                File::delete('images/'.$post->photo->image);
                File::delete('images/thumbnails/'.$post->photo->image);
                $old_photo=Photo::find($post->photo_id)->delete();
                $post_delete=$post->delete();
                return back()->with('message', 'post  deleted succefully');

              }
    }
    else{
       return redirect(route('user.posts',Auth::user()->name))->with('message', 'you are not allowed to edit this post');;
    }

        



    }

    
    }

