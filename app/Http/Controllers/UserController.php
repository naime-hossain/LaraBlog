<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Photo;
use App\Category;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{

     public function __construct(){
        $this->middleware('subscriber')->except(
            [
             ]);
        // $this->middleware('subscriber')->only(['create','edit']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

 

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $user=User::whereName($name)->first();

        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        //
        $user=User::whereName($name)->first();
          $user_id=Auth::user()->id;
        //check the post is belong to logedin user or not
        if ($user_id==$user->id) {
            return view('user.edit',compact('user'));
          }else{
            return view('user.show');
        }
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        //
          $this->validate($request,[
            'image'=>'image',
            ]);
         $user=User::whereName($name)->first();
          $user_id=Auth::user()->id;
        //check the profile is belong to logedin user or not
        if ($user_id==$user->id) {


       
        $input=$request->all();
        $input['photo_id']=$user->photo_id;

        if ($file=$request->file('image')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history
          if ($user->photo_id) {
              # code...
        File::delete($user->photo->image);
        $old_photo=Photo::find($user->photo_id)->delete();
          }

          //create new photo
          $file->move('images',$filename);
        
         $photo=Photo::create(['image'=>$filename]);
        
        //excluding the image from input array
        // unset($input['image']);
         $input['photo_id']=$photo->id;
        }
        $user->update($input);
        if ($user) {
            # code...
            return redirect(route('user.show',$name))->with('message', 'User Info updated  succefully');

        }


        }else{
            return view('user.show');
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
         //
        $user=User::find($id);
          $user_id=Auth::user()->id;
        //check the post is belong to logedin user or not
        if ($user_id==$user->id) {
          
        if ($user) {
            //delete user photo from folder
            File::delete($user->photo->image);
            //delete user photo from dat abase
            $old_photo=Photo::find($user->photo_id)->delete();
            //delete users Posts from database
             $user_delete=$user->delete();

        }
        return back()->with('message', 'User  deleted succefully');
       }else{
            return view('user.show');
        }
        
       
    }
    }

