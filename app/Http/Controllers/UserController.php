<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Photo;
use App\Category;
use Image;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{

     public function __construct(){
        $this->middleware('subscriber')->except([]);
      
      }
   
    /**
     * Display A user info.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $user=User::whereName($name)->firstOrFail();

        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        //
        $user=User::whereName($name)->firstOrFail();
        if ($user) {
            # code...
               $user_id=Auth::user()->id;
        //check the user is the logedin user or not
        if ($user_id==$user->id) {
            return view('user.edit',compact('user'));
          }else{
            return redirect('/');
        }
        }
        return redirect('/');
       
        
        
    }

    /**
     * Update the specified user in storage.
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
         $user=User::whereName($name)->firstOrFail();
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
        File::delete('images/'.$user->photo->image);
       
          }

          //create new photo
          Image::make($file)->fit(300, 200)->save('images/'.$filename);
//check if the user has photo_id or not and do respectively
        if ($user->photo_id) {
            $photo=Photo::find($user->photo_id)->update(['image'=>$filename]);
            unset($input['photo_id']);
        }else{
           $photo=Photo::create(['image'=>$filename]);
           $input['photo_id']=$photo->id; 
        }
         
        
        
         
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
        $user=User::findOrFail($id);
          $user_id=Auth::user()->id;
       //check the profile is belong to logedin user or not
        if ($user_id==$user->id) {
          
        if ($user) {
            //delete user photo from folder
            File::delete('images/'.$user->photo->image);
            //delete user photo from database
            $old_photo=Photo::find($user->photo_id)->delete();
            //delete user and his/her Posts from database
             $user_delete=$user->delete();

        }
        return back()->with('message', 'User  deleted succefully');
       }else{
            return view('user.show');
        }
        
       
    }
    }

