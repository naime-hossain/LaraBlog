<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use Image;
  use Illuminate\Support\Facades\File;
class AdminUsersController extends Controller
{
    /**
     * Display all users .
     *10 user per page ,
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //list the role avalable for the user
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required|unique:users',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed',
            'role_id'=>'required',
            'image'=>'required|image',
            ]);

        $input=$request->all();
        if ($file=$request->file('image')) {
            # code...
             $filename= rand(0,time()).$file->getClientOriginalName();
             Image::make($file)->fit(300, 200)->save('images/'.$filename);
              $photo=Photo::create(['image'=>$filename]);
              $input['photo_id']=$photo->id;
        }

        

        $input['password']=bcrypt($request->password);
        
        $user=User::create($input);
   if ($user) {
       # code...
    return redirect('/admin/users')->with('message', 'User  added succefully');
   }else{
     return back()->with('message', 'User not added succefully');
   }

    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=User::findOrFail($id);
        return view('admin.users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //lists of role
        $roles=Role::pluck('name','id')->all();
        $user=User::findOrFail($id);
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
           $this->validate($request,[
            'image'=>'image',
            ]);
        $user=User::findOrFail($id);
        $input=$request->all();
        
    //if change user image
        if ($file=$request->file('image')) {
          
      
       
       $filename = rand(0,time()).$file->getClientOriginalName();
       //remove old history and update
          if ($user->photo_id) {
              # code...
        File::delete('images/'.$user->photo->image);
        
         //create new photo
           Image::make($file)->fit(300, 200)->save('images/'.$filename);
        
         $photo=Photo::find($user->photo_id)->update(['image'=>$filename]);
         //excluding the image from input array
        unset($input['image']);
         unset($input['photo_id']);
          }else{
            //create new photo if there was no old photo
        Image::make($file)->fit(300, 200)->save('images/'.$filename);
        
         $photo=Photo::create(['image'=>$filename]);
         $input['photo_id']=$photo->id;
           //excluding the image from input array
        unset($input['image']);
          }

          
        
        
        }
       
        $user->update($input);
        if ($user) {
            # code...
            return redirect('/admin/users')->with('message', 'User Info updated  succefully');

        }
    }

    /**
     * Remove the specified user from storage and his posts.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::findOrFail($id);
       
        if ($user) {
           
            if ($user->photo) {
            //delete user photo from folder
            File::delete('images/'.$user->photo->image);
            //delete user photo from dat abase
            $old_photo=Photo::find($user->photo_id)->delete();
            }
            //check if user has any post
             if ($posts=$user->posts) {
                 foreach ($posts as $post) {
                    //remove users posts images
                        if ($post->photo)
                         {

                            File::delete('images/'.$post->photo->image);
                            $old_photo=Photo::find($post->photo_id)->delete();
                             

                           }
                 }
             }
 

            //delete user and Posts from database
             $user_delete=$user->delete();

        }
        return back()->with('message', 'User  deleted succefully');
    }
}
